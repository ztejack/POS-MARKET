<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User as ModelUsers;
use App\Models\Satker as ModelSatkers;
use App\Models\Perusahaan as ModelPerusahaan;

use App\Http\Resources\UserResource;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ApiUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserResource::collection(ModelUsers::orderBy('name','asc')->where('level_id','=','3')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        if ($request->id){
            $user = ModelUsers::where('id','LIKE','%'.$request->id.'%')->where('level_id','=','3')->get();
        }
        else{
            $user = ModelUsers::where('name','LIKE','%'.$request->name.'%')->where('level_id','=','3')->get();
        }
        return UserResource::collection($user);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchid(Request $request){
        if ($request->id){
            $user = ModelUsers::where('id',$request->id)->firstOrFail();

            return response()->json([
                'id' => $user->id,
                'Nama' => $user->name,
                'UserName' => $user->username,
                'Telepon' => $user->phonenumber,
                'Email' => $user->email,
                'Perusahaan' => ModelPerusahaan::where('id',ModelSatkers::where('id',$user->satker_id)->value('perusahaan_id'))->value('nama_perusahaan'),
                'SatuanKerja' => ModelSatkers::where('id',$user->satker_id)->value('satker'),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
    public function show(ModelUsers $user)
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
