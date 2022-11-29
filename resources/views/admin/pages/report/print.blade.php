<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Report</title>
  <style type="text/css">
    .container {
      width: 100%;
    }

    .container h2,
    .container h3 {
      margin: 0;
      text-align: center;
    }

    .container h2 {
      margin-bottom: 5px
    }

    .container h3 {
      margin-bottom: 30px
    }

    .table {
      margin-left: auto;
      margin-right: auto;
      caption-side: bottom;
      border-collapse: collapse;
    }

    .table,
    th,
    td {
      border: 1px solid black;
    }

    .table th,
    .table td {
      text-align: center;
      padding: 10px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Laporan Transaksi</h2>
    <h3>Tanggal: {{ date('d-m-Y', strtotime(request('tanggal_awal'))) . ' s/d ' . date('d-m-Y', strtotime(request('tanggal_akhir'))) }}</h3>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
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
              {{ $list_report->pesanan->mobil->merek->nama . ' ' . $list_report->pesanan->mobil->tipe }}
            </td>
            <td>{{ $list_report->pesanan->pemesan->nama_lengkap }}</td>
            <td>{{ date('d-m-Y', strtotime($list_report->tanggal_bayar)) }}</td>
            <td>{{ $list_report->status_transaksi }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>
