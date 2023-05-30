@extends('layouts.app')

@section('content')

<style>
    .studi {
        margin-left: 50px;
        margin-top: -140px;
    }

    .form-container {
        width: 300px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-left: 50px;
    }

    .form-container label {
        display: block;
        margin-bottom: 10px;
    }

    .form-container input[type="text"] {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    .form-container button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        border-radius: 3px;
    }

    .form-container button[type="submit"]:hover {
        background-color: #45a049;
    }
    .table{
        margin-left: 50px;
    }
</style>
<div class="studi">
    <h3>Program Studi</h3>
</div>

<div class="form-container">
    <form id="form-program-studi" class="mx-1 mx-md-4" action="{{ route('storeprogramstudi') }}" method="POST">
        @csrf
        <label for="programstudi">Program Studi</label>
        <input type="text" id="programstudi" name="programstudi" placeholder="Nama Program Studi">

        <label for="fakultas">Fakultas</label>
        <input type="text" id="fakultas" name="fakultas" placeholder="Nama Fakultas">


        <button type="submit">Tambah</button>
    </form>
</div>

<br><br>

<table class="table">
    <thead>
        <tr>
            <th>Program Studi</th>
            <th>Fakultas</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($programstudi as $ps)
        <tr>
            <td>{{ $ps->programstudi }}</td>
            <td>{{ $ps->fakultas }}</td>
            <td class="d-flex justify-content-around">
                <a class="btn btn-warning" type="button" href="{{ route('editprogramstudi', ['id' => $ps->id]) }}">Update</a>
                <a class="btn btn-danger" type="button" href="{{ route('destroyprogramstudi', ['id' => $ps->id]) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).on('submit', '#form-program-studi', function(e) {
        e.preventDefault();
        var form = $(this);
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(),
            success: function(response) {
                form.trigger('reset');
                alert('Program studi berhasil ditambahkan.');
            },
            error: function(response) {
                console.log(response);
                alert('Terjadi kesalahan. Program studi gagal ditambahkan.');
            }
        });
    });
</script>

@endsection
