<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('pages.vehicles.index', compact('vehicles'));
    }

    public function create()
    {
        return view('pages.vehicles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nup' => 'required|unique:kendaraans',
            'nomor_polisi' => 'required|unique:kendaraans',
            'tahun_pembuatan' => 'required|integer|min:1900|max:' . date('Y'),
            'stnk' => 'required|integer|min:1900|max:' . (date('Y') + 5), // Validasi tahun STNK
        ]);

        Vehicle::create($request->all());
        return redirect()->route('pages.vehicles.index')->with('success', 'Kendaraan berhasil ditambahkan.');
    }

    public function edit(Vehicle $vehicle)
    {
        return view('pages.vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update($request->all());
        return redirect()->route('pages.vehicles.index')->with('success', 'Kendaraan berhasil diupdate.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return redirect()->route('pages.vehicles.index')->with('success', 'Kendaraan berhasil dihapus.');
    }
}
