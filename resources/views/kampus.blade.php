@extends('layouts.app')

@push('styles')
<style>
    .kampus {
        margin-bottom: 20px;
        margin-left: 50px;
        margin-top: -130px;
    }

    .table {
        width: 100%;
       margin-left: 50px;
    }
    .formkampus{
        margin-left: 30px;
    }
</style>
@section('content')

<div class="kampus">
    <h3>Form Kampus </h3>

</div>


<form id="form-kampus" class="mx-1 mx-md-4" action="{{ route('store') }}" method="POST">
    @csrf
<div class="formkampus">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kampus</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama kampus">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Kampus</label>
        <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat kampus"></textarea>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon">
    </div>
    <div class="mb-3">
        <label for="website" class="form-label">Website</label>
        <input type="url" class="form-control" id="website" name="website" placeholder="Masukkan URL website kampus">
    </div>
    <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form-kampus').submit(function(e) {
            e.preventDefault();

            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var telepon = $('#telepon').val();
            var website = $('#website').val();

            $.ajax({
                url: '{{ route("store") }}',
                method: 'POST',
                data: {
                    _token: $('input[name="_token"]').val(),
                    nama: nama,
                    alamat: alamat,
                    telepon: telepon,
                    website: website
                },
                success: function(response) {
                    console.log(response);
                    window.location.href = '{{ route("kampus") }}';
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>

<br><br>

<table class="table">
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
            <td class="d-flex justify-content-around">
                <a class="btn btn-info" type="button" href="{{ route('detailkampus', ['id' => $kampus->id]) }}">Detail</a>
                <a class="btn btn-warning" type="button" href="{{ route('updatekampus', ['id' => $kampus->id]) }}">Update</a>
                <a class="btn btn-danger" type="button" href="{{ route('destroykampus', ['id' => $kampus->id]) }}">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection
