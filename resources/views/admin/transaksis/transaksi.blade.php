@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
    @include('layouts.alert')
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Data Transaksi</h6>
                <a class="btn btn-primary shadow-sm" href="{{ route('transaksi.create') }}">Add</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">No Invoice</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Tanggal</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Waktu</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Customer</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Jumlah Bayar</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Status</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($transaksis as $transaksi)
                <tr>
                  <td>
                    <div class="d-flex px-4 py-1">
                        <h6 class="mb-0 text-sm">{{ $transaksi->paket_id }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $transaksi->qty }}</h6>
                  </td>
                  <td class="align-middle text-center text-sm">
                    <a class="btn btn-primary btn-xs shadow-sm" href="{{ route('paket.edit', $paket) }}">
                        <i class="fa fa-pencil-square-o"></i>
                        Edit</a>
                    <a class="btn btn-danger btn-xs shadow-sm" href="{{ route('paket.destroy', $paket) }}">
                        <i class="fa fa-trash-o"></i>
                        Delete
                    </a>
                  </td>
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
