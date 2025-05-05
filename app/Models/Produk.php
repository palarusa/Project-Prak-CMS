<?php

namespace App\Models;

class Produk
{
    private static $data = [
        [
            'Id_Produk' => 'P001',
            'Nama' => 'Kemeja Panjang',
            'Harga' => 'Rp 180.000',
            'Kategori' => 'Baju'
        ],
        [
            'Id_Produk' => 'P002',
            'Nama' => 'Celana Konduroy',
            'Harga' => 'Rp 120.000',
            'Kategori' => 'Celana'
        ],
        
    ];

    public static function all()
    {
        return self::$data;
    }

    public static function find($id)
    {
        foreach (self::$data as $Produk) {
            if ($Produk['Id_Produk'] == $id) {
                return $Produk;
            }
        }
        return null;
    }
}