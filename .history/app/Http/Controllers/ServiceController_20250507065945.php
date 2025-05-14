<?php

namespace App\Http\Controllers;

use App\Models\Servis;
use Illuminate\Http\Request;

class ServisController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'tanggal_servis' => 'required|date',
            'keterangan' => 'nullable'
        ]);

        Servis::create($request->all());

        return back()->with('success', 'Jadwal servis disimpan');
    }

    public function update(Request $request, $id)
    {
        $servis = Servis::findOrFail($id);
        $servis->update($request->all());

        return back()->with('success', 'Data servis diperbarui');
    }

    public function jadwal()
    {
        $servis = Servis::whereBetween('tanggal_servis', [now(), now()->addMonth()])->get();
        return view('servis.jadwal', compact('servis'));
    }
}
