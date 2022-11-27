{{-- <!doctype html>
<html lang="en">

<head>
  <title>Gcars | Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('auth-template/css/style.css') }}">

</head>

<body>
  <section class="ftco-section">
    @include('layouts.partials.header')
    <div class="container">
        <div class="row justify-content-center">
          @include('layouts.partials.flash')
        </div>
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="text-wrap login p-4 p-lg-5 text-center d-flex align-items-center">
              <div class="text w-100">
                <h2>Welcome to login</h2>
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="btn btn-white btn-outline-white px-5">Register</a>
                <a href="/" class="btn text-white d-block">Back to Home</a>
              </div>
            </div>
            <div class="login-wrap login p-4 p-lg-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Login</h3>
                </div>
              </div>
              <form action="{{ route('login') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group mb-3">
                  <label class="label" for="name">Email</label>
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="password">Password</label>
                  <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" required autocomplete="off">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-custom submit w-100 px-3">Login</button>
                </div>
                <div class="form-group d-md-flex">
                  <div class="w-50 text-left">
                    <label class="checkbox-wrap checkbox-custom mb-0">Remember Me
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <span class="checkmark"></span>
                    </label>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="{{ asset('backend/extensions/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('login-template/js/popper.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

</body>

</html> --}}


@extends('layouts.main')

@section('page-title', 'Login Page')

@section('main-content')
  <section class="ftco-section">
    <div class="soft-bg">
        <div class="container mt-5">
          <div class="row justify-content-center">
            @include('layouts.partials.flash')
          </div>
          <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
              <div class="wrap d-md-flex">
                <div class="text-wrap login p-4 p-lg-5 text-center d-flex align-items-center">
                  <div class="text w-100">
                    <h2>Welcome to login</h2>
                    <p class="mb-4 text-white">Belum punya akun?</p>
                    <a href="{{ route('register') }}" class="btn-auth btn-white btn-outline-white px-5">Register</a>
                    <a href="/" class="text-white d-block mt-4">Back to Home</a>
                  </div>
                </div>
                <div class="login-wrap login p-4 p-lg-5">
                  <div class="d-flex">
                    <div class="w-100">
                      <h3 class="mb-4">Login</h3>
                    </div>
                  </div>
                  <form action="{{ route('login') }}" method="POST" class="signin-form">
                    @csrf
                    <div class="form-group mb-3">
                      <label class="label" for="name">Email</label>
                      <input type="text" name="email" class="form-control form-control-auth @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="email">
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group mb-3">
                      <label class="label" for="password">Password</label>
                      <input type="password" name="password" class="form-control form-control-auth @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}" required autocomplete="off">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group mt-4">
                      <button type="submit" class="btn-auth btn-custom submit w-100 px-3">Login</button>
                    </div>
                    <div class="form-group d-md-flex">
                      <div class="w-50 text-left">
                        <label class="checkbox-wrap checkbox-custom mb-0">Ingat Saya
                          <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </section>
@endsection
