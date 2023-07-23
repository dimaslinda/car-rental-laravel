<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function tipes()
    {
        return $this->belongsTo(Tipe::class, 'id_tipe');
    }
    
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
