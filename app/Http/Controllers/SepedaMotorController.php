<?php

namespace App\Http\Controllers;

use App\Models\SepedaMotor;
use Illuminate\Http\Request;

class SepedaMotorController extends Controller
{
    public function index() {
        $motor = SepedaMotor::all();
        return view('sepedamotor.index', compact('motor'));
    }

    public function create() {
        return view('sepedamotor.create');
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
        return redirect()->route('sepedamotor.index')->with('success', 'Sepeda motor ditambahkan.');
    }

    public function show($id) {
        $motor = SepedaMotor::findOrFail($id);
        return view('sepedamotor.show', compact('motor'));
    }

    public function edit($id) {
        $motor = SepedaMotor::findOrFail($id);
        return view('sepedamotor.edit', compact('motor'));
    }

    public function update(Request $request, $id) {
        $motor = SepedaMotor::findOrFail($id);
        $motor->update($request->all());
        return redirect()->route('sepedamotor.index')->with('success', 'Data sepeda motor diperbarui.');
    }

    public function destroy($id) {
        SepedaMotor::destroy($id);
        return redirect()->route('sepedamotor.index')->with('success', 'Data sepeda motor dihapus.');
    }
}