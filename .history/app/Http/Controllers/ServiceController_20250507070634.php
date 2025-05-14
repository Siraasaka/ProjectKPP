<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'tanggal_servis' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        Service::create($request->all());

        return back()->with('success', 'Jadwal servis disimpan');
    }

    public function update(Request $request, $id)
    {
        $servis = Service::findOrFail($id);
        $servis->update($request->all());

        return back()->with('success', 'Data servis diperbarui');
    }

    public function jadwal()
    {
        $servis = Service::whereBetween('tanggal_servis', [now(), now()->addMonth()])->get();
        return view('servis.jadwal', compact('servis'));
    }
}
