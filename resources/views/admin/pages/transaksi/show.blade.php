@extends('admin.layouts.main')

@section('title-page', 'Detail Transaksi')
@section('page-heading')
  <h2>Transaksi</h2>
  <p>Lihat detail <b>transaksi</b> pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <h3>Detail Transaksi</h3>
        </div>
        <div class="card-body">
          <table cellpadding="7px">
            <tbody>
              <tr>
                <th>Kode Transaksi</th>
                <td>:</td>
                <td>{{ $transaksi->kode_transaksi }}</td>
              </tr>
              <tr>
                <th>Pemesan</th>
                <td>:</td>
                <td>{{ $transaksi->pesanan->pemesan->nama_lengkap }}</td>
              </tr>
              <tr>
                <th>Mobil</th>
                <td>:</td>
                <td>
                  {{ $transaksi->pesanan->mobil->merek->nama . ' ' . $transaksi->pesanan->mobil->tipe . ' ' . $transaksi->pesanan->mobil->tahun_keluar . ', ' . $transaksi->pesanan->mobil->warna }}
                </td>
              </tr>
              <tr>
                <th>Tanggal Bayar</th>
                <td>:</td>
                <td>{{ date('d M, Y', strtotime($transaksi->tanggal_bayar)) }}</td>
              </tr>
              <tr>
                <th>Total Bayar</th>
                <td>:</td>
                <td>Rp{{ number_format($transaksi->total_bayar, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <th>Status Transaksi</th>
                <td>:</td>
                <td class="badges">
                  <span
                    class="
                    {{ $transaksi->status_transaksi == 'Lunas' ? 'badge bg-success p-2' : '' }}
                    {{ $transaksi->status_transaksi == 'Pembayaran Sebagian' ? 'badge bg-primary p-2' : '' }}
                    {{ $transaksi->status_transaksi == 'Menunggu Pembayaran' ? 'badge bg-warning p-2' : '' }}
                    ">{{ $transaksi->status_transaksi }}</span>
                </td>
              </tr>
            </tbody>
          </table>
          {{-- <hr /> --}}
          @php
            $sisa = $transaksi->pesanan->mobil->harga - $transaksi->total_bayar;
            // $kembali = $transaksi->total_bayar - $transaksi->pesanan->mobil->harga;
          @endphp
          {{-- <table cellpadding="7px">
            <tbody>
              <tr>
                <th>Harga Mobil</th>
                <td>:</td>
                <td>Rp{{ number_format($transaksi->pesanan->mobil->harga, 0, ',', '.') }}</td>
              </tr>
              <tr>
                <th>Sisa Pembayaran</th>
                <td>:</td>
                <td>Rp
                  @if ($sisa <= 0)
                    0
                  @else
                    {{ number_format($sisa, 0, ',', '.') }}
                  @endif
                </td>
              </tr>
              <tr>
                <th>Uang Kembali</th>
                <td>:</td>
                <td>Rp
                  @if ($transaksi->total_bayar > $transaksi->pesanan->mobil->harga)
                    {{ number_format($kembali, 0, ',', '.') }}
                  @else
                    0
                  @endif
                </td>
              </tr>
            </tbody>
          </table> --}}
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('transaksi.index') }}" class="btn btn-secondary px-3 me-3">Kembali</a>
            <a href="{{ route('transaksi.edit', $transaksi->id) }}" class="btn btn-primary px-3 me-3">Edit</a>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
