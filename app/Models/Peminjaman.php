<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'user_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'status',
        'alasan'
    ];

    public function barang():BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
