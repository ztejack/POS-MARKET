<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $fillable = [
        'kodePrd',
        'namaPrd',
        'satuan',
        'stok',
        'modalprice',
        'price',
        'oldprice',
    ];

    public function detail_transaksis()
    {
        return $this->belongsTo(DetailTransaksis::class, 'id');
    }
}
