@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 400px;
        margin: 0 auto;
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
    <form action="{{ route('user.update', $users->id) }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $users->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $users->email }}" required>
        </div>

        <div class="form-group">
            <label for="usertype">User Type</label>
            <select id="usertype" name="usertype" required>
                <option value="admin" {{ $users->usertype == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="mahasiswa" {{ $users->usertype == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
            </select>
        </div>

        <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="{{ $users->nim }}">
        </div>

        <div class="form-group">
            <label for="idcard">ID Card</label>
            <input type="text" id="idcard" name="idcard" value="{{ $users->idcard }}">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password">
        </div>

        <button type="submit">Update</button>
    </form>
</div>
@endsection
