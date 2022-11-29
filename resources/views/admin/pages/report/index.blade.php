@extends('admin.layouts.main')
@section('title-page', 'Report')

@section('page-heading')
  <h2>Laporan</h2>
  <p>Tampilkan laporan data berdasarkan tanggal yang anda inginkan</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Laporan Data Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('report') }}" method="post">
            @csrf
            <div class="row px-2 align-items-end mb-4">
              <div class="col-md-4">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="" class="form-control mb-3 mb-md-0" required>
              </div>
              <div class="col-md-4">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="" class="form-control mb-3 mb-md-0" required>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary px-3">
                  Dapatkan Laporan <i class="bi bi-file-earmark-bar-graph ms-1"></i>
                </button>
              </div>
            </div>
          </form>
          @if ($data_report->count() < 1)
          @else
            <div class="table-responsive p-2">
              <table class="table table-hover table-bordered text-center">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Transaksi</th>
                    <th>Mobil yang Dipesan</th>
                    <th>Dipesan Oleh</th>
                    <th>Tanggal Bayar</th>
                    <th>Status Transaksi</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                  @endphp
                  @foreach ($data_report as $list_report)
                    <tr>
                      <td>{{ $no++ }}</td>
                      <td>{{ $list_report->kode_transaksi }}</td>
                      <td>
                        {{ $list_report->pesanan->mobil->merek->nama . '  ' . $list_report->pesanan->mobil->tipe }}
                      </td>
                      <td>{{ $list_report->pesanan->pemesan->nama_lengkap }}</td>
                      <td>{{ date('d M, Y', strtotime($list_report->tanggal_bayar)) }}</td>
                      <td>{{ $list_report->status_transaksi }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="d-flex justify-content-start align-items-center">
              <form action="{{ route('printReport') }}" method="post">
                @csrf
                <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                <button type="submit" class="btn btn-primary ms-2">Cetak Laporan <i class="bi bi-printer-fill ms-1"></i></button>
              </form>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
