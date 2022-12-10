@extends('admin.layouts.main')
@section('title-page', 'Daftar Transaksi')

@section('page-heading')
  <h2>Transaksi</h2>
  <p>Kelola data <b>transaksi</b> pada table dibawah</p>
@endsection

@section('page-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
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
              <thead class="text-center text-nowrap">
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Mobil yang Dipesan</th>
                  <th class="text-center">Pemesan</th>
                  <th>Tanggal Bayar</th>
                  <th class="text-center">Status Transaksi</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody class="text-nowrap">
                @php
                  $no = 1;
                @endphp
                @foreach ($allTransaksi as $transaksi)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $transaksi->kode_transaksi }}</td>
                    <td>
                      {{ $transaksi->pesanan->mobil->merek->nama . '  ' . $transaksi->pesanan->mobil->tipe }}
                    </td>
                    <td>{{ $transaksi->pesanan->pemesan->nama_lengkap }}</td>
                    <td>{{ date('d M, Y', strtotime($transaksi->tanggal_bayar)) }}</td>
                    <td class="badges">
                      <span
                        class="
                        {{ $transaksi->status_transaksi == 'Lunas' ? 'badge bg-success p-2' : '' }}
                        {{ $transaksi->status_transaksi == 'Pembayaran Sebagian' ? 'badge bg-primary p-2' : '' }}
                        {{ $transaksi->status_transaksi == 'Menunggu Pembayaran' ? 'badge bg-warning p-2' : '' }}
                        ">{{ $transaksi->status_transaksi }}</span>
                    </td>
                    <td class="text-nowrap">
                      <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-sm btn-warning mx-1">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="{{ route('transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info mx-1">
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
          <div class="badges mt-4">
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
