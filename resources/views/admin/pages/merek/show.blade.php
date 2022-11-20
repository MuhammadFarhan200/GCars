@extends('admin.layouts.main')

@section('title-page', 'Edit Merek')
@section('page-heading')
  <h2>Merek</h2>
  <p>Lihat salah satu data <b>merek</b> pada forum dibawah</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-8 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Show Data Merek</h3>
        </div>
        <div class="card-body">
          <table cellpadding="10px">
            <tbody>
              <tr>
                <th>Nama Merek</th>
                <td>:</td>
                <td>{{ $merek->nama }}</td>
              </tr>
              <tr>
                <th>Slug</th>
                <td>:</td>
                <td>{{ $merek->slug }}</td>
              </tr>
              <tr>
                <th>Daftar Mobil dengan merek {{ $merek->nama }}</th>
                <td>:</td>
                <td></td>
              </tr>
              <tr>
                <td colspan="3">
                  @if ($listMobil->count() < 1)
                    - Mobil belum ada -
                  @else
                    <ol>
                      @foreach ($listMobil as $mobil)
                        <li>{{ $mobil->tipe }}</li>
                      @endforeach
                    </ol>
                  @endif
                </td>
              </tr>
            </tbody>
          </table>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('merek.index') }}" class="btn btn-primary px-3 me-3">Kembali</a>
            <a href="{{ route('merek.edit', $merek->id) }}" class="btn btn-success px-3">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myScript')
  <script>
    document.querySelector('#nama').addEventListener('input', function() {
      document.querySelector('#slug').value = this.value.toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '-')
        .replace(/^-+|-+$/g, '');
    });
  </script>
@endsection
