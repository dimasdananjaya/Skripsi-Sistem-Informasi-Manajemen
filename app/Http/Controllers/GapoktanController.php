<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gapoktan;
use App\Alat;
use App\Pemasaran;
use App\Produksi;
use App\Komoditi;
use DB;


class GapoktanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:petugas_uml');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan=new Gapoktan;
        $simpan->id_petugas_uml=$request->input('id_petugas_uml');
        $simpan->id_komoditi=$request->input('id_komoditi');
        $simpan->nama_gapoktan=$request->input('nama_gapoktan');
        $simpan->nama_ketua=$request->input('nama_ketua');
        $simpan->status=$request->input('status');
        $simpan->save();
        alert()->success('Penyimpanan Berhasil !', '');
        return redirect()->back();
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
        $simpan=Gapoktan::find($id);
        $simpan->nama_gapoktan=$request->input('nama_gapoktan');
        $simpan->id_komoditi=$request->input('id_komoditi');
        $simpan->alamat=$request->input('alamat');
        $simpan->luas_lahan=$request->input('luas_lahan');
        $simpan->jumlah_kt=$request->input('jumlah_kt');
        $simpan->jumlah_anggota=$request->input('jumlah_anggota');
        $simpan['upah_tk'] = preg_replace('/\D/','',$request->input('upah_tk'));
        $simpan->nama_pendamping=$request->input('nama_pendamping');
        $simpan->nama_ketua=$request->input('nama_ketua');
        $simpan->nama_sekretaris=$request->input('nama_sekretaris');
        $simpan->bendahara=$request->input('bendahara');
        $simpan->no_kontak=$request->input('no_kontak');
        $simpan->tahun_berdiri=$request->input('tahun_berdiri');
        $simpan->status=$request->input('status');
        $simpan->deskripsi=$request->input('deskripsi');
        $simpan->keterangan2=$request->input('keterangan2');


        $simpan->save();
        alert()->success('Penyimpanan Berhasil !', '');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
