{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!doctype html>
<html lang="en">

<head>
  <title>Gcars | Login Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('login-template/css/style.css') }}">

</head>

<body>
  <section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
          @include('layouts.partials.flash')
        </div>
      <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="wrap d-md-flex">
            <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center">
              <div class="text w-100">
                <h2>Welcome to login</h2>
                <p>Don't have an account?</p>
                <a href="{{ route('register') }}" class="btn btn-white btn-outline-white">Register</a>
              </div>
            </div>
            <div class="login-wrap p-4 p-lg-5">
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

</html>
