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
            <li><a href="/merek" class="{{ request()->is('merek*') ? 'active' : '' }}">Merek</a></li>
            <li><a href="/mobil" class="{{ request()->is('mobil*') ? 'active' : '' }}">Mobil</a></li>
            @auth
              <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>

                <div class="dropdown-menu dropdown-menu-start">
                  @if (auth()->user()->role->role == 'admin')
                    <a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a>
                  @else
                    <a class="dropdown-item" href="/user/{{ auth()->user()->username }}">Profil</a>
                    <a class="dropdown-item" href="/pesanan">Pesanan</a>
                  @endif
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
