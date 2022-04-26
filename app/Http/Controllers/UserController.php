<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $data['user'] = User::orderBy('nama')->get();
        return view('dashboard.admin.data-user', $data);
    }

    public function create()
    {
        return view('dashboard.admin.tambah-user');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
        ]);

        $insert = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' =>  Hash::make('password'),
            'role' => $request->role,
        ]);

        return back()->with(['success' => 'Berhasil simpan']);
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return back();
    }
}
