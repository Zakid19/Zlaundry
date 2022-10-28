<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Transaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksis';
    protected $fillable = ['transaksi_id','paket_id','qty','price','total_bayar'];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function paket()
    {
       return $this->belongsTo(Paket::class);
    }

}
