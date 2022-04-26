<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Transaction;

class KasController extends Controller
{
    public function index()
    {
        return view('dashboard.user.input-kas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'jumlah' => 'required',
        ]);

        $insert = Transaction::create([
            'user_id' => Auth::user()->id,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'jenis' => $request->jenis,
        ]);

        return back()->with(['success' => 'Berhasil disimpan']);
    }

    public function laporan_kas()
    {
        $data['kas'] = Transaction::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $data['masuk'] = Transaction::where([
            'user_id' => Auth::user()->id,
            'jenis' => 'masuk'
        ])->sum('jumlah');
        $data['keluar'] = Transaction::where([
            'user_id' => Auth::user()->id,
            'jenis' => 'keluar'
        ])->sum('jumlah');
        return view('dashboard.user.lap-kas', $data);
    }

    public function laporan()
    {
        $data['kas'] = Transaction::orderBy('created_at', 'desc')->get();
        $data['masuk'] = Transaction::where([
            'jenis' => 'masuk'
        ])->sum('jumlah');
        $data['keluar'] = Transaction::where([
            'jenis' => 'keluar'
        ])->sum('jumlah');
        return view('dashboard.admin.lap-kas', $data);
    }

    public function laporan_user()
    {
        $data['user'] = User::where('role', 'user')->get();
        return view('dashboard.admin.lap-user', $data);
    }

    public function laporan_kas_user($id)
    {
        $data['user'] = User::where('id', $id)->first();
        $data['kas'] = Transaction::where('user_id', $id)->orderBy('created_at', 'desc')->get();
        $data['masuk'] = Transaction::where([
            'user_id' => $id,
            'jenis' => 'masuk'
        ])->sum('jumlah');
        $data['keluar'] = Transaction::where([
            'user_id' => $id,
            'jenis' => 'keluar'
        ])->sum('jumlah');
        return view('dashboard.admin.lap-kas-user', $data);
    }
}
