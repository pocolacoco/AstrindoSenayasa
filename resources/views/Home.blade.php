@extends('layouts.app')

<style>
    .welcome {
        font-family: Arial, Helvetica, sans-serif;
        margin-left: 50px;
        margin-top: -150px;
    }
</style>

@section('content')
    <div class="welcome">
        <h4>Selamat Datang,</h4>
        @if (Auth::check())
            <h5>{{ Auth::user()->name }}  Admin Astrindo Senayasa</h5>
        @else
            <h5>Pengguna Tidak Dikenali</h5>
        @endif
        <div class="total">
            <p>Total mahasiswa: {{ $mahasiswaCount }}</p>
        </div>
    </div>
@endsection
