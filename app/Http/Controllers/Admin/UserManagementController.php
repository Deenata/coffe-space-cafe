<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserManagementController extends Controller
{
    public function index()
    {
        $users = User::whereIn('role', ['Kasir', 'Pelanggan'])->get();
        return view('admin.user-management', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|in:Kasir,Pelanggan',
            'status' => 'required|in:aktif,nonaktif',
            // password bisa di-generate default atau diinput, di sini default 'password'
        ]);

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->role = $validated['role'];
        $user->status = $validated['status'];
        $user->password = bcrypt('password'); // default password
        $user->save();

        return redirect()->route('user.management')->with('success', 'User berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:Kasir,Pelanggan',
            'status' => 'required|in:aktif,nonaktif',
        ]);
        $user->update($validated);
        return redirect()->route('user.management')->with('success', 'User berhasil diupdate!');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.management')->with('success', 'User berhasil dihapus!');
    }
}
