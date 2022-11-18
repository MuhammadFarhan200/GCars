<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GCars | Home</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

  <div class="container col-6">

    <div class="card shadow rounded-3 mt-5 mx-auto">
      <div class="card-body text-center">
        @auth
          <h2>Welcome {{ Auth::user()->name }}</h2>
          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="d-flex justify-content-center align-items-center mt-4 mb-3">
            <button type="submit" onclick="return confirm('Anda yakin akan logout?')"
              class="btn btn-danger mx-1">Logout</button>
              @if (Auth::user()->role->role === 'admin')
              <a href="{{ route('admin') }}" class="btn btn-primary mx-1">Dashboard</a>
              @endif
            </div>
          </form>
        @else
          <h2>Welcome User</h2>
          <div class="d-flex justify-content-center align-items-center mt-4 mb-3">
            <a href="{{ route('login') }}" class="btn btn-primary mx-1">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary mx-1">Register</a>
          </div>
        @endauth
      </div>
    </div>
  </div>

</body>

</html>
