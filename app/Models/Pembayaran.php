<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $fillable = ['id_sewa', 'tgl_bayar', 'metode', 'jumlah_bayar', 'id_petugas'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function penyewaan()
    {
        return $this->belongsTo(Penyewaan::class, 'id_sewa');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }
}
