<?php

namespace App\Http\Controllers;

use App\Models\Prajurit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicFormController extends Controller
{
    // Tampilkan form biodata
    public function create()
    {
        return view('public.form');
    }

    // Simpan data prajurit
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nrp' => 'required|string|max:20',
            'nrpbay' =>'required|string|max:20',
            'nama' => 'required|string|max:255',
            'pangkat' => 'nullable|string|max:50',
            'korps' => 'nullable|string|max:20',
            'dinpang' => 'nullable|string|max:50',
            'tmt_tni' => 'nullable|string|max:50',
            'tmt_fiktif' => 'nullable|string|max:50',
            'dinpra' => 'nullable|string|max:50',
            'jab' => 'nullable|string|max:100',
            'temphir' => 'nullable|string|max:100',
            'tglhir' => 'nullable|date',
            'jk' => 'nullable|string|max:20',
            'usia' => 'nullable|string|max:50',
            'suku' => 'nullable|string|max:100',
            'agama' => 'nullable|string|max:50',
            'alamat' => 'nullable|string',
            'lajab' => 'nullable|string|max:50',
            'dikum' => 'nullable|string',
            'dikmil' => 'nullable|string',
            'bahasing' => 'nullable|string|max:100',
            'bahasada' => 'nullable|string|max:100',
            'profesi' => 'nullable|string|max:100',
            'riwpang' => 'nullable|string|max:100',
            'riwjab' => 'nullable|string|max:100',
            'tanja' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

       
        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $filename = time().'_'.$request->file('foto')->getClientOriginalName();
            $request->file('foto')->storeAs('public/foto_prajurit', $filename);
            $validated['foto'] = $filename;
        }

        // Simpan ke database
        Prajurit::create($validated);

        return redirect()->back()->with('success', 'Data prajurit berhasil disimpan!');
    }
}
