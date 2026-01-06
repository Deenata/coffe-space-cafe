<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu-management', compact('menus'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'kategori' => 'required|string|max:50',
                'harga' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string|max:255',
                'status' => 'required|in:tersedia,habis',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                $path = $request->file('gambar')->store('menu', 'public');
                $validated['gambar'] = $path;
            }

            $menu = Menu::create($validated);

            return redirect()->route('menu.management')->with('success', 'Menu berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Error creating menu: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menambahkan menu: ' . $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $menu = Menu::findOrFail($id);
            $validated = $request->validate([
                'nama' => 'required|string|max:100',
                'kategori' => 'required|string|max:50',
                'harga' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string|max:255',
                'status' => 'required|in:tersedia,habis',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($request->hasFile('gambar')) {
                if ($menu->gambar) {
                    Storage::disk('public')->delete($menu->gambar);
                }
                $path = $request->file('gambar')->store('menu', 'public');
                $validated['gambar'] = $path;
            }

            $menu->update($validated);
            return redirect()->route('menu.management')->with('success', 'Menu berhasil diperbarui!');
        } catch (\Exception $e) {
            Log::error('Error updating menu: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal memperbarui menu: ' . $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $menu = Menu::findOrFail($id);
            if ($menu->gambar) {
                Storage::disk('public')->delete($menu->gambar);
            }
            $menu->delete();
            return redirect()->route('menu.management')->with('success', 'Menu berhasil dihapus!');
        } catch (\Exception $e) {
            Log::error('Error deleting menu: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Gagal menghapus menu: ' . $e->getMessage()]);
        }
    }
} 