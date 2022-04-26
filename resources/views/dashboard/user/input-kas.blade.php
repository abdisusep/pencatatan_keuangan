@extends('dashboard.layouts.master')
 
@section('title', 'Input Kas')
@section('content')
<form method="POST" action="{{ route('input-kas') }}">
    @if ($message = Session::get('success'))
    <div class="alert alert-success border-0">{{ $message }}</div>
    @endif
    @csrf
    <div class="mb-3 row">
        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-6">
            <input type="text" name="keterangan" class="form-control" id="keterangan">
            @error('keterangan')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-4">
            <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Rp.">
            @error('jumlah')
            <label class="text-danger">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="jumlah" class="col-sm-2 col-form-label">Jenis Kas</label>
        <div class="col-sm-3">
            <select name="jenis" class="form-control">
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
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