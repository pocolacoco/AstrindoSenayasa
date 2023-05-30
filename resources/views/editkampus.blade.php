@extends('layouts.app')
@section('content')

<form id="form-updatekampus" action="{{ route('updatekampus', ['id' => $kampusList->id]) }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Kampus</label>
        <input type="text" class="form-control" id="nama" name="nama"  value= "{{ $kampusList->nama }}"placeholder="Masukkan nama kampus">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat Kampus</label>
        <textarea class="form-control" id="alamat"  value= "{{ $kampusList->alamat }}" name="alamat"  rows="3" placeholder="Masukkan alamat kampus" ></textarea>
    </div>
    <div class="mb-3">
        <label for="telepon" class="form-label">Nomor Telepon</label>
        <input type="tel" class="form-control" id="telepon" name="telepon" placeholder="Masukkan nomor telepon" value="{{ $kampusList ->telepon }}">
    </div>
    <div class="mb-3">
        <label for="website" class="form-label">Website</label>
        <input type="url" class="form-control" id="website" name="website"value= "{{ $kampusList->website}}" placeholder="Masukkan URL website kampus">
    </div>
    <button type="submit" class="btn btn-primary" id="submit-btn">Submit</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#form-updatekampus').submit(function(e) {
            e.preventDefault();

            var nama = $('#nama').val();
            var alamat = $('#alamat').val();
            var telepon = $('#telepon').val();
            var website = $('#website').val();

            $.ajax({
                url: '{{ route('updatekampus', ['id' => $kampusList->id]) }}',
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
@endsection
