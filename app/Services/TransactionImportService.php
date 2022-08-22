<?php

namespace App\Services;

use App\Exceptions\TransactionImportException;
use App\Models\Category;
use App\Models\Transaction;
use App\Models\TransactionMeta;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use InvalidArgumentException;
use SplFileObject;

class TransactionImportService
{
    public const TYPE_BBB = 'big-bad-budget';
    public const TYPE_TD_VISA = 'td-visa';
    public const TYPE_SCOTIA_DEBIT = 'scotia-debit';
    public const TYPE_SCOTIA_AMEX = 'scotia-amex';

    /**
     * Takes a csv file containing the following format and reads them into the Transactions table
     * date, name, amount
     */
    public function __invoke(UploadedFile $file, ?string $type) {
        Log::info(vsprintf('Starting import of file %s', [$file]));

        DB::beginTransaction();
        try {
            $openCsv = $file->openFile();
            $openCsv->setFlags(SplFileObject::READ_CSV);
            $index = 0;
            foreach ($openCsv as $row) {
                if (in_array(null, $row, true)) {
                    continue;
                }

                $category = null;
                switch($type) {
                    case static::TYPE_TD_VISA:
                        list($date, $originalName, $debit, $credit) = $row;
                        $name = $originalName;

                        if (strcasecmp($name, 'SCOTIABANK PAYMENT') == 0) {
                            // credit card payment, skip as it's accounted for in other transactions
                            continue 2;
                        }

                        $amount = str_replace(',', '', empty($debit) ? $credit * -1 : $debit);
                        $name = Str::title($name);
                        break;
                    case static::TYPE_SCOTIA_DEBIT:
                        list($date, $amount, $something, $scotiaType, $originalName) = $row;
                        $name = $originalName;
                        $amount = -$amount;
                        $scotiaType = trim($scotiaType);

                        if (strcasecmp($scotiaType, 'ABM Withdrawal') == 0) {
                            $category = Category::CATEGORY_ATM_WITHDRAWAL;
                            $name = 'Cash Withdrawal';
                        } else if (strcasecmp($scotiaType, 'Payroll Deposit') == 0) {
                            $category = Category::CATEGORY_INCOME;
                        } else if (strcasecmp($scotiaType, 'Insurance') == 0) {
                            $category = Category::CATEGORY_INSURANCE;
                        } else if (strcasecmp($scotiaType, 'Investment') == 0) {
                            $category = Category::CATEGORY_INVESTMENT;
                        } else if (strcasecmp($scotiaType, 'CRD. Card Bill Payment') == 0
                            || strcasecmp($name, 'TS-TD VISA') == 0
                            || strcasecmp($name, 'MB-CREDIT CARD/LOC PAY.') == 0) {
                            // credit card payment, skip as it's accounted for in other transactions
                            continue 2;
                        }

                        if (empty($name)) {
                            $name = $scotiaType;
                        }

                        $name = Str::title($name);
                        break;
                    case static::TYPE_SCOTIA_AMEX:
                        list($date, $originalName, $amount) = $row;
                        $name = trim($originalName);

                        if(str_starts_with($name, 'SCOTIABANK TRANSIT 40022 TORONTO')) {
                            // credit card payment, skip as it's accounted for in other transactions
                            continue 2;
                        }

                        $amount = str_replace(',', '', $amount * -1);
                        $name = Str::title($originalName);
                        break;
                    case static::TYPE_BBB:
                    default:
                        list($date, $originalName, $amount) = $row;
                        $name = $originalName;
                        $amount = str_replace(',', '', $amount);
                        $type = null;
                        break;
                    }

                $date = Carbon::createFromFormat('m/d/Y', $date)->startOfDay()->shiftTimezone('America/Toronto');
                $transaction = Transaction::createEntry([
                    'name' => $name, 
                    'amount' => $amount,
                    'created_at' => $date,
                    'category' => $category,
                    'account' => $type,
                ]);
                $transaction->meta()->create([
                    'type' => 'original name',
                    'value' => $originalName,
                ]);
                if (isset($scotiaType)) {
                    $transaction->meta()->create([
                        'type' => 'scotia type',
                        'value' => $scotiaType,
                    ]);
                }

                $index++;
            }
            Db::commit();
        } catch (Exception $e) {
            Log::error('[TransctionUploadService] Rolling back...');
            Db::rollBack();
            throw new TransactionImportException(
                vsprintf('Failed to import transactions on line %s.', [$index]),
                0,
                $e
            );
        }

        Log::info(vsprintf('Completed import of file %s', [$file]));
    }

    public function test(?string $type)
    {
        return $type == static::TYPE_BBB ? null : $type;
    }
}