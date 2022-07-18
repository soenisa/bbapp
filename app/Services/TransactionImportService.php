<?php

namespace App\Services;

use App\Exceptions\TransactionImportException;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;
use SplFileObject;

class TransactionImportService
{
    public const TYPE_BBB = 'big-bad-budget';
    public const TYPE_TD_VISA = 'td-visa';

    /**
     * Takes a csv file containing the following format and reads them into the Transactions table
     * date, name, amount
     */
    public function __invoke(UploadedFile $file, string $type) {
        Log::info(vsprintf('Starting import of file %s', [$file]));

        DB::beginTransaction();
        try {
            $openCsv = $file->openFile();
            $openCsv->setFlags(SplFileObject::READ_CSV);
            $index = 0;
            foreach ($openCsv as $row) {
                
                switch($type) {
                    case static::TYPE_TD_VISA:
                        list($date, $name, $debit, $credit) = $row;
                        $amount = str_replace(',', '', empty($debit) ? $credit : $debit);
                        $date = Carbon::createFromFormat('MM/DD/Y', $date)->startOfDay();
                        break;
                    case static::TYPE_BBB:
                    default:
                        list($date, $name, $amount) = $row;
                        $amount = str_replace(',', '', $amount);
                        $date = Carbon::createFromFormat('m/d/Y', $date)->startOfDay();
                        break;
                    }
                Log::info($amount . ' ' . $date);
                
                Transaction::createEntry([
                    'name' => $name, 
                    'amount' => $amount,
                    'created_at' => $date,
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
}