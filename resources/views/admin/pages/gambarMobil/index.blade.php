@extends('admin.layouts.main')

@section('title-page', 'Tambah Gambar Mobil')
@section('page-heading')
  <h2>Gambar Mobil</h2>
  <p>Tambahkan <b>gambar mobil</b> dengan menguoload gambar pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <h3>Tambah Gambar Mobil</h3>
        </div>
        <div class="card-body">
          <p>Mobil yang akan ditambahkan gambar: <b>{{ $mobil->merek->nama . ' ' . $mobil->tipe }}</b></p>
          <form action="{{ route('tambahGambar.store', $mobil->id) }}" method="post" enctype="multipart/form-data" class="dropzone" id="my-dropzone">
            @csrf
            <input type="hidden" name="id_mobil" value="{{ $mobil->id }}">
          </form>
          <p class="mt-2">
            <b>Note: </b>agar gambar muncul setelah diupload, mohon untuk klik icon atau tombol refresh dibawah!
          </p>
          <div class="d-flex justify-content-end mt-4">
            <a href="{{ route('mobil.index') }}" class="btn btn-secondary me-3">Kembali</a>
            <a href="{{ route('mobil.show', $mobil->id) }}" class="btn btn-primary">Detail Mobil</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3 class="text-center">Gambar Mobil {{ $mobil->tipe }}:</h3>
            <button onclick="window.location.reload()" class="btn btn-light rounded-circle py-2 px-2">
                <img src="{{ asset('backend/images/refresh-button.png') }}" alt="" srcset="" width="25px">
            </button>
        </div>
        <div class="card-body">
          <div class="row g-3">
            @if ($gambar->count() < 1 )
              <p class="text-center fs-5">Gambar belum ditambahkan.</p>
            @endif
            @foreach ($gambar as $listGambar)
              <div class="col-lg-3 text-center">
                <img src="{{ url('images/mobil/' . $listGambar->gambar) }}" alt="" srcset="" class="w-100 rounded-3">
                <form id="data-{{ $listGambar->id }}" action="{{ route('tambahGambar.destroy', $listGambar->id) }}" method="post" class="d-inline">
                  @csrf
                  <button class="btn btn-danger btn-sm mt-2" type="submit" onclick="event.preventDefault(); confirmDelete({{ $listGambar->id }})">
                    <i class="bi bi-trash-fill"></i> Hapus
                  </button>
                </form>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myScript')
  <script>
    function confirmDelete(id) {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: 'btn btn-success',
          cancelButton: 'btn btn-danger'
        },
        buttonsStyling: true
      })

      swalWithBootstrapButtons.fire({
        title: 'Anda Yakin Akan Menghapus Gambar Ini?',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((wilDelete) => {
        if (wilDelete.isConfirmed) {
          $('#data-' + id).submit();
        }
      })
    }
  </script>
@endsection
