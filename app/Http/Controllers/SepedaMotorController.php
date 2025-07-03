<?php

namespace App\Http\Controllers;

use App\Models\SepedaMotor;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SepedaMotorController extends Controller
{
    public function index()
    {
        $motor = SepedaMotor::all();
        return view('SepedaMotor.index', compact('motor'));
    }

    public function create()
    {
        return view('SepedaMotor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'merk'      => 'required|string|max:255',
            'tipe'      => 'required|string|max:255',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
        ]);

        try {
            SepedaMotor::create($validated);
            \Log::info('Sepeda motor berhasil ditambahkan', compact('validated'));
            return redirect()->route('sepeda_motor.index')->with('success', 'Sepeda motor berhasil ditambahkan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menambahkan sepeda motor', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat menyimpan data motor.');
        }
    }

    public function show($id)
    {
        try {
            $motor = SepedaMotor::findOrFail($id);
            return view('SepedaMotor.show', compact('motor'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('SepedaMotor.index')->with('error', 'Data sepeda motor tidak ditemukan.');
        }
    }

    public function edit($id)
    {
        try {
            $motor = SepedaMotor::findOrFail($id);
            return view('SepedaMotor.edit', compact('motor'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('SepedaMotor.index')->with('error', 'Data sepeda motor tidak ditemukan.');
        }
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'merk'      => 'required|string|max:255',
            'tipe'      => 'required|string|max:255',
            'harga'     => 'required|numeric|min:0',
            'stok'      => 'required|integer|min:0',
        ]);

        try {
            $motor = SepedaMotor::findOrFail($id);
            $motor->update($validated);
            \Log::info('Sepeda motor berhasil diperbarui', compact('id', 'validated'));
            return redirect()->route('SepedaMotor.index')->with('success', 'Data sepeda motor berhasil diperbarui.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('SepedaMotor.index')->with('error', 'Data sepeda motor tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal memperbarui sepeda motor', ['error' => $e->getMessage()]);
            return back()->withInput()->with('error', 'Terjadi kesalahan saat memperbarui data motor.');
        }
    }

    public function destroy($id)
    {
        try {
            $motor = SepedaMotor::findOrFail($id);
            $motor->delete();
            \Log::info('Sepeda motor berhasil dihapus', compact('id'));
            return redirect()->route('SepedaMotor.index')->with('success', 'Data sepeda motor berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('SepedaMotor.index')->with('error', 'Data sepeda motor tidak ditemukan.');
        } catch (\Exception $e) {
            \Log::error('Gagal menghapus sepeda motor', ['error' => $e->getMessage()]);
            return redirect()->route('SepedaMotor.index')->with('error', 'Terjadi kesalahan saat menghapus data motor.');
        }
    }
}
