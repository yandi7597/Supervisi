<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class KepsekController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();

        return view('kepsek.index', compact('jadwal'))->with('i');
    }
}
