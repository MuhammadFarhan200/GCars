<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>GCars | Print Laporan</title>
  <style type="text/css">
    .container {
      width: 100%;
      font-size: 12px
    }

    .container h2 {
      margin-bottom: 5px
    }

    .container h3 {
      margin-bottom: 30px
    }

    .table td,
    .table th {
      text-align: left;
      padding: 7px
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Detail Transaksi</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Kode Transaksi</th>
          <th>:</th>
          <td>{{ $data_report->kode_transaksi }}</td>
        </tr>
        <tr>
          <th>Pemesan</th>
          <td>:</td>
          <td>{{ $data_report->pesanan->pemesan->nama_lengkap }}</td>
        </tr>
        <tr>
          <th>Mobil yang dipesan</th>
          <td>:</td>
          <td>{{ $data_report->pesanan->mobil->merek->nama . ' ' . $data_report->pesanan->mobil->tipe }}</td>
        </tr>
        <tr>
          <th>Tanggal Bayar</th>
          <td>:</td>
          <td>{{ date('d-m-Y', strtotime($data_report->tanggal_bayar)) }}</td>
        </tr>
        <tr>
          <th>Total Bayar</th>
          <td>:</td>
          <td>Rp{{ number_format($data_report->total_bayar, 0, ',', '.') }}</td>
        </tr>
        <tr>
          <th>Status Transaksi</th>
          <td>:</td>
          <td>{{ $data_report->status_transaksi }}</td>
        </tr>
      </thead>
    </table>
  </div>

</body>
</html>
