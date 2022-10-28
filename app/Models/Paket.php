<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;

    protected $fillable = ['outlet_id', 'nama_paket', 'slug', 'harga'];

    public function outlet()
    {
       return $this->belongsTo(Outlet::class);
    }
}
