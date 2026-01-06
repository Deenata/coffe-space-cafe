<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class DashboardPelangganController extends Controller
{
	public function index()
	{
		$user = auth()->user();
		
		// Pesanan terakhir
		$lastOrder = Order::with('orderItems.menu')
			->where('user_id', $user->id)
			->orderByDesc('created_at')
			->first();
		
		// Statistik pesanan
		$totalOrders = Order::where('user_id', $user->id)->count();
		$totalSpending = Order::where('user_id', $user->id)
			->where('status', '!=', 'cancelled')
			->sum('total');
		$pendingOrders = Order::where('user_id', $user->id)
			->whereIn('status', ['unpaid', 'paid', 'processed'])
			->count();
		
		// Menu Best Seller
		$bestSellers = Menu::where('is_best_seller', true)
			->where('status', 'tersedia')
			->limit(4)
			->get();
		
		// Menu Baru (3 menu terbaru)
		$newMenus = Menu::where('status', 'tersedia')
			->latest()
			->limit(3)
			->get();
		
		// Rekomendasi menu (random dari menu tersedia)
		$rekomendasi = Menu::where('status', 'tersedia')
			->inRandomOrder()
			->limit(4)
			->get();
		
		// Menu favorit berdasarkan pesanan terbanyak
		$favoriteMenuIds = DB::table('order_items')
			->join('orders', 'order_items.order_id', '=', 'orders.id')
			->where('orders.user_id', $user->id)
			->select('order_items.menu_id', DB::raw('SUM(order_items.qty) as total_ordered'))
			->groupBy('order_items.menu_id')
			->orderByDesc('total_ordered')
			->limit(3)
			->pluck('menu_id');
		
		$favoriteMenus = collect();
		if ($favoriteMenuIds->isNotEmpty()) {
			$favoriteMenus = Menu::whereIn('id', $favoriteMenuIds)
				->where('status', 'tersedia')
				->get()
				->map(function($menu) use ($user) {
					$menu->total_ordered = DB::table('order_items')
						->join('orders', 'order_items.order_id', '=', 'orders.id')
						->where('orders.user_id', $user->id)
						->where('order_items.menu_id', $menu->id)
						->sum('order_items.qty');
					return $menu;
				})
				->sortByDesc('total_ordered')
				->values();
		}
		
		return view('pelanggan.dashboard-pelanggan', compact(
			'user', 
			'lastOrder', 
			'rekomendasi', 
			'bestSellers',
			'newMenus',
			'favoriteMenus',
			'totalOrders',
			'totalSpending',
			'pendingOrders'
		));
	}
}