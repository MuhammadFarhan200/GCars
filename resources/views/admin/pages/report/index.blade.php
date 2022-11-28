@extends('admin.layouts.main')
@section('title-page', 'Daftar Mobil')

@section('page-heading')
  <h2>Report</h2>
  <p>Buat report data berdasarkan tanggal yang anda inginkan</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>Report Transaksi</h3>
        </div>
        <div class="card-body">
          <form action="{{ route('getReport') }}" method="post">
            @csrf
            <div class="row px-2 align-items-end mb-4">
              <div class="col-md-4">
                <label for="">Tanggal Awal</label>
                <input type="date" name="tanggal_awal" id="" class="form-control">
              </div>
              <div class="col-md-4">
                <label for="">Tanggal Akhir</label>
                <input type="date" name="tanggal_akhir" id="" class="form-control">
              </div>
              <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Get</button>
              </div>
            </div>
          </form>
          <div class="table-responsive p-2">
            <table class="table table-hover table-bordered text-center">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Transaksi</th>
                  <th>Pesanan</th>
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
                      {{ $list_report->pesanan->mobil->merek->nama . '  ' . $list_report->pesanan->mobil->tipe . ' - ' . $list_report->pesanan->pemesan->nama_lengkap }}
                    </td>
                    <td>{{ date('d M, Y', strtotime($list_report->tanggal_bayar)) }}</td>
                    <td>{{ $list_report->status_transaksi }}</td>
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
