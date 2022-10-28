<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OutletController extends Controller
{
    public function index()
    {
       return view('admin.outlets.outlet', [
        'outlets' => Outlet::latest()->simplePaginate(10),
        'title' => 'Outlet',
       ]);
    }

    public function create()
    {
       return view('admin.outlets.create',[
        'title' => 'Add Outlet',
       ]);
    }

    public function store(Request $request)
    {
        // dd('oke');
        $request->validate([
            'nama_outlet' => ['required', 'unique:outlets,nama_outlet'],
            'no_tlp' => ['required', 'unique:outlets,no_tlp', 'min:11', 'max:12'],
            'alamat' => ['required', 'string'],
        ]);

        Outlet::create([
            'nama_outlet' => request('nama_outlet'),
            'slug' => Str::slug(request('nama_outlet')),
            'alamat' => request('alamat'),
            'no_tlp' => request('no_tlp'),
        ]);

        return redirect('outlet')->with('success', 'Outlet telah berhasil ditambahkan');

    }

    public function edit(Outlet $outlet)
    {
       return view('admin.outlets.edit', [
        'outlet' => $outlet,
        'title' => 'Edit Data Outlet',
       ]);
    }

    public function update(Outlet $outlet)
    {
        request()->validate([
            'nama_outlet' => 'required', 'unique:outlets,nama_outlet' . $outlet->id,
            'no_tlp' => 'required', 'min:11', 'max:12', 'unique:outlets,no_tlp',
            'alamat' => ['required', 'string'],
        ]);

        $outlet->update([
            'nama_outlet' => request('nama_outlet'),
            'slug' => Str::slug(request('nama_outlet')),
            'alamat' => request('alamat'),
            'no_tlp' => request('no_tlp'),
        ]);

        return redirect('outlet')->with('success', 'Outlet telah berhasil diupdate');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->pakets()->delete();
        $outlet->delete();
        return back()->with('success','Data telah dihapus');
    }
}
