<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }

    public function updateAccount(Request $request)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Update nama
        $user->name = $validated['nama'];
        
        // Update email
        $user->email = $validated['email'];
        
        // Update password jika diisi
        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }
        
        // Update foto jika diupload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }
            // Simpan foto baru
            $path = $request->file('foto')->store('users', 'public');
            $user->foto = $path;
        }
        
        $user->save();
        
        return redirect()->route('settings')->with('success', 'Profil berhasil diperbarui!');
    }
} 