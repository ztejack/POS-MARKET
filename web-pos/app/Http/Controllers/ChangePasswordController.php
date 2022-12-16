<?php

namespace App\Http\Controllers;

use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use App\Rules\MatchPassword;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        session()->put('modal', 0);
        return view('changePassword');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', new MatchPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with('err', 0)->withInput();
        }

        ModelsUser::find(auth()->user()->id)->update([
            'password' => md5($request->new_password)
        ]);
        $user = ModelsUser::find(auth()->user()->id);
        $password = $request->new_password;

        $this->setUserPassword($user, $password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        // $this->guard()->login($user);
        return Redirect::back()->with('succes', 1)->withInput();
    }

    protected function setUserPassword($user, $password)
    {
        $user->password = md5($password);
    }
}
