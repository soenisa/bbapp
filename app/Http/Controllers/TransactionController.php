<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransactionCollection;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionImportService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    protected const INPUT_TRANSACTION_DATA = 'transaction_data';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $fromDate = $request->input('fromDate', null);
        $fromDate = empty($fromDate) ? $fromDate : Carbon::createFromFormat('Y-m-d', $fromDate)->startOfDay();
        $toDate = $request->input('toDate', null);
        $toDate = empty($toDate) ? $toDate : Carbon::createFromFormat('Y-m-d', $toDate)->endOfDay();
        $category = $request->input('category', null);
        
        $transactions = Transaction::query();

        if (isset($fromDate)) {
            $transactions = $transactions->where('created_at', '>=', $fromDate);
        }
        if (isset($toDate)) {
            $transactions = $transactions->where('created_at', '<=', $toDate);
        }
        if (isset($category)) {
            $transactions = $transactions->where('category', $category);
        }

        return TransactionResource::collection($transactions->orderByDesc('created_at')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    /**
     * Import a file to parse and insert transactions.
     */
    public function import(Request $request) {
        $file = $request->file($this::INPUT_TRANSACTION_DATA);
        if($file->extension() !== 'csv') {
            return $this->errorResponse(Response::HTTP_BAD_REQUEST, 'file must be a csv');
        }
        $type = $request->input('type', null);

        $service = resolve(TransactionImportService::class);
        $service($file, $type);
    }

    private function errorResponse (int $statusCode, $message)
    {
        return $this->response([
            'error' => [
                'status_code' => $statusCode,
                'message' => $message,
            ]
        ]);

    }
}
