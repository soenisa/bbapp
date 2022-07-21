<?php

namespace App\Services;

use App\Exceptions\TransactionImportException;
use App\Models\Category;
use App\Models\Transaction;
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
                        list($date, $name, $debit, $credit) = $row;
                        $amount = str_replace(',', '', empty($debit) ? $credit * -1 : $debit);
                        break;
                    case static::TYPE_SCOTIA_DEBIT:
                        list($date, $credit, $debit, $scotiaType, $name) = $row;
                        $amount = trim($debit) == '-' ? $credit : $debit;
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
                        }

                        break;
                    case static::TYPE_BBB:
                    default:
                        list($date, $name, $amount) = $row;
                        $amount = str_replace(',', '', $amount);
                        $type = null;
                        break;
                    }

                $date = Carbon::createFromFormat('m/d/Y', $date)->startOfDay()->shiftTimezone('America/Toronto');
                Transaction::createEntry([
                    'name' => $name, 
                    'amount' => $amount,
                    'created_at' => $date,
                    'category' => $category,
                    'account' => $type,
                ]);
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