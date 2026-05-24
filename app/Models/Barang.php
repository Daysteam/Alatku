<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_id',
        'lokasi_id',
        'nama_barang',
        'jumlah',
        'kode_barang',
        'image',
        'kondisi'
    ];

    public function kategori():BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi():BelongsTo
    {
        return $this->belongsTo(Lokasi::class);
    }
}
