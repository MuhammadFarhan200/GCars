<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GCars | Home</title>
</head>

<body>

  @auth
    <h2>Welcome {{ Auth::user()->name }}</h2>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit" onclick="return confirm('Anda yakin akan logout?')">Logout</button>
    </form>
  @else
    <h2>Welcome User</h2>
  @endauth

</body>

</html>
