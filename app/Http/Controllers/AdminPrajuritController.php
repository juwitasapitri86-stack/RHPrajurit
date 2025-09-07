<?php

namespace App\Http\Controllers;

use App\Models\Prajurit;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPrajuritController extends Controller
{
    // 📋 Daftar prajurit + search + pagination
    public function index(Request $request)
    {
        $keyword = $request->get('search');

        $data = Prajurit::when($keyword, function ($query) use ($keyword) {
            $query->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('nrp', 'like', "%{$keyword}%");
        })->paginate(10); // Pagination 10 per halaman

        return view('admin.prajurit.index', compact('data', 'keyword'));
    }

    // 👀 Detail prajurit
    public function show($id)
    {
        $prajurit = Prajurit::findOrFail($id);
        return view('admin.prajurit.show', compact('prajurit'));
    }

    // edit
    public function edit($id)
    {
        $prajurit = Prajurit::findOrFail($id);
        return view('admin.prajurit.edit', compact('prajurit'));
    }

    public function update(Request $request, $id)
    {
        $prajurit = Prajurit::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nrp' => 'required|string|max:50',
            'pangkat' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:100',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // update data kecuali foto
        $prajurit->update($request->except('foto'));

        // kalau upload foto baru
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('public/foto_prajurit', $filename);

            $prajurit->foto = $filename;
            $prajurit->save();
        }

        return redirect()->route('admin.prajurit.index')->with('success', 'Data prajurit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prajurit = Prajurit::findOrFail($id);
        $prajurit->delete();

        return redirect()->route('admin.prajurit.index')->with('success', 'Data prajurit berhasil dihapus.');
    }

    // 🖨️ Cetak PDF biodata
    public function cetakPdf($id)
    {
        $prajurit = Prajurit::findOrFail($id);

        // Konversi foto ke base64 agar tampil di PDF
        $fotoBase64 = null;
        if ($prajurit->foto && Storage::exists('public/foto_prajurit/'.$prajurit->foto)) {
            $path = Storage::path('public/foto_prajurit/'.$prajurit->foto);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $fotoBase64 = 'data:image/'.$type.';base64,'.base64_encode($data);
        }

        $pdf = Pdf::loadView('admin.prajurit.pdf', [
            'prajurit'   => $prajurit,
            'fotoBase64' => $fotoBase64
        ])->setPaper('A4', 'portrait');

        return $pdf->stream('RHP_'.$prajurit->nrp.'.pdf');
    }
}
