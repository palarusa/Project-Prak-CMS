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

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return pelanggan::all();
    }

    public static function find($id)
    {
        return pelanggan::where('id', $id)->first();
    }
}