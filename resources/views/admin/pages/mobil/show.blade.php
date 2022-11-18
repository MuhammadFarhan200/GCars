@extends('admin.layouts.main')

@section('title-page', 'Lihat Mobil')
@section('page-heading')
  <h2>Lihat Mobil</h2>
  <p>Lihat salah satu data <b>mobil</b> dibawah ini</p>
@endsection

@section('page-content')
  <div class="row mb-5">
    <div class="col-lg-10 mx-auto">
      <div class="card shadow">
        <div class="card-header">
          <h3>Lihat Mobil</h3>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table>
              <tbody>
                <tr>
                  <th>Tipe</th>
                  <td>:</td>
                  <td>{{ $mobil->tipe }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="d-flex justify-content-end align-items-center mt-4">
            <a href="{{ route('mobil.index') }}" class="btn btn-primary">Kembali</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
