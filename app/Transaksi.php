<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id', 'kode_payment', 'kode_trx', 'total_item',
        'total_harga', 'status', 'resi', 'kurir', 'name', 'phone','kode_unik',
        'detail_lokasi', 'deskripsi', 'metode', 'expired_at'
    ];

    public function details()
    {
        return $this->HasMany(TransaksiDetail::class, "transaksi_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
