@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                <p class="mb-0">Edit Profile</p>
                <button class="btn btn-primary btn-sm ms-auto">Settings</button>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <form action="{{ route('customer.update', $customer) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="form-control-label">Nama Customer</label>
                            <input class="form-control" type="text" id="nama" name="nama" value="{{ old('nama', $customer->nama) }}">
                            @error('nama')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-control-label">Email</label>
                            <input class="form-control" type="email" id="email" name="email" value="{{ old('email',$customer->email) }}">
                            @error('email')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_tlp" class="form-control-label">No Telepon</label>
                            <input class="form-control" type="text" id="no_tlp" name="no_tlp" value="{{ old('no_tlp',$customer->no_tlp) }}">
                        </div>
                        @error('no_tlp')
                            <div>
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="jenis_kelamin" class="form-control-label">Jenis Kelamin</label>
                            <input class="form-control" type="text" id="jenis_kelamin" name="jenis_kelamin" value="{{ old('jenis_kelamin', $customer->jenis_kelamin) }}">
                        </div>
                        @error('jenis_kelamin')
                            <div>
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            </div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat" class="form-control-label">Alamat</label>
                            <textarea class="form-control" type="text" id="alamat" name="alamat" value="{{ old('alamat',  $customer->alamat) }}">{{ $customer->alamat }}</textarea>
                            @error('alamat')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('customer.index')}}">Batal</a>
                        </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
    </div>
</div>
@endsection
