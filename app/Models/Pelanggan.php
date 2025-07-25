<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $fillable = ['nama', 'no_telepon', 'alamat', 'email'];

    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
}
