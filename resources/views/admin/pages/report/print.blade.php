<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Print Report</title>
  <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
</head>

<body>

  <div class="container">
    <table class="table table-bordered border-dark">
      <thead>
        <tr>
          <th>#</th>
          <th>Kode Transaksi</th>
          <th>Pesanan</th>
          <th>Tanggal Bayar</th>
          <th>Status Transaksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data_report as $list_report)
          <tr>
            <td>{{ $list_report->kode_transaksi }}</td>
            <td>
              {{ $list_report->pesanan->mobil->merek->nama . ' ' . $list_report->pesanan->mobil->tipe . ' - ' . $list_report->pesanan->pemesan->nama_lengkap }}
            </td>
            <td>{{ $list_report->tanggal_bayar }}</td>
            <td>{{ $list_report->status_transaksi }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</body>

</html>
