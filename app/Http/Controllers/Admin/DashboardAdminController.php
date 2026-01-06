<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\User;
use App\Models\Menu;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Statistik hari ini
        $today = Carbon::today();
        $salesToday = Order::whereDate('created_at', $today)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total');
        
        $ordersToday = Order::whereDate('created_at', $today)
            ->where('status', '!=', 'dibatalkan')
            ->count();
        
        $newCustomersToday = User::whereDate('created_at', $today)
            ->where('role', 'pelanggan')
            ->count();

        // Menu terbaru (5 menu terbaru)
        $latestMenus = Menu::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Data untuk grafik penjualan 7 hari terakhir
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

        // Statistik tambahan
        $totalRevenue = Order::where('status', '!=', 'dibatalkan')->sum('total');
        $totalOrders = Order::where('status', '!=', 'dibatalkan')->count();
        $totalCustomers = User::where('role', 'pelanggan')->count();
        $totalMenus = Menu::count();

        // Menu terlaris (top 5)
        $topMenus = DB::table('order_items')
            ->join('menus', 'order_items.menu_id', '=', 'menus.id')
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', '!=', 'dibatalkan')
            ->select('menus.nama', DB::raw('SUM(order_items.qty) as total_sold'))
            ->groupBy('menus.id', 'menus.nama')
            ->orderBy('total_sold', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard-admin', compact(
            'salesToday',
            'ordersToday', 
            'newCustomersToday',
            'latestMenus',
            'chartData',
            'totalRevenue',
            'totalOrders',
            'totalCustomers',
            'totalMenus',
            'topMenus'
        ));
    }
} 