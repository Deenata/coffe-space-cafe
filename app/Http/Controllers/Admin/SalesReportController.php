<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SalesReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Filter tanggal
        $fromDate = $request->get('from-date', Carbon::today()->format('Y-m-d'));
        $toDate = $request->get('to-date', Carbon::today()->format('Y-m-d'));

        // Statistik penjualan hari ini
        $today = Carbon::today();
        $salesToday = Order::whereDate('created_at', $today)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total');

        // Statistik penjualan bulan ini
        $currentMonth = Carbon::now()->startOfMonth();
        $salesThisMonth = Order::where('created_at', '>=', $currentMonth)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total');

        // Rincian transaksi berdasarkan filter tanggal
        $transactions = OrderItem::with(['order.user', 'menu'])
            ->whereHas('order', function($query) use ($fromDate, $toDate) {
                $query->whereBetween('created_at', [$fromDate . ' 00:00:00', $toDate . ' 23:59:59'])
                    ->where('status', '!=', 'dibatalkan');
            })
            ->select('menu_id', DB::raw('SUM(qty) as total_quantity'), DB::raw('SUM(subtotal) as total_amount'))
            ->groupBy('menu_id')
            ->orderBy('total_amount', 'desc')
            ->get();

        // Format data untuk ditampilkan
        $formattedTransactions = [];
        foreach ($transactions as $transaction) {
            $formattedTransactions[] = [
                'tanggal' => $fromDate,
                'menu' => $transaction->menu->nama,
                'jumlah' => $transaction->total_quantity,
                'total_harga' => $transaction->total_amount
            ];
        }

        // Data untuk grafik (7 hari terakhir)
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dailySales = Order::whereDate('created_at', $date)
                ->where('status', '!=', 'dibatalkan')
                ->sum('total');
            
            $chartData[] = [
                'date' => $date->format('d/m'),
                'sales' => $dailySales
            ];
        }

        return view('admin.sales-report', compact(
            'salesToday', 
            'salesThisMonth', 
            'formattedTransactions', 
            'chartData',
            'fromDate',
            'toDate'
        ));
    }
} 