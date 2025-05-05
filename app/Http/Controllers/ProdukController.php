<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    public function index()
    {
        return view('Produk.index', ['Produk' => Produk::all()]);
    }

    public function show($id)
    {
                return view('Produk.show', ['Produk' => Produk::find($id)]);
            }
        
            public function create()
            {
                return view('produk.create');
            }
        
            public function edit($id)
            {
                return view('Produk.edit', ['Produk' => Produk::find($id)]);
            }
        
            public function delete($id)
            {
                return view('Produk.delete', ['Produk' => Produk::find($id)]);
            }
        }

