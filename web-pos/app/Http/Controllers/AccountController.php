<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Perusahaan;
use App\Models\Satker;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    // Setting Profile
    public function index()
    {
        return view(
            'pages.account.index',
            [
                'user' => Auth::user(),
                'perusahaans' => Perusahaan::all(),
                'satkers' => Satker::all(),
                'modal' => 0,
                'title' => ''
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

    public function update(Request $request, Level $level)
    {
        // dd($request);
        $user = Auth::user();

        // $file_name = $request->image->getClientOriginalName();

        $rules = [
            'name' => 'required',
            // 'username' => 'required',
            'phonenumber' => 'required',
            'satker_id' => 'required',
            // 'email' => 'required',
            // 'satker' => 'required',

        ];


        if ($request->email != $user->email) {
            $rules['email'] = 'required|unique:users';
        }
        if ($request->username != $user->username) {
            $rules['username'] = 'required|unique:users';
        }

        $validatedData = $request->validate($rules);
        $validatedData['id'] = auth()->user()->id;
        $validatedData['level_id'] = auth()->user()->level_id;


        User::where('id', $user->id)
            ->update($validatedData);
        session()->put('modal', 0);

        return redirect('account')->with('succes', 1)->withInput();
    }

    // Delete DELETE
    public function destroy()
    {
        $user = Auth::user();
        // if ($user->image) {
        //     Storage::delete($user->image);
        // }
        session()->put('modal', 0);

        User::destroy($user->id);
        return redirect('/')->with('success', 'User telah dihapus')->withInput();
    }
}
