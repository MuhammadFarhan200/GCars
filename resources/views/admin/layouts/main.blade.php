<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GCars - Admin | @yield('title-page')</title>

  @include('admin.layouts.partials.topScript')
</head>

<body>
  <div id="app">

    {{-- Sidebar Menu --}}
    @include('admin.layouts.partials.sidebar')
    {{-- End Sidebar Menu --}}

    <div id="main">
      {{-- Page Heading --}}
      <header>
        @include('admin.layouts.partials.header')
      </header>
      {{-- End Page Heading --}}

      {{-- Page Content --}}
      @yield('page-content')
      {{-- End Page Content --}}

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2021 &copy; Mazer, Modificated 2022 by Hanztt</p>
          </div>
          <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://saugi.me"
                target="_blank">Saugi</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>

  @include('admin.layouts.partials.bottomScript')

  {{-- Personal Script --}}
  @yield('myScript')
  {{-- End Personal Script --}}

</body>

</html>
