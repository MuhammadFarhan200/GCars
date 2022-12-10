@extends('admin.layouts.main')
@section('title-page', 'Daftar Merek')

@section('page-heading')
  <h2>Merek</h2>
  <p>Kelola data <b>Merek</b> pada table dibawah</p>
@endsection

@section('page-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="font-bold text-center m-0">Daftar Merek</h3>
          <a href="{{ route('merek.create') }}" class="btn btn-primary">
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
                  <th class="text-center">Nama Merek</th>
                  <th class="text-center">Slug</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($mereks as $merek)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $merek->nama }}</td>
                    <td>{{ $merek->slug }}</td>
                    <td class="text-nowrap">
                      <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-sm btn-warning mx-1">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="{{ route('merek.show', $merek->id) }}" class="btn btn-sm btn-info mx-1">
                        <i class="bi bi-eye-fill"></i>
                      </a>
                      <form id="data-{{ $merek->id }}" action="{{ route('merek.destroy', $merek->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm mx-1" type="submit" onclick="event.preventDefault(); confirmDelete({{ $merek->id }})">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="badges mt-4 ms-2">
            <h5>Keterangan:</h5>
            <p class="mb-2"><span class="badge py-2 me-1 bg-warning"><i class="bi bi-pencil-square"></i></span> Tombol untuk pindah ke halaman edit</p>
            <p class="mb-2"><span class="badge py-2 me-1 bg-info"><i class="bi bi-eye-fill"></i></span> Tombol untuk pindah ke halaman detail</p>
            <p class="mb-2"><span class="badge py-2 me-1 bg-danger"><i class="bi bi-trash-fill"></i></span> Tombol untuk menghapus data</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myScript')
  <script>
    function confirmDelete(id) {
      Swal.fire({
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
