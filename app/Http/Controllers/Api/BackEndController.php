<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Produk;
use Illuminate\Support\Facades\Validator;


class BackEndController extends Controller
{

    public function login(Request $request)
    {
        $user =  User::where('email', $request->email)->get()[0];
        if ($user) {
            if (password_verify($request->password, $user->password)) {
                return response()->json([
                    'success' => 1,
                    'message' => 'Selamat Datang ' . $user->name,
                    'user' => $user
                ]);
            } else {
                return $this->error('password salah');
            }
        } else {
            return $this->error('email tidak terdaftar');
        }
    }


    public function error($pesan)
    {
        return response()->json([
            'succes' => 0,
            'message' => $pesan
        ]);
    }

    public function produk()
    {
        $produk = Produk::all();
        return response()->json(
            [
                'success' => 1,
                'message' => 'daftar nama produk',
		'produks' => $produk
            ]
        );
    }


    public function index()
    {
    }


    public function create(Request $request)
    {
        
    }


    public function store(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required|min:6',
                'phone' => 'required|unique:users'
            ]
        );


        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }


        $user = User::create(array_merge($request->all(), [
            'password' => bcrypt(($request->input('password')))
        ]));



        if ($user) {

            return response()->json([
                'success' => 1,
                'message' => 'Selamat Datang Register Berhasil',
                'user' => $user
            ]);
        }

        return $this->error('registrasi gagal');
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
    }


    public function destroy($id)
    {
    }
}
