<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillabel = [
        'transaksi_id',
        'produk_id',
        'nama_Barang',
        'qty',
        'subtotal',
    ];
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_Transaksi');
    }
    public function produk()
    {
        return $this->hasMany(Produk::class, 'id');
    }
}
