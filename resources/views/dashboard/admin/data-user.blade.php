@extends('dashboard.layouts.master')
 
@section('title', 'Daftar User')
@section('content')
<div>
    <a href="{{ route('tambah_user') }}" class="btn btn-primary mb-3">Tambah</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama User</th>
                <th>Email</th>
                <th>Role</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $u)
            <tr>
                <td>{{ $u->nama }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    <form action="{{ route('hapus_user', $u->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection