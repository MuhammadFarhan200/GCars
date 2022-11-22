@extends('admin.layouts.main')
@section('title-page', 'Data Pesanan')

@section('page-heading')
  <h2>Pesanan</h2>
  <p>Kelola data <b>Pesanan Mobil</b> pada table dibawah</p>
@endsection

@section('page-content')
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="font-bold text-center m-0">Daftar Pesanan</h3>
        </div>
        <div class="card-body m-0">
          <div class="table-responsive p-2">
            <table class="table table-bordered table-hover text-center" id="dataTable">
              <thead>
                <tr>
                  <th class="text-center">No</th>
                  <th class="text-center">Pemesan</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Status Pesanan</th>
                  <th class="text-center">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $no = 1;
                @endphp
                @foreach ($pesanans as $pesanan)
                  <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pesanan->pemesan->nama_lengkap }}</td>
                    <td>{{ date('d M, Y', strtotime($pesanan->tanggal_pesan)) }}</td>
                    <td class="badges">
                      <span class="
                        {{ $pesanan->status_pesanan == 'tertunda' ? 'badge bg-secondary' : '' }}
                        {{ $pesanan->status_pesanan == 'diproses' ? 'badge bg-info' : '' }}
                        {{ $pesanan->status_pesanan == 'berhasil' ? 'badge bg-success' : '' }}
                        {{ $pesanan->status_pesanan == 'gagal' ? 'badge bg-danger' : '' }}
                      ">{{ $pesanan->status_pesanan }}</span>
                    </td>
                    <td class="text-nowrap">
                      <a href="{{ route('pemesanan.edit', $pesanan->id) }}" class="btn btn-sm btn-warning mx-1">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                      <a href="{{ route('pemesanan.show', $pesanan->id) }}" class="btn btn-sm btn-info mx-1">
                        <i class="bi bi-eye-fill"></i>
                      </a>
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
