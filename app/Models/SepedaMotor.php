<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SepedaMotor extends Model
{
    use HasFactory;

    protected $table = 'sepeda_motor';
    protected $fillable = ['merek', 'tipe', 'plat_nomor', 'status', 'harga_sewa_per_hari'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';

    public function penyewaan()
    {
        return $this->hasMany(Penyewaan::class, 'id_sepedamotor');
    }
}
