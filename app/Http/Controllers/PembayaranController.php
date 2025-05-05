<?php

namespace App\Http\Controllers;

use App\Models\pembayaran;

class pembayaranController extends Controller
{
    public function index()
    {
        return view('pembayaran.index', ['pembayaran' => pembayaran::all()]);
    }

    public function show($id)
    {
        return view('pembayaran.show', ['pembayaran' => pembayaran::find($id)]);
    }

    public function create()
    {
        return view('pembayaran.create');
    }

    public function edit($id)
    {
        return view('pembayaran.edit', ['pembayaran' => pembayaran::find($id)]);
    }

    public function delete($id)
    {
        return view('pembayaran.delete', ['pembayaran' => pembayaran::find($id)]);
    }
}