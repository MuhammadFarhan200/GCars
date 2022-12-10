@extends('admin.layouts.main')
@section('title-page', 'Daftar Mobil')

@section('page-heading')
  <h2>Mobil</h2>
  <p>Kelola data <b>Mobil</b> pada table dibawah</p>
@endsection

@section('page-content')
  <div class="row">
    <div class="col">
      {{-- @include('admin.layouts.partials.flash') --}}
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="m-0">Daftar Mobil</h3>
          <a href="{{ route('mobil.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>
            Tambah
          </a>
        </div>
        <div class="card-body m-0">
          <div class="table-responsive p-2">
            <table class="table table-bordered table-hover text-center" id="dataTable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Merek</th>
                  <th class="text-center">Tipe</th>
                  <th class="text-center">Warna</th>
                  <th class="text-center">Tahun Keluar</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($mobils as $mobil)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $mobil->merek->nama }}</td>
                    <td>{{ $mobil->tipe }}</td>
                    <td>{{ $mobil->warna }}</td>
                    <td>{{ $mobil->tahun_keluar }}</td>
                    <td class="text-nowrap">
                        <a href="{{ route('tambahGambar.index', $mobil->id) }}" class="btn btn-sm btn-primary mx-1">
                            <i class="bi bi-plus-lg"></i> <i class="bi bi-images"></i>
                        </a>
                        <a href="{{ route('mobil.edit', $mobil->id) }}" class="btn btn-sm btn-warning mx-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('mobil.show', $mobil->id) }}" class="btn btn-sm btn-info mx-1">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                      <form id="data-{{ $mobil->id }}" action="{{ route('mobil.destroy', $mobil->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm mx-1" type="submit" onclick="event.preventDefault(); confirmDelete({{ $mobil->id }})">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="badges mt-4">
            <h5>Keterangan:</h5>
            <p class="mb-2"><span class="badge py-2 me-1 bg-warning"><i class="bi bi-pencil-square"></i></span> Tombol untuk pindah ke halaman edit</p>
            <p class="mb-2"><span class="badge py-2 me-1 bg-info"><i class="bi bi-eye-fill"></i></span> Tombol untuk pindah ke halaman detail</p>
            <p class="mb-2"><span class="badge py-2 me-1 bg-danger"><i class="bi bi-trash-fill"></i></span> Tombol untuk menghapus data</p>
            <p class="mb-2"><span class="badge py-2 me-1 bg-primary"><i class="bi bi-plus-lg"></i> <i class="bi bi-images"></i></span> Tombol untuk pindah ke halaman kelola gambar</p>
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
        title: 'Anda Yakin Akan Menghapus Data Ini?',
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
