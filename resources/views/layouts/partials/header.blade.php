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
            <li><a href="#" class="{{ request()->is('mobil*') ? 'active' : '' }}">Cars</a></li>
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
            <li><a href="#">Contact</a></li>
            <li><a href="#">Profile</a></li>
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
