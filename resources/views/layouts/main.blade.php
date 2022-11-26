<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GCars | @yield('page-title')</title>
  @include('layouts.partials.topScript')

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('layouts.partials.header')
  <!-- ***** Header Area End ***** -->

  @yield('hero-area')

  <!-- ***** Cars Starts ***** -->
  @yield('main-content')
  <!-- ***** Cars Ends ***** -->

  @yield('additional-content')

  <!-- ***** Footer Start ***** -->
  <footer class="footer">
    <div class="container-fluid">
      <div class="row px-4 g-3">
        <div class="col-md-4">
          <a href="/" class="logo-2">
            GC<em>ARS</em>
          </a>
        </div>
        <div class="col-md-2 text-start link">
          <p>
            Quick Links
          </p>
          <a href="/">Home</a>
          <a href="/mobil">Mobil</a>
          <a href="/merek">Merek</a>
          @auth
            @if (auth()->user()->role->role === 'admin')
              <a href="/admin">Dashboard</a>
            @else
              <a href="/pesanan">Pesanan</a>
              <a href="/user/{{ auth()->user()->username }}">Profil</a>
            @endif
          @else
            <a href="/login">Login/Daftar</a>
          @endauth
        </div>
        <div class="col-md-3 text-start link">
          <p>
            Info Kontak
          </p>
          <a href="#">
            <i class="bi bi-geo-alt-fill"></i>
            Jalan Bandung Sebelah Kanan.
          </a>
          <a href="#">
            <i class="bi bi-envelope-fill"></i>
            help@gcars.co
          </a>
          <a href="#">
            <i class="bi bi-telephone-fill"></i>
            +62 8123 456 789
          </a>
        </div>
        <div class="col-md-3 text-start">
          <p>
            Ikuti Kami
          </p>
          <div class="d-flex align-items-center">
            <a href="#" class="social">
              <i class="bi bi-instagram"></i>
            </a>
            <a href="#" class="social ">
              <i class="bi bi-facebook"></i>
            </a>
            <a href="#" class="social ">
              <i class="bi bi-twitter"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="bottom-footer">
        <span>Copyright &copy; 2022 <a href="/">GCars</a>. All rights reserved.</span>
      </div>
    </div>
  </footer>

  <!-- ***** Footer End ***** -->

  @include('layouts.partials.bottomScript')

  @yield('myScript')

</body>

</html>
