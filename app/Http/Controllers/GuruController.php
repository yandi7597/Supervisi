<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\BerkasGuru;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.guru.index');
    }

    public function jadwal()
    {
        return view('guru.guru.jadwal')->with('i');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required',
            'mata_pelajaran' => 'required',
            'kompetensi_dasar' => 'required',
            'materi' => 'required',
            'rombel' => 'required',
            'jadwal' => 'required',
        ]);

        BerkasGuru::create([
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran' => $request->mata_pelajaran,
            'kompetensi_dasar' => $request->kompetensi_dasar,
            'materi' => $request->materi,
            'rombel' => $request->kompetensi_dasar,
            'jadwal' => $request->jadwal,
        ]);

        $jadwal = Jadwal::all()
            ->where('guru', '=', $request->nama_guru)
            ->where('jadwal', '=', $request->jadwal)
            ->first();

        $jadwal->update([
            'berkas' => 'Diupload',
        ]);

        return redirect()->route('jadwal.guru');
    }

    public function destroy($id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $berkas = BerkasGuru::all()
            ->where('nama_guru', '=', $jadwal->guru)
            ->Where('jadwal', '=', $jadwal->jadwal)
            ->first();

        $jadwal->update([
            'berkas' => 'Belum',
        ]);

        $berkas->delete();

        return redirect('/guru/jadwal');
    }
}
