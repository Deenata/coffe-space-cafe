<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class VerifikasiPembayaranController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.menu'])
            ->where('status', 'unpaid')
            ->orderByDesc('created_at')
            ->get();
        return view('kasir.verifikasi-pembayaran', compact('orders'));
    }

    public function verif($id)
    {
        $order = \App\Models\Order::findOrFail($id);
        $order->status = 'paid';
        $order->save();
        return redirect()->route('verifikasi.pembayaran')->with('success', 'Pembayaran berhasil diverifikasi!');
    }
} 