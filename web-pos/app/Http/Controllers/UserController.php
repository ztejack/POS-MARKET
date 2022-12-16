<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Level;
use App\Models\Perusahaan;
use App\Models\Satker;
use App\Models\Tagihan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // User
    public function edit(User $user)
    {
        return view(
            'pages.user.editUS',
            [
                'user' => $user,
                'perusahaans' => Perusahaan::get(),
                'satkers' => Satker::get(),
                'levels' => Level::get(),
                'title' => ''
            ]
        );
    }

    public function updateUS(Request $request, User $user)
    {
        $rules = [
            'name' => 'required',
            'username' => 'required',
            'satker_id' => 'required',
            'perusahaan_id' => 'required',
            'phonenumber' => 'required',
            'level_id' => 'required',
        ];

        if (
            $request->email != $user->email
        ) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['id'] = $user->id;

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/users')->with('success', 'User has been Updated');
    }

    public function create()
    {
        return view('pages.user.createUS', [
            'levels' => Level::get(),
            'perusahaans' => Perusahaan::get(),
            'satkers' => Satker::get(),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function store(Request $request)
    {
        // dd($validatedData);
        // dd($request);
        // dd($request);
        $validated = $request->validate([
            'name' => 'required',
            'level_id' => 'required',
            'satker_id' => 'required',
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phonenumber' => ['required', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => 'required',
            // 'remember_token' => Str::random(10)
        ]);


        // $validated['remember_token'] = Str::random(10);
        $validated['password'] = md5(request('password'));

        User::create($validated);
        return redirect()->route('users.create')->with('success', 'User Berhasil Dibuat!');
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function index()
    {
        $users = User::latest()->get();
        $perusahaans = Perusahaan::get();
        $satkers = Satker::latest()->get();

        return view(
            'pages.user.index',
            [
                'users' => $users,
                'perusahaans' => $perusahaans,
                'satkers' => $satkers,
                'levels' => Level::get()
            ]
        );
    }

    public function action(Request $request)
    {
        $pid = $request->post('pid');
        $satkers = Satker::where('perusahaan_id', $pid)->latest()->get();
        $html = '<option value="">Pilih Satuan Kerja</option>';
        foreach ($satkers as $satker) {
            $html .= '<option value="' . $satker->id . '">' . $satker->satker . '</option>';
        }
        echo $html;

        // return response()->json(['html' => $html]);
    }

    // Setting Profile
    public function show(User $user)
    {
        $details = DetailTransaksi::get();
        $transaksis = Transaksi::latest()->get();
        $tagihans = Tagihan::latest()->get();
        $satkers = Satker::latest()->get();
        $perusahaans = Perusahaan::get();
        foreach ($perusahaans->where('id', $user->satker->perusahaan_id) as $name) {
            $perusahaan = $name->nama_perusahaan;
        }
        // dd($tagihans->where('user_id', $user->id));
        return view('pages.user.detail', [
            'user' => $user,
            'transaksis' => $transaksis,
            'details' => $details,
            'tagihans' => $tagihans,
            'perusahaan' => $perusahaan,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        // $file_name = $request->image->getClientOriginalName();

        $rules = [
            'name' => 'required',
            'username' => 'required',
            'satker_id' => 'required',
            'email' => 'required',
            'phonenumber' => 'required',
            'level_id' => 'required',
        ];

        if (
            $request->email != $user->email
        ) {
            $rules['email'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['id'] = auth()->user()->id;

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/user')->with('success', 'Profile has been Updated');
    }
}
