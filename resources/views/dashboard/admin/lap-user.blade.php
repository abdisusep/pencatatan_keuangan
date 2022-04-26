@extends('dashboard.layouts.master')
 
@section('title', 'Laporan Kas User')
@section('content')
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            @php 
                $masuk = App\Models\Transaction::where(['user_id' => $u->id, 'jenis' => 'masuk'])->sum('jumlah');
                $keluar = App\Models\Transaction::where(['user_id' => $u->id, 'jenis' => 'keluar'])->sum('jumlah');
            @endphp
            <tr>
                <td>{{ $u->nama }}</td>
                <td class="bg-success text-white"><span>Rp. {{ $masuk }}</span></td>
                <td class="bg-warning text-white"><span>Rp. {{ $keluar }}</span></td>
                <td>
                    @if($masuk == $keluar) 
                    <span>Seimbang</span>
                    @elseif($masuk > $keluar)
                    <span>Bagus</span>
                    @elseif($masuk < $keluar)
                    <span>Tidak Bagus</span>
                    @endif
                </td>
                <td><a href="{{ route('laporan_kas_user', $u->id) }}" class="btn btn-primary btn-sm">Lihat</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection