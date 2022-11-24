<!doctype html>
<html lang="en">

<head>
  <title>Gcars | Register Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('login-template/css/style.css') }}">

</head>

<body>
  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="wrap d-lg-flex">
            <div class="text-wrap register p-4 p-lg-5 text-center d-flex align-items-center">
              <div class="text w-100">
                <h2>Welcome to Register</h2>
                <p>Already have an account?</p>
                <a href="{{ route('login') }}" class="btn btn-white btn-outline-white px-5">Login</a>
                <a href="/" class="btn text-white d-block">Back to Home</a>
              </div>
            </div>
            <div class="login-wrap register p-4 p-lg-5">
              <div class="d-flex">
                <div class="w-100">
                  <h3 class="mb-4">Login</h3>
                </div>
              </div>
              <form action="{{ route('register') }}" method="POST" class="signin-form">
                @csrf
                <div class="form-group mb-3">
                  <label class="label" for="name">Name</label>
                  <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ old('name') }}" required autocomplete="off">
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="name">Username</label>
                  <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}" required autocomplete="off">
                  @error('username')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group mb-3">
                  <label class="label" for="name">Email</label>
                  <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required autocomplete="off">
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
                <div class="form-group mb-3">
                  <label class="label" for="password">Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" value="{{ old('password') }}" required autocomplete="off">
                </div>
                <div class="form-group mt-4">
                  <button type="submit" class="btn btn-custom submit w-100 px-3">Register</button>
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
