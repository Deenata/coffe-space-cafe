<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\OrderItem;
use Carbon\Carbon;

class DashboardKasirController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }

        // Statistik pesanan hari ini
        $today = Carbon::today();
        $ordersToday = Order::whereDate('created_at', $today)->count();
        $totalPaymentToday = Order::whereDate('created_at', $today)
            ->where('status', '!=', 'dibatalkan')
            ->sum('total');

        // Pesanan terbaru (5 pesanan terakhir)
        $recentOrders = Order::with(['user', 'orderItems.menu'])
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        // Format pesanan untuk ditampilkan
        $formattedOrders = [];
        foreach ($recentOrders as $order) {
            $items = [];
            foreach ($order->orderItems as $item) {
                $items[] = $item->menu->nama . ' x' . $item->quantity;
            }
            $formattedOrders[] = [
                'items' => implode(', ', $items),
                'status' => $order->status,
                'created_at' => $order->created_at->format('H:i')
            ];
        }

        return view('kasir.dashboard-kasir', compact('ordersToday', 'totalPaymentToday', 'formattedOrders'));
    }
} 