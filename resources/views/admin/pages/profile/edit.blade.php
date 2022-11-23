@extends('admin.layouts.main')

@section('title-page', $title)
@section('page-heading')
  <h2>Profie</h2>
  <p>Edit data anda pada halaman ini</p>
@endsection

@section('page-content')
  <h3 class="text-center">Edit Profilmu Di Halaman Ini!</h3>
  <div class="col-md-10 mx-auto">
    <div class="card shadow mt-4">
      <form action="" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row align-items-center">
          <div class="col-sm-5 col-lg-5">
            <div class="my-4 ms-4 me-4 me-sm-0">
              <img src="{{ auth()->user()->image() }}" alt="" class="card-img img-fluid shadow-sm" style="height: 300px; object-fit: cover; object-position: center">
              <input type="file" name="foto_profil" id="foto_profil" class="form-control mt-3 @error('foto_profil') is-invalid @enderror">
              @error('foto_profil')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="col-sm-7 col-lg-7 mx-auto">
            <div class="card-body">
              <h4>Tentang Anda:</h4>
              <div class="form-group">
                <input type="text" name="name" id="name" class="form-control form-control-lg mt-3 @error('name') is-invalid @enderror" placeholder="Masukkan Name" value="{{ auth()->user()->name }}">
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-gruop">
                <input type="text" name="username" id="username" class="form-control form-control-lg mt-3 @error('username') is-invalid @enderror" placeholder="Masukkan User Name" value="{{ auth()->user()->username }}">
                @error('username')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="d-flex justify-content-end align-items-center mt-4">
                <a href="{{ route('admin.profile.index', auth()->user()->username) }}" class="btn btn-danger px-3 me-3">Batal</a>
                <button type="submit" class="btn btn-primary px-3 me-3">Save</button>
              </div>
            </div>
          </div>
        </div>
    </div>
    </form>
  </div>
@endsection
