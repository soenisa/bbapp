<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\UploadedFile;
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

        Log::info('gello');
        try {
            $openCsv = $file->openFile();
            $openCsv->setFlags(SplFileObject::READ_CSV);
            foreach ($openCsv as $index=>$row) {
                Log::info('line ' . $index);
                list($date, $name, $amount) = $row;
                Transaction::create([
                    'name' => $name, 
                    'amount' => $amount,
                    'created_at' => Carbon::createFromFormat('d/m/Y', $date), 
                ]);
            }
        } catch (Exception $e) {
            Log::error('[TransctionUploadService]: Failed to create Transaction entries: ' . $e->getMessage(), ['error' => $e]);
        }
    }
}