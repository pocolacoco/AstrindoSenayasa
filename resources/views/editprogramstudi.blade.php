@extends('layouts.app')

@section('content')

<style>
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
</style>

<div class="form-container">
    <form id="form-update-program-studi" class="mx-1 mx-md-4" action="{{ route('updateprogramstudi', ['id' => $programstudi->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="programstudi">Program Studi</label>
        <input type="text" id="programstudi" name="programstudi" placeholder="Nama Program Studi" value="{{ $programstudi->programstudi }}">

        <label for="fakultas">Fakultas</label>
        <input type="text" id="fakultas" name="fakultas" placeholder="Nama Fakultas" value="{{ $programstudi->fakultas }}">

        <button type="submit">Update</button>
    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).on('submit', '#form-update-program-studi', function(e) {
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        var method = form.attr('method');
        var formData = form.serialize();

        $.ajax({
            url: url,
            type: method,
            data: formData,
            success: function(response) {
                // Handle success response
                alert('Program studi berhasil diperbarui.');
                window.location.href = '{{ route("programstudi") }}';
            },
            error: function(response) {
                // Handle error response
                console.log(response);
                alert('Terjadi kesalahan. Program studi gagal diperbarui.');
            }
        });
    });
</script>

@endsection
