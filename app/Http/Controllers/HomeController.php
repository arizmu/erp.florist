<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('Pages.Dashboard');
        // return to_route('kasir.index');
    }

    public function dailyTransaksi()
    {
        $count = \App\Models\Transaction\Transaction::whereDate('created_at', today())
            ->where('deleted_status', false)
            ->count();

        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function dailyRevenue()
    {
        $total = \App\Models\Transaction\PaymentTransaction::whereHas('transaction', function ($q) {
            $q->whereDate('created_at', today())
                ->where('deleted_status', false);
        })
            ->sum('total_paid');

        return response()->json([
            'status' => 'success',
            'data' => $total
        ]);
    }

    public function forStatistics(\Illuminate\Http\Request $request)
    {
        $period = $request->get('period', 'week');
        $labels = [];
        $data = [];

        if ($period === 'week') {
            // Last 7 days
            for ($i = 6; $i >= 0; $i--) {
                $date = today()->subDays($i);
                $labels[] = $date->format('D');
                $data[] = \App\Models\Transaction\PaymentTransaction::whereHas('transaction', function ($q) use ($date) {
                    $q->whereDate('created_at', $date)
                        ->where('deleted_status', false);
                })
                    ->sum('total_paid') / 1000000; // Convert to millions
            }
        } elseif ($period === 'month') {
            // Last 30 days grouped by week
            for ($i = 3; $i >= 0; $i--) {
                $startDate = today()->subWeeks($i + 1)->startOfWeek();
                $endDate = today()->subWeeks($i)->endOfWeek();
                $labels[] = 'Week ' . (4 - $i);
                $data[] = \App\Models\Transaction\PaymentTransaction::whereHas('transaction', function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('created_at', [$startDate, $endDate])
                        ->where('deleted_status', false);
                })
                    ->sum('total_paid') / 1000000;
            }
        } else {
            // Last 12 months
            for ($i = 11; $i >= 0; $i--) {
                $date = today()->subMonths($i);
                $labels[] = $date->format('M');
                $data[] = \App\Models\Transaction\PaymentTransaction::whereHas('transaction', function ($q) use ($date) {
                    $q->whereYear('created_at', $date->year)
                        ->whereMonth('created_at', $date->month)
                        ->where('deleted_status', false);
                })
                    ->sum('total_paid') / 1000000;
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'labels' => $labels,
                'values' => $data
            ]
        ]);
    }

    public function forCountCostumers()
    {
        $count = \App\Models\Transaction\Transaction::where('deleted_status', false)
            ->whereNotNull('costumer_id')
            ->distinct('costumer_id')
            ->count('costumer_id');

        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }

    public function forCountProduksi()
    {
        $count = \App\Models\Production\Production::whereDate('created_at', today())
            ->where('delete_status', false)
            ->count();

        return response()->json([
            'status' => 'success',
            'data' => $count
        ]);
    }
}
