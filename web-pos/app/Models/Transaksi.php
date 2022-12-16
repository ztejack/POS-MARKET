<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = [
        'metode_Byr',
        'id_pelanggan',
        'id_tagihan',
        'total_Byr',

    ];
    public function detail_transaksis()
    {
        return $this->hasMany(DetailTransaksi::class, 'id_Transaksi');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_pelanggan');
    }
    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan');
    }
}
