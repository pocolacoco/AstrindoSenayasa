@extends('layouts.app')
@section('content')
<table class="table">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Email</th>
            <th>Usertype</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $users->name }}</td>
            <td>{{ $users->nim }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->usertype }}</td>
        </tr>
    </tbody>
</table>
@endsection
