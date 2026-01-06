<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class TransaksiKasirController extends Controller
{
    public function index(Request $request)
    {
        // Filter parameters
        $fromDate = $request->get('from-date', '');
        $toDate = $request->get('to-date', '');
        $paymentMethod = $request->get('payment-method', '');

        // Query builder
        $query = Order::with(['user', 'orderItems.menu'])
            ->whereIn('status', ['selesai', 'paid', 'proses']);

        // Apply date filters
        if ($fromDate) {
            $query->whereDate('created_at', '>=', $fromDate);
        }
        if ($toDate) {
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Apply payment method filter
        if ($paymentMethod) {
            $query->where('metode_bayar', $paymentMethod);
        }

        $orders = $query->orderByDesc('created_at')->get();
        
        return view('kasir.riwayat-transaksi-kasir', compact('orders', 'fromDate', 'toDate', 'paymentMethod'));
    }
} 