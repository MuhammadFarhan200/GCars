@extends('layouts.main')

@section('page-title', $title)

@section('hero-area')
  <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('frontend/images/banner-image-1-1920x500.jpg') }})">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1">
          <div class="cta-content pt-5">
            <h2 class="text-white">Profilmu</h2>
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
        <div class="row align-items-center">
          <div class="col-md-5 col-lg-5">
            <img src="{{ $user->image() }}" alt="" class="card-img img-fluid shadow-sm" style="height: 300px; object-fit: cover; object-position: center">
          </div>
          <div class="col-md-7 col-lg-7 mx-auto">
            <div class="card-body pe-md-5">
              <h4>Tentang Anda:</h4>
              <label class="mt-3 mb-2 d-block">Name: {{ auth()->user()->name }}</label>
              <label class="mb-2 d-block">Username: {{ auth()->user()->username }}</label>
              <p>Bergabung Pada {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d M, Y') }}</p>
              <div class="d-flex justify-content-between align-items-center mt-4">
                <div class="">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                  <a href="/user/{{ auth()->user()->username }}/edit" class="btn btn-sm btn-primary me-1">
                    Edit <i class="fa fa-pencil"></i>
                  </a>
                  <a href="{{ route('logout') }}" class="btn btn-sm btn-danger" onclick="event.preventDefault();logout()">
                    Logout <i class="fa fa-sign-out"></i>
                  </a>
                </div>
                <a href="/" class="btn btn-sm btn-secondary">Ke Beranda</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('myScript')
  <script>
    function logout() {
      const swalWithBootstrapButtons = Swal.mixin({
        buttonsStyling: true
      })

      swalWithBootstrapButtons.fire({
        title: 'Anda Yakin Akan Logout?',
        icon: 'warning',
        showCancelButton: true,
        // allowOutsideClick: false,
        confirmButtonText: 'Logout',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('logout-form').submit();
        }
      })
    }
  </script>
@endsection
