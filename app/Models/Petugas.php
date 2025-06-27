<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['nama', 'no_telepon', 'alamat'];

    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class, 'id_petugas');
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'id_petugas');
    }
}
