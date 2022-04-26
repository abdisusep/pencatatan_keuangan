@extends('dashboard.layouts.master')
 
@section('title', 'Dashboard')
@section('content')
<h5 class="m-0">Selamat Datang {{ Auth::user()->nama }}</h5>
@endsection