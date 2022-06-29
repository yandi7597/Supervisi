<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class SupervisorController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('guru.supervisor.index', compact('jadwal'))->with('i');
    }

    public function supervisi($id)
    {
        $jadwal = Jadwal::all()
            ->where('id', '=', $id)
            ->first();

        $jadwal->update([
            'status' => 'Proses',
        ]);

        return view('guru.supervisor.supervisi', compact('jadwal'));
    }
}
