<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = ['outlet_id', 'customer_id','no_invoice','tgl','jumlah_bayar', 'status'];

    public function customer()
    {
       return $this->belongsTo(Customer::class);
    }

    public function outlet()
    {
       return $this->belongsTo(Outlet::class);
    }
}
