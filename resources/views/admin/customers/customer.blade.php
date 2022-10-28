@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        @include('layouts.alert')
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between">
                <h6>Daftar Customer</h6>
                <a class="btn btn-primary shadow-sm" href="{{ route('customer.create') }}">Add</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Nama Customer</th>
                        <th class="text-uppercase text-secondary text-xs font-weight-bolder">Email</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">No Telepon</th>
                        {{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder">Jenis Kelamin</th> --}}
                        {{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder">Alamat</th> --}}
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($customers as $customer)
                        <tr>
                          <td>
                            <div class="d-flex px-4 py-1">
                                <h6 class="mb-0 text-sm">{{ $customer->nama }}</h6>
                            </div>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm">{{ $customer->email }}</h6>
                          </td>
                          <td class="align-middle text-center">
                            <h6 class="mb-0 text-sm">{{ $customer->no_tlp }}</h6>
                         </td>
                         {{-- <td class="align-middle text-center">
                            <h6 class="mb-0 text-sm">{{ $customer->jenis_kelamin }}</h6>
                         </td> --}}
                         {{-- <td class="align-middle text-center">
                            <h6 class="mb-0 text-sm">{{ $customer->alamat }}</h6>
                         </td> --}}
                          <td class="align-middle text-center text-sm">
                            <a class="btn btn-primary btn-xs shadow-sm" href="{{ route('customer.edit', $customer) }}">
                                <i class="fa fa-pencil-square-o"></i>
                                Edit</a>
                            <a class="btn btn-danger btn-xs shadow-sm" href="{{ route('customer.destroy', $customer) }}">
                                <i class="fa fa-trash-o"></i>
                                Delete
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                </table>
                </div>
                {{ $customers->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
