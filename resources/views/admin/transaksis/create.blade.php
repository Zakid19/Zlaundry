@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        @include('layouts.alert')
        <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto">Settings</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <form action="{{ route('transaksi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_id" >Customer</label>
                            <select class="form-control" name="customer_id">
                                <option disabled selected>Masukan Nama Customers</option>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->nama }}</option>
                            @endforeach
                            @error('customer_id')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="outlet_id">Outlet</label>
                            <select class="form-control" name="outlet_id">
                                <option disabled selected>Masukan Nama Outlet</option>
                            @foreach($outlets as $outlet)
                                <option value="{{ $outlet->id }}">{{ $outlet->nama_outlet }}</option>
                            @endforeach
                            @error('outlet_id')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="paket_id" >Nama Paket</label>
                            <select class="form-control" id="paket" name="paket_id[]">
                                <option disabled selected>Masukan Paket</option>
                            @foreach($pakets as $paket)
                                <option value="{{ $paket->id }}">{{ $paket->nama_paket }}</option>
                            @endforeach
                            @error('paket_id')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qty" class="form-control-label">Jumlah Barang</label>
                            <input class="form-control" type="text" name="qty[]" value="{{ old('qty') }}">
                        </div>
                        @error('qty')
                            <div>
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('transaksi.index')}}">Batal</a>
                        </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
    </div>
</div>
@endsection
