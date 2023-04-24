<?php

namespace App\Services;

use App\Models\Transaction;
use Carbon\Carbon;

class InsightsService
{
    public function savings(Carbon $fromDate, Carbon $toDate) {
        $transactions = Transaction::query();

        if (isset($fromDate)) {
            $transactions = $transactions->where('created_at', '>=', $fromDate);
        }
        if (isset($toDate)) {
            $transactions = $transactions->where('created_at', '<=', $toDate);
        }

        $results = $transactions->get();

        // group by month
        $monthly = $results->groupBy(function($row) {
            return $row->created_at->format('Y-m');
        })->each(function($month) {
            return $month->sum('amount');
        })->sortBy(function($value, $key) {
            return $key;
        });

        $insights = collect();
        foreach($monthly as $month) {
            $savings = $month->sum('amount') * -1;
            $insights->add([
                'x' => $month->first()->created_at->startOfMonth()->format('m/d/Y'),
                'y' => round($savings, 2, PHP_ROUND_HALF_UP), // multiple by -1 because income is negative in db
            ]);
        }

        return $insights;
    }

    public function savingsPercent(Carbon $fromDate, Carbon $toDate) {
        $transactions = Transaction::query();

        if (isset($fromDate)) {
            $transactions = $transactions->where('created_at', '>=', $fromDate);
        }
        if (isset($toDate)) {
            $transactions = $transactions->where('created_at', '<=', $toDate);
        }

        $results = $transactions->get();

        // group by month
        $monthly = $results->groupBy(function($row) {
            return $row->created_at->format('Y-m');
        })->each(function($month) {
            return $month->sum('amount');
        })->sortBy(function($value, $key) {
            return $key;
        });

        $insights = collect();
        foreach($monthly as $month) {
            $savings = $month->sum('amount') * -1;
            $insights->add([
                'x' => $month->first()->created_at->startOfMonth()->format('m/d/Y'),
                'y' => round($savings, 2, PHP_ROUND_HALF_UP), // multiple by -1 because income is negative in db
            ]);
        }

        return $insights;
    }
}