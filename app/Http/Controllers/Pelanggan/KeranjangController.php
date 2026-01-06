<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menus,id',
        ]);
        $user = Auth::user();
        $cart = Cart::where('user_id', $user->id)->where('menu_id', $request->menu_id)->first();
        \Log::info('Tambah ke keranjang', [
            'user_id' => optional($user)->id,
            'menu_id' => $request->menu_id,
            'cart_id' => optional($cart)->id ?? null,
            'qty' => optional($cart)->qty ?? null,
        ]);
        if ($cart) {
            $cart->qty += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => $user->id,
                'menu_id' => $request->menu_id,
                'qty' => 1,
            ]);
        }
        return redirect()->back()->with('success', 'Menu berhasil ditambahkan ke keranjang!');
    }

    public function index()
    {
        $user = Auth::user();
        $carts = Cart::with('menu')->where('user_id', $user->id)->get();
        return view('pelanggan.keranjang', compact('carts'));
    }

    public function destroy($id)
    {
        $user = \Auth::user();
        $cart = \App\Models\Cart::where('id', $id)->where('user_id', $user->id)->first();
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang!');
        }
        return redirect()->back()->with('error', 'Item tidak ditemukan di keranjang!');
    }

    public function updateQty(Request $request, $id)
    {
        $request->validate(['action' => 'required|in:plus,minus']);
        $cart = \App\Models\Cart::where('id', $id)->where('user_id', \Auth::id())->firstOrFail();
        if ($request->action === 'plus') {
            $cart->qty += 1;
        } elseif ($request->action === 'minus' && $cart->qty > 1) {
            $cart->qty -= 1;
        }
        $cart->save();
        return redirect()->back();
    }

    public function checkout()
    {
        $user = \Auth::user();
        $carts = \App\Models\Cart::with('menu')->where('user_id', $user->id)->get();
        $total = $carts->sum(function($item) {
            return $item->menu->harga * $item->qty;
        });
        return view('pelanggan.checkout', compact('carts', 'total'));
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'metode_bayar' => 'required',
            'bukti' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $user = \Auth::user();
        $carts = \App\Models\Cart::with('menu')->where('user_id', $user->id)->get();
        if ($carts->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang kosong!');
        }
        $total = $carts->sum(fn($item) => $item->menu->harga * $item->qty);
        $path = $request->file('bukti')->store('bukti_pembayaran', 'public');
        $order = \App\Models\Order::create([
            'user_id' => $user->id,
            'total' => $total,
            'metode_bayar' => $request->metode_bayar,
            'bank_atm' => $request->bank_atm ?? null,
            'bukti_pembayaran' => $path,
            'status' => 'unpaid',
        ]);
        foreach ($carts as $cart) {
            \App\Models\OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $cart->menu_id,
                'qty' => $cart->qty,
                'harga_satuan' => $cart->menu->harga,
                'subtotal' => $cart->menu->harga * $cart->qty,
            ]);
        }
        \App\Models\Cart::where('user_id', $user->id)->delete();
        return redirect()->route('status.pesanan')->with('success', 'Pesanan berhasil dibuat!');
    }

    public function statusPesanan()
    {
        $user = \Auth::user();
        $orders = \App\Models\Order::with('orderItems.menu')->where('user_id', $user->id)->orderByDesc('created_at')->get();
        return view('pelanggan.status-pesanan', compact('orders'));
    }

} 