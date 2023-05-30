@extends('layouts.app')

<style>
    .user {
        margin-left: 50px;
        margin-top: -150px;
    }


    .container {
        margin-top: 200px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-left: 40px;
        margin-top: -150px;
    }

    .table th,
    .table td {
        padding: 8px;
        text-align: left;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .btn-info,
    .btn-warning,
    .btn-danger {
        margin-right: 10px;
    }
    .add-user-btn {
  background-color: #007bff;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
  margin-left: 1100px;
  margin-top: -30px;
}

.add-user-btn:hover {
  background-color: #0056b3;
}

</style>

@section('content')

<div class="user">
    <h3>Manage User </h3>
    <a class="btn btn-info add-user-btn" type="button" href="/tambahuser">Add User</a>
</div>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>ID Card</th>
                <th>Email</th>
                <th>Usertype</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->nim }}</td>
                <td>{{ $user->idcard }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->usertype }}</td>
                <td class="d-flex justify-content-around">
                    <a class="btn btn-info" type="button" href="{{ route('detailuser', ['id' => $user->id]) }}">Detail</a>
                    <a class="btn btn-warning" type="button" href="{{ route('user.edit', ['id' => $user->id]) }}">Update</a>
                    <a class="btn btn-danger" type="button" href="{{ route('deleteuser', ['id' => $user->id]) }}">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
