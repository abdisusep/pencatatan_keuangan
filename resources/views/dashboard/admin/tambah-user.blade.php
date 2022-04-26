@extends('dashboard.layouts.master')
 
@section('title', 'Tambah User')
@section('content')
<form method="POST" action="{{ route('store_user') }}">
    <a href="{{ route('data_user') }}" class="btn btn-dark mb-3">Kembali</a>
    @if ($message = Session::get('success'))
    <div class="alert alert-success border-0">{{ $message }}</div>
    @endif
    @csrf
    <div class="mb-3 row">
        <label for="nama" class="col-sm-2 col-form-label">Nama User</label>
        <div class="col-sm-6">
            <input type="text" name="nama" class="form-control" id="nama">
            @error('nama')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-6">
            <input type="email" name="email" class="form-control" id="email">
            @error('email')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
    </div>
   
    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-2 col-form-label">Role</label>
        <div class="col-sm-3">
            <select name="role" class="form-control">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            
        </div>
    </div>
    <div class="mb-3 row">
        <div class="col-sm-10 offset-sm-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>
@endsection