<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class PromoBestSellerController extends Controller
{
	public function index()
	{
		$allMenus = Menu::all();
		
		// Kategori yang dianggap sebagai minuman (case-insensitive)
		$minumanCategories = ['kopi', 'non-kopi', 'minuman', 'drink', 'beverage', 'coffee', 'tea', 'juice'];
		
		// Pisahkan menu menjadi makanan dan minuman
		$makanan = $allMenus->filter(function($menu) use ($minumanCategories) {
			$kategori = strtolower(trim($menu->kategori ?? ''));
			return !in_array($kategori, $minumanCategories);
		});
		
		$minuman = $allMenus->filter(function($menu) use ($minumanCategories) {
			$kategori = strtolower(trim($menu->kategori ?? ''));
			return in_array($kategori, $minumanCategories);
		});
		
		return view('admin.promo-best-seller', compact('makanan', 'minuman'));
	}

	public function updateBestSeller(Request $request)
	{
		$bestSellerIds = $request->input('best_seller', []);
		Menu::query()->update(['is_best_seller' => false]);
		Menu::whereIn('id', $bestSellerIds)->update(['is_best_seller' => true]);
		return back()->with('success', 'Best seller berhasil diupdate!');
	}
} 