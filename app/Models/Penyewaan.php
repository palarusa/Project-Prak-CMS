<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SepedaMotor;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaan';
    protected $fillable = ['id_pelanggan', 'id_sepedamotor', 'id_petugas', 'tgl_sewa', 'lama_sewa', 'total_biaya'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function SepedaMotor()
    {
        return $this->belongsTo(SepedaMotor::class, 'id_sepedamotor');
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class, 'id_petugas');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_sewa');
    }
}
