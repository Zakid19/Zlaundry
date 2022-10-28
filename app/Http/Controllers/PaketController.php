<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketController extends Controller
{
    public function index()
    {
       return view('admin.pakets.paket', [
        'pakets' => Paket::latest()->simplePaginate(10),
        'title' => 'Paket',
       ]);
    }

    public function create()
    {
       return view('admin.pakets.create', [
        'outlets' => Outlet::get(),
        'title' => 'Add Paket',
       ]);
    }

    public function store(Request $request)
    {
        // dd(request('outlet'));
        $request->validate([
            'nama_paket' => ['required'],
            'harga' => ['required', 'integer'],
            'outlet' => ['required'],
        ]);

        $outlet = Outlet::find(request('outlet'));

       Paket::create([
            'nama_paket' => request('nama_paket'),
            'slug' => Str::slug(request('nama_paket')),
            'harga' => request('harga'),
            'outlet_id' => request('outlet'),
        ]);

        return redirect('paket')->with('success', 'Paket telah berhasil ditambahkan');
    }

    public function edit(Paket $paket)
    {
       return view('admin.pakets.edit', [
            'paket' => $paket,
            'outlets' => Outlet::get(),
            'title' => 'Edit Data Paket'
       ]);
    }

    public function update(Paket $paket)
    {
        request()->validate([
            'nama_paket' => 'required',
            'harga' => ['required', 'integer'],
            'outlet' => ['required'],
        ]);

       $paket->update([
            'nama_paket' => request('nama_paket'),
            'slug' => Str::slug(request('nama_paket')),
            'harga' => request('harga'),
            'outlet_id' => request('outlet'),
        ]);

        return redirect('paket')->with('success', 'Paket telah berhasil diupdate');
    }

    public function destroy(Paket $paket)
    {
        $paket->delete();
        return back()->with('success','Data telah dihapus');
    }
}
