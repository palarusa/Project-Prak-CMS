<?php

namespace App\Http\Controllers;

use App\Models\penyewaan;

class PenyewaanController extends Controller
{
    public function index()
    {
        return view('Penyewaan.index', ['Pelangga' => Penyewaan::all()]);
    }

    public function show($id)
    {
        return view('Penyewaan.show', ['penyewaan' => Penyewaan::find($id)]);
    }

    public function create()
    {
        return view('penyewaan.create');
    }

    public function edit($id)
    {
        return view('penyewaan.edit', ['penyewaan' => penyewaan::find($id)]);
    }

    public function delete($id)
    {
        return view('penyewaan.delete', ['penyewaan' => penyewaan::find($id)]);
    }
}