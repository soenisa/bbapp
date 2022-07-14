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
    /**
     * Takes a csv file containing the following format and reads them into the Transactions table
     * date, name, amount
     */
    public function __invoke(UploadedFile $file) {
        Log::info(vsprintf('Starting import of file %s', [$file]));

        DB::beginTransaction();
        try {
            $openCsv = $file->openFile();
            $openCsv->setFlags(SplFileObject::READ_CSV);
            $index = 0;
            foreach ($openCsv as $row) {
                list($date, $name, $amount) = $row;
                Transaction::createEntry([
                    'name' => $name, 
                    'amount' => str_replace(',', '', $amount),
                    'created_at' => Carbon::createFromFormat('Y-m-d', $date)->startOfDay(),
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