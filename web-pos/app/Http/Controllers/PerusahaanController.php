<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Satker;
use App\Models\User;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function store(Request $request)
    {

        // dd($validatedData);
        $validatedData = $request->validate([
            'nama_perusahaan' => ['required', 'unique:perusahaans'],
        ]);

        // $validatedData['user_id'] = auth()->user()->id;
        Perusahaan::create($validatedData);

        return redirect()->route('users')->with('success', 'Perusahaan Berhasil Ditambahkan !');
    }

    public function show(Perusahaan $perusahaan)
    {
        $satkers = Satker::latest()->get();
        $users = User::latest()->get();


        return view('pages.perusahaan.index', [
            'perusahaan' => $perusahaan,
            'satkers' => $satkers,
            'users' => $users,
        ]);
    }
    public function destroy(Perusahaan $perusahaan)
    {
        Perusahaan::destroy($perusahaan->id);
        return redirect()->back()->with('success', 'Perusahaan telah di hapus');
    }
}
