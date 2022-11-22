@extends('admin.layouts.main')
@section('title-page', 'Data Transaksi')

@section('page-heading')
  <h2>Transaksi</h2>
  <p>Kelola data <b>transaksi</b> pada table dibawah</p>
@endsection

@section('page-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="font-bold text-center m-0">Daftar Transaksi</h3>
          <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
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
                  <th class="text-center">Pemesan</th>
                  <th class="text-center">Tanggal Bayar</th>
                  <th class="text-center">Status Transaksi</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($allTransaksi as $transaksi)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $transaksi->pesanan->pemesan->nama_lengkap }}</td>
                    <td>{{ $transaksi->tanggal_bayar }}</td>
                    <td class="badges">
                        <span class="
                        {{ $transaksi->status_trasaksi == 'Lunas' ? 'badge bg-success' : '' }}
                        {{ $transaksi->status_trasaksi == 'Pembayaran Sebagian' ? 'badge bg-info' : '' }}
                        {{ $transaksi->status_trasaksi == 'Menunggu Pembayaran' ? 'badge bg-warning' : '' }}
                        ">{{ $transaksi->status_transaksi }}</span>
                    </td>
                    <td class="text-nowrap">
                        <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-success mx-1">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                        <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-warning mx-1">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                      <form id="data-{{ $transaksi->id }}" action="{{ route('transaksi.destroy', $transaksi->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm mx-1" type="submit" onclick="event.preventDefault(); confirmDelete({{ $transaksi->id }})">
                          <i class="bi bi-trash-fill"></i>
                        </button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
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

