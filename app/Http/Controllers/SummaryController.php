<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SummaryController extends Controller
{
    public function index(Request $request) {
        $fromDate = $request->input('fromDate', null);
        $fromDate = empty($fromDate) ? $fromDate : Carbon::createFromFormat('Y-m-d', $fromDate)->startOfDay();
        $toDate = $request->input('toDate', null);
        $toDate = empty($toDate) ? $toDate : Carbon::createFromFormat('Y-m-d', $toDate)->endOfDay();
        
        $query = Transaction::query();
        $query = $query->whereNotNull('category');

        if (isset($fromDate)) {
            $query = $query->where('created_at', '>=', $fromDate);
        }
        if (isset($toDate)) {
            $query = $query->where('created_at', '<=', $toDate);
        }

        $transactions = $query->get();
        $categories = $transactions->groupBy('category');

        Log::info('', ['cats' => $categories]);
        // Log::info('', ['from' => $fromDate->toString(), 'to' => $toDate->toString()]);

        $results = [];
        foreach ($categories as $category => $amounts) {
            $id = Str::slug($category, '-');
            $results[$id]['id'] = $id;
            $results[$id]['title'] = $category;
            $sum = $amounts->sum('amount');
            $results[$id]['value'] = $sum;
            $results[$id]['status'] = 'low';
            Log::info($id);
            
            // TODO: get target for this month and compare it against the sum to find the status
            // $results[$id]['status'] = $amounts->sum();
        }

        return  $results;
    }
}
