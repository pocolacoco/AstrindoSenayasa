@extends('layouts.app')
<style>
    .mahasiswa{
        margin-left: 50px;
        margin-top: -130px;
    }
    .table{
        margin-left: 45px;

    }
</style>
@section('content')
<div class="mahasiswa">
    <h3>Mahasiswa</h3>
</div>

<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )


        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->nim }}</td>
            <td>{{ $user->email }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" type="button" href="{{ route('detailmahasiswa', ['id' => $user->id]) }}">Detail</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
