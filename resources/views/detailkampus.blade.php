@extends('layouts.app')
@section('content')

table class="table">
    <thead>
        <tr>
            <th>Nama Kampus</th>
            <th>Alamat Kampus</th>
            <th>Nomor Telepon</th>
            <th>Website</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($kampusList as $kampus)


        <tr>
            <td>{{ $kampus->nama }}</td>
            <td>{{ $kampus->alamat }}</td>
            <td>{{ $kampus->telepon }}</td>
            <td>{{ $kampus->website }}</td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
