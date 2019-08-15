<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use Alert;

class AlatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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
        $simpan=new Alat;
        $simpan->nama_alat=$request->input('nama_alat');
        $simpan->jenis_alat=$request->input('jenis_alat');
        $simpan->asal_alat=$request->input('asal_alat');
        $simpan->tahun_diperoleh=$request->input('tahun_diperoleh');
        $simpan->kapasitas=$request->input('kapasitas');
        $simpan->id_gapoktan=$request->input('id_gapoktan');
        $simpan->save();
        alert()->success('Penyimpanan Berhasil !', '');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $simpan=Alat::find($id);
        $simpan->nama_alat=$request->input('nama_alat');
        $simpan->jenis_alat=$request->input('jenis_alat');
        $simpan->asal_alat=$request->input('asal_alat');
        $simpan->tahun_diperoleh=$request->input('tahun_diperoleh');
        $simpan->kapasitas=$request->input('kapasitas');
        
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
        Alat::find($id)->delete();
        alert()->success('Berhasil Dihapus!', '');
        return back();
    }
}
