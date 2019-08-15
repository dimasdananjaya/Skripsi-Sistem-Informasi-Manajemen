<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produksi;
use Alert;

class ProduksiController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan=new Produksi;
        $simpan->hasil_olahan=$request->input('hasil_olahan');
        $simpan->jumlah_produksi=$request->input('jumlah_produksi');
        $simpan->merk=$request->input('merk');
        $simpan->id_gapoktan=$request->input('id_gapoktan');
        $simpan->save();
        alert()->success('Penyimpanan Berhasil !', '');
        return back();
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $simpan=Produksi::find($id);
        $simpan->hasil_olahan=$request->input('hasil_olahan');
        $simpan->jumlah_produksi=$request->input('jumlah_produksi');
        $simpan->merk=$request->input('merk');

        $simpan->save();
        alert()->success('Penyimpanan Berhasil !', '');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produksi::find($id)->delete();
        alert()->success('Berhasil  Dihapus!', '');
        return back();
    }
}
