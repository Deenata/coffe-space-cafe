<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class PesananKasirController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.menu'])
            ->whereIn('status', ['paid', 'proses'])
            ->orderByDesc('created_at')
            ->get();
        return view('kasir.pesanan-masuk', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|string']);
        $order = \App\Models\Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();
        return redirect()->route('pesanan.masuk')->with('success', 'Status pesanan berhasil diubah!');
    }
    
    public function getOrderItems($id)
    {
        $order = Order::findOrFail($id);
        $items = $order->orderItems()->with('menu')->get();
        
        return response()->json([
            'items' => $items,
            'total_formatted' => 'Rp ' . number_format($order->total, 0, ',', '.')
        ]);
    }
    
    public function hapusItemPesanan(Request $request)
    {
        $request->validate([
            'order_id' => 'required|exists:orders,id',
            'item_id' => 'required|exists:order_items,id'
        ]);
        
        $order = Order::findOrFail($request->order_id);
        $item = OrderItem::findOrFail($request->item_id);
        
        // Pastikan item ini milik order yang dimaksud
        if ($item->order_id != $order->id) {
            return response()->json([
                'success' => false,
                'message' => 'Item tidak ditemukan dalam pesanan ini'
            ], 400);
        }
        
        // Kurangi total order
        $subtotal = $item->subtotal;
        $order->total -= $subtotal;
        $order->save();
        
        // Hapus item
        $item->delete();
        
        // Jika tidak ada item tersisa, hapus order
        if ($order->orderItems()->count() == 0) {
            $order->delete();
            return response()->json([
                'success' => true,
                'message' => 'Pesanan telah dihapus karena tidak ada item tersisa',
                'total_formatted' => 'Rp 0',
                'order_deleted' => true
            ]);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Item berhasil dihapus dari pesanan',
            'total_formatted' => 'Rp ' . number_format($order->total, 0, ',', '.'),
            'order_deleted' => false
        ]);
    }
}