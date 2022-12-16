<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function store(Request $request)
    {
        // dd($validatedData);
        $validatedData = $request->validate([
            'perusahaan_id' => 'required',
            'satker' => 'required',
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        // dd($validatedData);
        // new ($validatedData['perusahaan_id'], $validatedData['perusahaan_id']);
        Satker::create($validatedData);


        return redirect()->route('users')->with('success', 'Satuan Kerja Berhasil Ditambahkan !');
    }
    public function destroy(Satker $satker)
    {
        Satker::destroy($satker->id);
        return redirect()->back()->with('success', 'Satuan Kerja telah di hapus');
    }
}
