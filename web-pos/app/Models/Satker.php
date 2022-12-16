<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = [
        'perusahaan_id',
        'satker',
    ];
    public function perusahaan()
    {
        return $this->belongsTo("App\Models\Perusahaan");
    }
    public function user()
    {
        return $this->hasMany("App\Models\User");
    }
}
