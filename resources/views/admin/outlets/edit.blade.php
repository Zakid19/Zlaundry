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
                <form action="{{ route('outlet.update', $outlet) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_outlet" class="form-control-label">Nama Outlet</label>
                            <input class="form-control" type="text" id="nama_outlet" name="nama_outlet" value="{{ old('nama_outlet', $outlet->nama_outlet) }}">
                            @error('nama_outlet')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_tlp" class="form-control-label">No Telepon</label>
                            <input class="form-control" type="text" id="no_tlp" name="no_tlp" value="{{ old('no_tlp', $outlet->no_tlp) }}">
                            @error('no_tlp')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="alamat" class="form-control-label">Alamat</label>
                            <textarea class="form-control" type="text" id="alamat" name="alamat" value="{{ old('alamat', $outlet->alamat) }}">{{ $outlet->alamat }}</textarea>
                            @error('alamat')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary shadow-sm">Simpan</button>
                            <a class="btn btn-light shadow-sm" href="{{route('paket.index')}}">Batal</a>
                        </div>
                    </div>
                </form>

              </div>
            </div>
          </div>
    </div>
</div>
@endsection
