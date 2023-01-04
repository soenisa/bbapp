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
        $month = $request->input('month', Carbon::now()->month);
        $year = $request->input('year', Carbon::now()->year);
        $fromDate = Carbon::create($year, $month)->startOfMonth()->startOfDay();
        $toDate = Carbon::create($year, $month)->endOfMonth()->endOfDay();
        
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

        $results = [];
        foreach ($categories as $category => $amounts) {
            $id = Str::slug($category, '-');
            $results[$id]['id'] = $id;
            $results[$id]['title'] = $category;
            $sum = $amounts->sum('amount');
            $results[$id]['value'] = $sum;
            $results[$id]['status'] = 'low';
            
            // TODO: get target for this month and compare it against the sum to find the status
            // $results[$id]['status'] = $amounts->sum();
        }

        return  $results;
    }
}
