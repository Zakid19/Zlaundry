@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
    @include('layouts.alert')
      <div class="card mb-4">
        <div class="card-header pb-0 d-flex justify-content-between">
          <h6>Paket Table</h6>
                <a class="btn btn-primary shadow-sm" href="{{ route('paket.create') }}">Add</a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama Paket</th>
                  <th class="text-uppercase text-secondary text-xs font-weight-bolder ps-2">Harga</th>
                  <th class="text-uppercase text-center text-secondary text-xs font-weight-bolder">Nama Outlet</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($pakets as $paket)
                <tr>
                  <td>
                    <div class="d-flex px-4 py-1">
                        <h6 class="mb-0 text-sm">{{ $paket->nama_paket }}</h6>
                    </div>
                  </td>
                  <td>
                    <h6 class="mb-0 text-sm">{{ $paket->harga }}</h6>
                  </td>
                  <td class="align-middle text-center">
                    <div class="">
                        <h6 class="mb-0 text-sm">{{ $paket->outlet->nama_outlet }}</h6>
                    </div>
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
          {{ $pakets->links() }}
        </div>
      </div>
    </div>
</div>
@endsection
