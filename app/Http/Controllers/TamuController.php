<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tamu;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    public function index()
    {
        return view('inputdata');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'namalengkap' => 'required',
            'instansi' => 'required',
            'no_hp' => 'required',
            'bertemu_dengan' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required|date',
            'jam' => 'required',
            'foto' => 'nullable',
        ]);
        
        if ($request->has('foto')) {
            $image = $request->foto;
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'tamu_' . time() . '.png';
            Storage::disk('public')->put('foto_tamu/' . $imageName, base64_decode($image));
            $data['foto'] = 'foto_tamu/' . $imageName;
        }

        Tamu::create($data);
        return redirect()->route('tamu.index')->with('success', 'Data tamu berhasil ditambahkan.');
    }
}
