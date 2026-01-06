<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function showAccount()
    {
        $user = auth()->user();
        return view('pelanggan.pengaturan-akun', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $user = auth()->user();
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        $user->name = $validated['nama'];
        $user->email = $validated['email'];
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('foto_profil', 'public');
            $user->foto = $path;
        }
        $user->save();
        return redirect()->back()->with('success', 'Akun berhasil diperbarui!');
    }
}
