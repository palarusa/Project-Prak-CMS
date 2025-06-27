<?php

namespace App\Http\Controllers;

use App\Models\SepedaMotor;
use Illuminate\Http\Request;

class SepedaMotorController extends Controller
{
    public function index() {
        $motor = SepedaMotor::all();
        return view('motor.index', compact('motor'));
    }

    public function create() {
        return view('motor.create');
    }

    public function store(Request $request) {
        $request->validate([
            'merek' => 'required',
            'tipe' => 'required',
            'plat_nomor' => 'required',
            'status' => 'required',
            'harga_sewa_per_hari' => 'required|numeric'
        ]);

        SepedaMotor::create($request->all());
        return redirect()->route('motor.index')->with('success', 'Sepeda motor ditambahkan.');
    }

    public function show($id) {
        $motor = SepedaMotor::findOrFail($id);
        return view('motor.show', compact('motor'));
    }

    public function edit($id) {
        $motor = SepedaMotor::findOrFail($id);
        return view('motor.edit', compact('motor'));
    }

    public function update(Request $request, $id) {
        $motor = SepedaMotor::findOrFail($id);
        $motor->update($request->all());
        return redirect()->route('motor.index')->with('success', 'Data sepeda motor diperbarui.');
    }

    public function destroy($id) {
        SepedaMotor::destroy($id);
        return redirect()->route('motor.index')->with('success', 'Data sepeda motor dihapus.');
    }
}