<?php

namespace App\Http\Controllers;

use App\Models\Transaksi as ModelsTransaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ApiTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Satker::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());
        // return response()->json(Satker::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());
    return "abc";

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function id()
    {
        return ModelsTransaksi::count();
    }




    // public function store(Request $request)
    // {
    //     Log::debug($request->all());
    //     try {
    //         $input = $this->validate($request, [
    //             'name' => 'required|string|max:255',
    //             'email' => 'required|string|email|max:255|unique:users,email',
    //             'password' => 'min:6',
    //             'password_confirmation' => 'same:password'
    //             ]);
    //     } catch (ValidationException $e) {
    //         return response()->json($e->errors(), 201);
    //     }
    //     $user = new User;
    //     if (trim($request->password) == '') {
    //         $input = $request->except('password');
    //     } else {
    //         $input['password'] = bcrypt($request->password);
    //         $user->password = $input['password'];
    //     }
    //     $user->name = $input['name'];
    //     $user->email = $input['email'];
    //     $user->save();
    //     return response()->json($user, 201);
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, User $user)
    // {
    //    $password = false;
    //    if($request->password){
    //        $password = true;
    //    }else{
    //        $password = false;
    //    }
    //    try {
    //        $input = $this->validate($request, [
    //            'name' => 'required|string|max:255',
    //            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id.',id' ,
    //            'password' => $password ?  'min:6' : '',
    //            'password_confirmation' => 'same:password'
    //            ]);
    //    } catch (ValidationException $e) {
    //        return response()->json($e->errors(), 201);
    //    }
    //    if (trim($request->password) == '') {
    //        $input = $request->except('password');
    //    } else {
    //        $input['password'] = bcrypt($request->password);
    //        $user->password = $input['password'];
    //    }
    //    $user->name = $input['name'];
    //    $user->email = $input['email'];
    //    $user->save();
    //    return response()->json($user, 201);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\User  $user
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(User $user)
    // {
    //     return response()->json($user->delete());
    // }
}
