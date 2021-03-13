<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transaksi;
use App\TransaksiDetail;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function history($id)
    {
        $transaksis = Transaksi::with(['user'])->whereHas('user', function ($query) use ($id) {
            $query->whereId($id);
        })->get();

        foreach ($transaksis as $transaksi) {
            $details = $transaksi->details;
            foreach ($details as $detail) {
                $detail->produk;
            }
        }

        if (!empty($transaksis)) {

            return response()->json([
                'success' => 1,
                'message' => "transaksi berhasil",
                'transaksi' => collect($transaksis)
            ]);
        } else {
            $this->error('transsaksi gagal');
        }
    }


    public function store(Request $request)
    {
        $validasi = Validator::make(
            $request->all(),
            [
                'user_id' => 'required',
                'total_item' => 'required',
                'total_harga' => 'required',
                'name' => 'required',
                'phone' => 'required',
                'jasa_pengiriman' => 'required',
                'ongkir' => 'required',
                'total_transfer' => 'required',
                'bank' => 'required'
            ]
        );


        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $kode_payment = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $kode_trx = "INV/PYM/" . now()->format('Y-m-d') . "/" . rand(100, 999);
        $kode_unik = rand(100, 999);
        $status  = "MENUNGGU";
        $expired = now()->addDay();

        $data_transaki = array_merge($request->all(), [
            'kode_payment' => $kode_payment,
            'kode_trx' => $kode_trx,
            'kode_unik' => $kode_unik,
            'status' => $status,
            'expired_at' => $expired
        ]);

        DB::beginTransaction();
        $transaksi = Transaksi::create($data_transaki);
        foreach ($request->produks as $produk) {
            $detail = [
                'transaksi_id' => $transaksi->id,
                'produk_id' => $produk['id'],
                'total_item' => $produk['total_item'],
                'catatan' => $produk['catatan'],
                'total_harga' => $produk['total_harga'],
            ];
            $transaksiDetail  = TransaksiDetail::create($detail);
        }
        if (!empty($transaksi) && !empty($transaksiDetail)) {
            DB::commit();
            return response()->json([
                'success' => 1,
                'message' => "transaksi berhasil",
                'transaksi' => collect($transaksi)
            ]);
        } else {
            DB::rollBack();
            $this->error('transsaksi gagal');
        }
    }


    public function error($pesan)
    {
        return response()->json([
            'succes' => 0,
            'message' => $pesan
        ]);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
