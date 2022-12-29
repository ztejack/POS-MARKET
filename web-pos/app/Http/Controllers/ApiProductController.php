<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ApiProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Produk::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());
        return ProductResource::collection(Produk::all());
        // return response()->json(Produk::orderBy(request('column') ? request('column') : 'updated_at', request('direction') ? request('direction') : 'desc')->paginate());

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
     * @param  \App\Models\Produk  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        // $produks = Produk::all();
        // $fields = ['id', 'name'];
        // foreach($fields as $field){
        //     if(!empty($request->$field)){
        //         $query->where(Produk::, '=', $request->$field);
        //     }
        // }
        $produks = ProductResource::collection(Produk::findOrFail($produk));
        // return new ProductResource($product);

        return $produks;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $user
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // $produks = ProductResource::collection(Produk::all());
        $produk = Produk::where('kodePrd','LIKE','%'.$request->kode."%")->get();

        // return $request;
        // return Produk::all();

        return ProductResource::collection($produk);


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
