<div class="mb-3 d-flex justify-content-between d-xl-none">
  {{-- Hamburger Button --}}
  <a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
  </a>
  <div class="card">
    <div class="card-body py-3 px-4">
      <div class="d-flex align-items-center ms-auto">
        <div class="avatar avatar-sm">
          <img src="{{ auth()->user()->image() }}" alt="{{ auth()->user()->foto_profil }}">
        </div>
        <div class="ms-3 name">
          <h5 class="font-bold text-small mb-0">{{ auth()->user()->name }}</h5>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-heading d-flex justify-content-between align-items-center">
  <div class="top-text">
    <div>@yield('page-heading')</div>
  </div>
  <div class="card d-xl-block d-none">
    <div class="card-body py-3 px-4">
      <div class="d-flex align-items-center ms-auto">
        <div class="avatar avatar-md">
          <img src="{{ auth()->user()->image() }}" alt="">
        </div>
        <div class="ms-3 name">
          <h5 class="font-bold mb-0">{{ auth()->user()->name }}</h5>
        </div>
      </div>
    </div>
  </div>
</div>
