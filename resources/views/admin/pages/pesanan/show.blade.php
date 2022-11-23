@extends('admin.layouts.main')

@section('title-page', 'Detail Pesanan')
@section('page-heading')
  <h2>Transaksi</h2>
  <p>Lihat detail <b>transaksi</b> dibawah ini</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-ld-10">
      <div class="card">
        <div class="card-header">
          <h3>Detail Pesanan</h3>
        </div>
        <div class="card-body">
          <div class="mt-2">
            <h5>Data Pemesan</h5>
            <table cellpadding="7px">
              <tbody>
                <tr>
                  <th>Pemesan</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->nama_lengkap }}</td>
                </tr>
                <tr>
                  <th>Alamat Lengkap</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->alamat_lengkap }}</td>
                </tr>
                <tr>
                  <th>No Hp</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->no_hp }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="mt-3">
            <h5>Data Akun Pemesan</h5>
            <table cellpadding="7px">
              <tbody>
                <tr>
                  <th>Name</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->user->name }}</td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->user->username }}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>:</td>
                  <td>{{ $pesanan->pemesan->user->email }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="mt-3">
            <h5>Data Pesanan Lainnya</h5>
            <table cellpadding="7px">
              <tbody>
                <tr>
                  <th>Id Pesanan</th>
                  <td>:</td>
                  <td>{{ $pesanan->id }}</td>
                </tr>
                <tr>
                  <th>Status Pesanan</th>
                  <td>:</td>
                  <td class="badges">
                    <span
                      class="
                        {{ $pesanan->status_pesanan == 'tertunda' ? 'badge bg-secondary' : '' }}
                        {{ $pesanan->status_pesanan == 'diproses' ? 'badge bg-info' : '' }}
                        {{ $pesanan->status_pesanan == 'berhasil' ? 'badge bg-success' : '' }}
                        {{ $pesanan->status_pesanan == 'gagal' ? 'badge bg-danger' : '' }}
                    ">{{ $pesanan->status_pesanan }}</span>
                  </td>
                </tr>
                <tr>
                  <th>Tanggal Pesan</th>
                  <td>:</td>
                  <td>{{ date('d M, Y', strtotime($pesanan->tanggal_pesan)); }}</td>
                </tr>
                <tr>
                  <th>Harga Mobil</th>
                  <td>:</td>
                  <td>Rp{{ number_format($pesanan->mobil->harga, 2, ',', '.') }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('pemesanan.index') }}" class="btn btn-danger me-3">Kembali</a>
            <a href="{{ route('pemesanan.edit', $pesanan->id) }}" class="btn btn-primary">Ubah Status</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
