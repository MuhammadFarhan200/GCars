<header class="header-area header-sticky">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <nav class="main-nav">
          <!-- ***** Logo Start ***** -->
          <a href="/" class="logo">GC<em>ARS</em></a>
          <!-- ***** Logo End ***** -->
          <!-- ***** Menu Start ***** -->
          <ul class="nav">
            <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="#">Merek</a></li>
            <li><a href="#" class="{{ request()->is('mobil*') ? 'active' : '' }}">Mobil</a></li>
            {{-- <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">About</a>

                <div class="dropdown-menu">
                  <a class="dropdown-item" href="about.html">About Us</a>
                  <a class="dropdown-item" href="blog.html">Blog</a>
                  <a class="dropdown-item" href="team.html">Team</a>
                  <a class="dropdown-item" href="testimonials.html">Testimonials</a>
                  <a class="dropdown-item" href="faq.html">FAQ</a>
                  <a class="dropdown-item" href="terms.html">Terms</a>
                </div>
              </li> --}}
            @auth
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>

                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Pesanan</a>
                  <a href="{{ route('logout') }}" onclick="event.preventDefault();logout()" class="dropdown-item">
                    Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                  </form>
                </div>
              </li>
            @else
              <li><a href="{{ route('login') }}">Login/Daftar</a></li>
            @endauth
          </ul>
          <a class='menu-trigger'>
            <span>Menu</span>
          </a>
          <!-- ***** Menu End ***** -->
        </nav>
      </div>
    </div>
  </div>
</header>

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
