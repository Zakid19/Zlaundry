<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = ['nama_outlet', 'slug', 'alamat', 'no_tlp'];

    public function pakets()
    {
       return $this->hasMany(Paket::class);
    }
}
