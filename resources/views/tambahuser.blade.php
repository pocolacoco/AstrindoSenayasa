@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
        margin-top: -120px;
        margin-left: 50px
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: 1px solid #ccc;
    }

    button[type="submit"] {
        background-color: #ffc107;
        color: #fff;
        padding: 10px 20px;
        font-size: 16px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button[type="submit"]:hover {
        background-color: #ff9800;
    }
</style>

<div class="form-container">
    <form id="add-user-form" action="{{ route('adduser') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="usertype">User Type</label>
            <select id="usertype" name="usertype" required>
                <option value="Admin">Admin</option>
                <option value="Mahasiswa">Mahasiswa</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim">
        </div>

        <div class="form-group">
            <label for="idcard">ID Card</label>
            <input type="text" id="idcard" name="idcard">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit" id="submit-btn">Submit</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#add-user-form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            var formData = new FormData(this);

            $.ajax({
                url: url,
                type: method,
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    window.location.href = '{{ route("user") }}';
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection
