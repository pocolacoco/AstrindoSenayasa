@extends('layouts.mahasiswa')
@section('contentt')

<style>
  .card {
    margin-bottom: 20px;
    border: none;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 40%;
    margin-left: 310px;
    margin-top: -120px;
  }

  .card-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
  }

  .card-body {
    padding: 20px;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  input[type="text"],
  input[type="email"],
  input[type="date"],
  textarea {
    width: 100%;
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
  }

  input[type="radio"] {
    margin-right: 5px;
  }

  button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
</style>

<div class="card">
  <div class="card-header">
    <h5 class="card-title">Form Mahasiswa</h5>
  </div>
  <div class="card-body">
    <form id="uploadForm" enctype="multipart/form-data" action="/upload " method="POST">
@csrf

      <div>
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" readonly>
      </div>
      <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" readonly>

      <div>
        <label for="jeniskelamin">Jenis Kelamin:</label>
        <input type="radio" name="jeniskelamin" value="Laki-laki"> Laki-laki
        <input type="radio" name="jeniskelamin" value="Perempuan"> Perempuan
      </div>
      <div>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" id="tanggal">
      </div>
      <div>
        <label for="agama">Agama:</label>
        <select name="agama" id="agama">
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
      </div>
      <div>
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat"></textarea>
      </div>
      <div>
        <label for="pendidikan">Pendidikan:</label>
        <select name="pendidikan" id="pendidikan">
          <option value="SMA/SMK">SMA/SMK</option>
          <option value="D3">D3</option>
          <option value="S1">S1</option>
          <option value="S2">S2</option>
          <option value="S3">S3</option>
        </select>
      </div>
      <div>
        <label for="kampus">Kampus:</label>
        <select name="kampus" id="kampus">
          @foreach ($kampusList as $kampus)
            <option value="{{ $kampus->id }}">{{ $kampus->nama }}</option>
          @endforeach
        </select>
      </div>



      <div>
        <label for="programstudi">Program Studi:</label>
        <select name="programstudi" id="programstudi">
          @foreach ($programstudi as $ps)
            <option value="{{ $ps->id }}">{{ $ps->programstudi }}</option>
          @endforeach
        </select>
      </div>



      <div>
        <label for="ktp">Upload KTP:</label>
        <input type="file" name="ktp" id="ktp">
      </div>
      <div>
        <label for="ijazah">Upload Ijazah:</label>
        <input type="file" name="ijazah" id="ijazah">
      </div>
      <button type="submit">Submit</button>
    </form>
  </div>
</div>

<script>
    $(document).ready(function() {
      $('#uploadForm').submit(function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
          url: '/upload',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          success: function(response) {
            console.log(response);
            alert('Anda sudah mengisi form.');


            $('#uploadForm').hide();
          },
          error: function(xhr, status, error) {
            console.log(xhr.responseText);
          }
        });
      });
    });
  </script>


@endsection
