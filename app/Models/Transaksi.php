<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users() {
        return $this->belongsTo(User::class, 'id_customer');
    }

    public function mobils() {
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
}
