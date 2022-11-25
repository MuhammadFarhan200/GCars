@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Ubah Profilmu</h2>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('main-content')
  <section class="section col-lg-8 mx-auto" id="trainers">
    <div class="container">
      <div class="card shadow border-0" style="margin-top: -50px">
        <form action="" method="POST" enctype="multipart/form-data">
          @csrf
          @method('put')
          <div class="row align-items-center">
            <div class="col-md-5">
              <div class="imgUp position-relative">
                <div class="imagePreview card-img">
                  <div class="file-input">
                    <input type="file" name="foto_profil" class="uploadFile" id="" value="{{ auth()->user()->image() }}">
                    <label for="" class="btn btn-primary fs-5 w-100 py-2 mb-0">Upload</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7 mx-auto">
              <div class="card-body pe-md-5">
                <h4>Tentang Anda:</h4>
                <div class="mb-3">
                  <label class="d-block mt-3 mb-2">Name</label>
                  <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" class="form-control">
                </div>
                <div class="mb-3">
                  <label class="d-block mb-2">Username</label>
                  <input type="text" name="username" id="username" value="{{ auth()->user()->username }}" class="form-control">
                </div>
                <div class="d-flex justify-content-end align-items-center mt-4">
                  <a href="/user/{{ auth()->user()->username }}" class="btn btn-danger px-3 me-2">Batal</a>
                  <button type="submit" id="save" class="btn btn-primary px-3" disabled>Simpan</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection

@section('myScript')
  <script>
    $('.imgUp').find('.imagePreview').css('background-image', 'url({{ auth()->user()->image() }})');

    $(function() {
      $(document).on('change', '.uploadFile', function() {
        const getButton = document.querySelector('#save').removeAttribute('disabled');
        const uploadFile = $(this);
        const files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return;

        if (/^image/.test(files[0].type)) {
          const reader = new FileReader();
          reader.readAsDataURL(files[0]);

          reader.onloadend = function() {
            uploadFile.closest('.imgUp').find('.imagePreview').css('background-image', `url(${this.result})`);
          }
        }
      });
    });
  </script>
@endsection
