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
                <form action="{{ route('paket.update', $paket) }}" method="post" enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="outlet" >Outlet</label>
                            <select class="form-control" id="outlet" name="outlet">
                                <option disabled selected>Chose Outlet</option>
                            @foreach($outlets as $outlet)
                                <option {{ $paket->outlet()->find($outlet->id) ? 'selected' : '' }} value="{{ $outlet->id }}">{{ $outlet->nama_outlet }}</option>
                            @endforeach
                            @error('outlet')
                                <div class="mt-2 text-danger">{{ $message }}</div>
                            @enderror
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama_paket" class="form-control-label">Nama Paket</label>
                            <input class="form-control" type="text" id="nama_paket" name="nama_paket" value="{{ old('nama_paket', $paket->nama_paket) }}">
                            @error('nama_paket')
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="harga" class="form-control-label">Harga Paket</label>
                            <input class="form-control" type="text" id="harga" name="harga" value="{{ old('harga', $paket->harga) }}">
                        </div>
                        @error('harga')
                            <div>
                                <div class="mt-2 mb-3 text-xs text-danger">{{ $message }}!</div>
                            </div>
                        @enderror
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
