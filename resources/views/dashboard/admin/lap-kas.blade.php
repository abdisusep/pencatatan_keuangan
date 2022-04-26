@extends('dashboard.layouts.master')
 
@section('title', 'Laporan Keseluruhan')
@section('content')
<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Keterangan</th>
                <th>Masuk</th>
                <th>Keluar</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kas as $k)
            <tr>
                <td>{{ $k->user->nama }}</td>
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
                <td colspan="2">Jumlah</td>
                <td class="fw-bold">Rp. {{ $masuk }}</td>
                <td class="fw-bold">Rp. {{ $keluar }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection