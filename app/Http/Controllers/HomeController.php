<?php

namespace App\Http\Controllers;

use App\Models\Transaction\Transaction;

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
            'data' => $count,
        ]);
    }

    public function dailyRevenue()
    {
        $query = Transaction::whereDate('created_at', today())->where('deleted_status', false)->sum('total_paid');

        return response()->json([
            'status' => 'success',
            'data' => $query,
        ]);
    }

    /**
     * Statistik penjualan untuk chart dashboard.
     *
     * ALUR DATA:
     *   1. Frontend mengirim query param `period` (week | month | year).
     *   2. Backend menghitung sum(total_paid) langsung dari tabel `transactions`
     *      dengan filter deleted_status = false — konsisten dengan dailyRevenue().
     *   3. Hasil sum dibagi 1.000.000 → nilai dalam satuan JUTA ke frontend.
     *
     * PERIOD:
     *   - week  : 7 hari terakhir, label = nama hari singkat (Mon, Tue, …)
     *   - month : 4 minggu dalam bulan berjalan, label = Minggu 1–4
     *   - year  : 12 bulan terakhir, label = nama bulan singkat (Jan, Feb, …)
     */
    public function forStatistics(\Illuminate\Http\Request $request)
    {
        $period = $request->get('period', 'week');
        $labels = [];
        $data = [];

        if ($period === 'week') {
            // 7 hari terakhir — per hari
            for ($i = 6; $i >= 0; $i--) {
                $date = today()->subDays($i);
                $labels[] = $date->format('D');
                $data[] = Transaction::whereDate('created_at', $date)
                    ->where('deleted_status', false)
                    ->sum('total_paid') / 1000000;
            }
        } elseif ($period === 'month') {
            // 4 minggu dalam bulan berjalan, dimulai dari hari pertama bulan ini
            $monthStart = today()->copy()->startOfMonth();
            $monthEnd   = today()->copy()->endOfMonth();

            for ($i = 0; $i < 4; $i++) {
                $weekStart = $monthStart->copy()->addDays($i * 7);
                $weekEnd   = $weekStart->copy()->addDays(6)->endOfDay();

                // Clamp: pastikan tidak melebihi akhir bulan
                if ($weekEnd->gt($monthEnd)) {
                    $weekEnd = $monthEnd->copy();
                }

                $labels[] = 'Minggu '.($i + 1);
                $data[] = Transaction::whereBetween('created_at', [$weekStart, $weekEnd])
                    ->where('deleted_status', false)
                    ->sum('total_paid') / 1000000;
            }
        } else {
            // 12 bulan terakhir — per bulan
            for ($i = 11; $i >= 0; $i--) {
                $date = today()->subMonths($i);
                $labels[] = $date->format('M');
                $data[] = Transaction::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->where('deleted_status', false)
                    ->sum('total_paid') / 1000000;
            }
        }

        return response()->json([
            'status' => 'success',
            'data' => [
                'labels' => $labels,
                'values' => $data,
            ],
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
            'data' => $count,
        ]);
    }

    public function forCountProduksi()
    {
        $count = \App\Models\Production\Production::whereDate('created_at', today())
            ->where('delete_status', false)
            ->count();

        return response()->json([
            'status' => 'success',
            'data' => $count,
        ]);
    }
}
