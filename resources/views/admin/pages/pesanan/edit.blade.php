@extends('admin.layouts.main')

@section('title-page', 'Edit Pesanan')
@section('page-heading')
  <h2>Pesanan</h2>
  <p>Ubah <b>status pesanan</b> dengan mengubah isi forum dibawah</p>
@endsection

@section('page-content')
  <div class="row justify-content-center">
    <div class="col-lg-10">
      <div class="card">
        <div class="card-header">
          <h3>Ubah Status Pesanan</h3>
        </div>
        <div class="card-body">
          <table cellpadding="7px">
            <tbody>
              <tr>
                <th>Id Pemesan</th>
                <td>:</td>
                <td>{{ $pesanan->id }}</td>
              </tr>
              <tr>
                <th>Pemesan</th>
                <td>:</td>
                <td>{{ $pesanan->pemesan->nama_lengkap }}</td>
              </tr>
              <tr>
                <th>Tanggal Pesan</th>
                <td>:</td>
                <td>{{ date('d M, Y', strtotime($pesanan->tanggal_pesan)) }}</td>
              </tr>
              <tr>
                <th>Status</th>
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
            </tbody>
          </table>
          <div class="d-flex flex-column flex-sm-row justify-content-end align-items-stretch mt-4 ">
            <a href="{{ route('pemesanan.index') }}" class="btn btn-primary me-sm-auto mb-2">Kembali</a>
            @if ($pesanan->status_pesanan !== 'tertunda')
              <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status_pesanan" value="tertunda">
                <button class="btn btn-secondary me-2 mb-2" type="submit" onclick="event.preventDefault(); confirmChange()">Tandai Tertunda</button>
              </form>
            @endif
            @if ($pesanan->status_pesanan !== 'diproses')
              <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status_pesanan" value="diproses">
                <button class="btn btn-info me-2 mb-2" type="submit">Tandai Diproses</button>
              </form>
            @endif
            @if ($pesanan->status_pesanan !== 'berhasil')
              <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status_pesanan" value="berhasil">
                <button class="btn btn-success me-2 mb-2" type="submit">Tandai Berhasil</button>
              </form>
            @endif
            @if ($pesanan->status_pesanan !== 'gagal')
              <form action="{{ route('pemesanan.update', $pesanan->id) }}" method="post">
                @csrf
                @method('put')
                <input type="hidden" name="status_pesanan" value="gagal">
                <button class="btn btn-danger" type="submit">Tandai Gagal</button>
              </form>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myScript')
  <script>
    function confirmChange() {
      Swal.fire({
        title: 'Anda Yakin Akan Menghapus Data Ini?',
        icon: 'warning',
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonText: 'Hapus',
        cancelButtonText: 'Batal',
        reverseButtons: true
      }).then((wilDelete) => {
        if (wilDelete.isConfirmed) {
          submit();
        }
      })
    }
  </script>
@endsection
