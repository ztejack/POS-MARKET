<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Void_;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.barang.index', [
            'barangs' => Produk::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.barang.create');
    }


    public function store(Request $request)
    {
        // dd($validatedData);
        $validatedData = $request->validate([
            'kodePrd' => 'required',
            'namaPrd' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'modalprice' => 'required',
            'price' => 'required',
        ]);
        $validatedData['oldprice'] = $request->price;
        Produk::create($validatedData);
        return redirect()->route('produk.index')->with('success', 'New Produk has been added!');
    }

    public function update(Request $request, $id)
    {

        $request->price = preg_replace('/\D/', '', $request->price);
        $request['price'] = preg_replace('/\.?/', '', $request->price);
        // $request->price = str_replace('.', '', $request->price);

        $produks = Produk::all();
        // dd($request->price);
        $rules = [
            'kodePrd' => 'required',
            'namaPrd' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
            'modalprice' => 'required',
            'price' => 'required',
            'oldprice' => 'required',
        ];
        foreach ($produks->where('id', '!=', $id) as $produk) {
            if ($produk->kodePrd == $request->kodePrd) {
                $rules['kodePrd'] = 'required|unique:produks';
            }
        }
        $validatedData = $request->validate($rules);
        $produk = Produk::find($id);
        // dd($validatedData);
        $produk->kodePrd = $validatedData['kodePrd'];
        $produk->namaPrd = $validatedData['namaPrd'];
        $produk->stok = $validatedData['stok'];
        $produk->satuan = $validatedData['satuan'];
        $produk->oldprice = $validatedData['oldprice'];
        $produk->modalprice = $validatedData['modalprice'];
        $produk->price = $validatedData['price'];
        // dd($validatedData, $request, $rules);
        $produk->update();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('produk.index')->with('err', 'Data Produk berhasil di perbaruin');
        }

        // dd($request);
        // Produk::where('id', $produk->id)->update($validatedData);
        // Produk::where('id', $produk->id)->update($validatedData);
        // $produckx = Produk::where('id', $produk->id);
        session()->put('modal', 0);


        // dd($produckx);
        return redirect()->back()->with('success', 'Data Produk berhasil di perbaruin');
    }

    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect()->route('produk.index')->with('success', 'Produk telah di hapus');
    }
}
