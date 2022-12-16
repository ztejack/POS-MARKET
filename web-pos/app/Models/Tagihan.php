<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'user_id',
        'status',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'id');
    }
}
