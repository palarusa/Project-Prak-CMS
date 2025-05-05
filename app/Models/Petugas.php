<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas'; 
    protected $fillable = ['nama', 'no_telepon', 'alamat'];

    protected $primaryKey = 'id'; 

    public $incrementing = false; 
    protected $keyType = 'string';

    public static function getAll()
    {
        return petugas::all();
    }

    public static function find($id)
    {
        return petugas::where('id', $id)->first();
    }
}