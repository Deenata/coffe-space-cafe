<?php

namespace App\Http\Controllers\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class PelangganMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('pelanggan.lihat-menu', compact('menus'));
    }
} 