@extends('admin.layouts.main')

@section('title-page', $title)
@section('page-heading')
  <h2>Profile</h2>
  <p>Edit data anda pada halaman ini</p>
@endsection

@section('page-content')
  <h3 class="text-center">Edit Profilmu Di Halaman Ini!</h3>
  <div class="col-md-10 mx-auto">
    <div class="card mt-4">
      <form action="{{ route('admin.profile.update', auth()->user()->username) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row align-items-center">
          <div class="col-md-5 col-xxl-4">
            <div class="imgUp position-relative">
              <div class="imagePreview card-img">
                <div class="file-input">
                    <input type="file" name="foto_profil" class="uploadFile" id="" value="{{ auth()->user()->image() }}">
                    <label for="" class="btn btn-primary fs-5 w-100 py-2">Upload</label>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-7 col-xxl-8 mx-auto">
            <div class="card-body">
              <h4>Tentang Anda:</h4>
              <p class="fs-5 mt-3 mb-2">Name: {{ auth()->user()->name }}</p>
              <p class="fs-5 mb-2">Username: {{ auth()->user()->username }}</p>
              <p>Bergabung Pada {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}</p>
              <div class="d-flex justify-content-end align-items-center mt-4">
                <a href="{{ route('admin.profile.index', auth()->user()->username) }}" class="btn btn-danger px-3 me-3">Batal</a>
                <button type="submit" id="save" class="btn btn-primary px-3 me-3" disabled>Simpan</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
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
