<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis',
        'kondisi',
        'keterangan',
        'kecacatan',
        'jumlah',
        'gambar',
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
