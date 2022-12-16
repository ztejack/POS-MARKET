<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    public function index()
    {

        return view('pages.tagihan.index', [
            // 'users' => $users,
            'tagihans' => Tagihan::latest()->get(),
        ]);
    }
}
