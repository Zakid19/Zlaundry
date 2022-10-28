<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function index()
    {
       return view('admin.customers.customer', [
        'customers' => Customer::latest()->simplePaginate(10),
        'title' => 'Data Customer'
       ]);
    }

    public function create()
    {
        return view('admin.customers.create', [
            'title' => 'Create Customer'
        ]);
    }

    public function store(Request $request)
    {
        // dd(request()->all());

        $request->validate([
            'nama' => ['required', 'string'],
            'email' => ['required', 'unique:customers,email'] ,
            'no_tlp' => ['required', 'unique:customers,no_tlp', 'min:11', 'max:12'],
            'jenis_kelamin' => ['required', 'string'],
            'alamat' => ['required'],
        ]);

        Customer::create([
            'nama' => request('nama'),
            'slug' => Str::slug(request('nama')),
            'email' => request('email'),
            'no_tlp' => request('no_tlp'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
        ]);

        return redirect('customer')->with('success', 'Customer telah berhasil ditambahkan');
    }

    public function edit(Customer $customer)
    {
       return view('admin.customers.edit', [
        'customer' => $customer,
        'title' => 'Edit Customer',
       ]);
    }

    public function update(Customer $customer)
    {
        request()->validate([
            'nama' => ['required', 'string'],
            'email' => 'required', 'unique:customers,email'. $customer->id ,
            'no_tlp' => 'required', 'unique:customers,no_tlp', 'min:11', 'max:12'. $customer->id ,
            'jenis_kelamin' => ['required', 'string'],
            'alamat' => ['required'],
        ]);

        $customer->update([
            'nama' => request('nama'),
            'slug' => Str::slug(request('nama')),
            'email' => request('email'),
            'no_tlp' => request('no_tlp'),
            'jenis_kelamin' => request('jenis_kelamin'),
            'alamat' => request('alamat'),
        ]);

        return redirect('customer')->with('success', 'Customer telah berhasil diupdate');
    }

    public function destroy(Customer $customer)
    {
       $customer->delete();
       return back()->with('success','Data Customer telah dihapus');
    }
}
