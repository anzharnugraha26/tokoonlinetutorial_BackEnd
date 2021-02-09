<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    public function index()
    {
    }


    public function create()
    {
    }


    public function store(Request $request)
    {
        $fileName = '';
        if ($request->image->getClientOriginalName()) {
            $file = str_replace(' ', '', $request->image->getClientOriginalName());
            $fileName = date('mYdHs') . rand(1, 999) . '_' . $file;
            $request->image->storeAs('public/produk', $fileName);
        }


        $produk = Produk::create(array_merge(
            $request->all(),
            [
                'image' => $fileName
            ]
        ));
        return redirect('/indexproduk');
    }


    public function show(Produk $produk)
    {
    }


    public function edit(Produk $produk)
    {
    }


    public function update(Request $request, Produk $produk)
    {
        //
    }


    public function destroy(Produk $produk)
    {
        //
    }
}
