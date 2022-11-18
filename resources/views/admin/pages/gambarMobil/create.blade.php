@extends('admin.layouts.main')

@section('title-page', 'Tambah Gambar Mobil')
@section('page-heading')
  <h2>Mobil</h2>
  <p>Tambahkan <b>gambar mobil</b> dengan menguoload gambar pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header">
          <h3>Tambah Gambar Mobil</h3>
        </div>
        <div class="card-body">
            <p>Mobil : {{ $mobil->merek->nama. ', ' .$mobil->tipe }}</p>
          <form action="{{ route('tambahGambar.store') }}" method="post"
            enctype="multipart/form-data" class="dropzone" id="my-dropzone">
            @csrf
            <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
