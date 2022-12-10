@extends('admin.layouts.main')
@section('title-page', 'Laporan')

@section('page-heading')
  <h2>Laporan</h2>
  <p>Tampilkan laporan transaksi berdasarkan tanggal yang anda inginkan</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3>Laporan Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('getReport') }}" method="post">
            @csrf
            <div class="row px-2 align-items-end mb-4">
              <div class="col-md-4">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="" class="form-control mb-3 mb-md-0" value="{{ request('tanggal_awal') }}" required>
              </div>
              <div class="col-md-4">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="" class="form-control mb-3 mb-md-0" value="{{ request('tanggal_akhir') }}" required>
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary px-3">
                  Dapatkan Laporan <i class="bi bi-file-earmark-bar-graph ms-1"></i>
                </button>
              </div>
            </div>
          </form>
          @if (request('tanggal_awal') && request('tanggal_akhir'))
            @if ($data_report->count() < 1)
              <p class="text-center">Riwayat transaksi tidak ditemukan.</p>
            @else
              <div class="table-responsive">
                <table class="table table-hover table-bordered text-center">
                  <thead class="text-nowrap">
                    <tr>
                      <th>No</th>
                      <th>Kode Transaksi</th>
                      <th>Mobil yang Dipesan</th>
                      <th>Pemesan</th>
                      <th>Tanggal Bayar</th>
                      <th>Total Bayar</th>
                      <th>Status Transaksi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap">
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
                        <td>Rp{{ number_format($list_report->total_bayar, 0, ',', '.') }}</td>
                        <td>{{ $list_report->status_transaksi }}</td>
                        <td>
                          <a href="{{ route('singleReport', $list_report->id) }}" class="btn btn-info">Cetak <i class="bi bi-printer-fill ms-1"></i></a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th colspan="6">Jumlah Transaksi</th>
                      <th>{{ $data_report->count() }}</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <div class="d-flex justify-content-start align-items-center mt-4">
                <form action="{{ route('printReport') }}" method="post">
                  @csrf
                  <input type="hidden" name="tanggal_awal" value="{{ request('tanggal_awal') }}">
                  <input type="hidden" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}">
                  <button type="submit" class="btn btn-primary">Cetak Semua <i class="bi bi-printer-fill ms-1"></i></button>
                </form>
              </div>
            @endif
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
