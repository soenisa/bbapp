<?php

namespace App\Http\Controllers;

use App\Services\InsightsService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function savings(Request $request)
    {
        $fromDate = $request->input('fromDate', null);
        $fromDate = empty($fromDate)
            ? Carbon::createFromFormat('Y-m-d', '2015-01-01')
            : Carbon::createFromFormat('Y-m-d', $fromDate)->startOfDay();
        $toDate = $request->input('toDate', null);
        $toDate = empty($toDate)
            ? Carbon::createFromFormat('Y-m-d', '2050-01-01')
            : Carbon::createFromFormat('Y-m-d', $toDate)->endOfDay();
        
        $service = resolve(InsightsService::class);
        return $service->savings($fromDate, $toDate);
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
