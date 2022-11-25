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
  <section class="section" id="trainers">
    @yield('main-content')
  </section>
  <!-- ***** Cars Ends ***** -->

  @yield('additional-content')

  <!-- ***** Footer Start ***** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>
            Copyright © 2020 Company Name
            - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
          </p>
        </div>
      </div>
    </div>
  </footer>
  <!-- ***** Footer End ***** -->

  @include('layouts.partials.bottomScript')

</body>

</html>
