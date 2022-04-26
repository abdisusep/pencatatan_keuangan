@extends('dashboard.layouts.master')
 
@section('title', 'Detail Laporan Kas User')
@section('content')
<div>
    <a href="{{ route('laporan_user') }}" class="btn btn-sm btn-info mb-3">Kembali</a>
    <p class="fw-bold">User : {{ $user->nama }}</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Keterangan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kas as $k)
            <tr>
                <td>{{ $k->keterangan }}</td>
                @if($k->jenis == 'masuk')
                <td class="bg-success text-white"><span>Rp. {{ $k->jumlah }}</span></td>
                <td>-</td>
                @else
                <td>-</td>
                <td class="bg-warning text-white"><span>Rp.{{ $k->jumlah }}</span></td>
                @endif
                <td>{{ $k->created_at }}</td>
            </tr>
            @endforeach
            <tr class="bg-light">
                <td>Jumlah</td>
                <td class="fw-bold">Rp. {{ $masuk }}</td>
                <td class="fw-bold">Rp. {{ $keluar }}</td>
                <td></td>
            </tr>
            <tr class="bg-light">
                <td>Status</td>
                <td>
                    @if($masuk == $keluar) 
                    <span>Seimbang</span>
                    @elseif($masuk > $keluar)
                    <span>Bagus</span>
                    @elseif($masuk < $keluar)
                    <span>Tidak Bagus</span>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection