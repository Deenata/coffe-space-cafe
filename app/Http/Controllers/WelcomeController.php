<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class WelcomeController extends Controller
{
    public function index()
    {
        // Ambil menu best seller
        $bestSellers = Menu::where('is_best_seller', true)->get();
        
        // Ambil menu untuk section "Menu Baru" (bukan best seller, status aktif, 4 menu terbaru)
        $menus = Menu::where('is_best_seller', false)
                    ->where('status', 'tersedia')
                    ->latest()
                    ->take(4)
                    ->get();
        
        return view('welcome', compact('bestSellers', 'menus'));
    }
} 