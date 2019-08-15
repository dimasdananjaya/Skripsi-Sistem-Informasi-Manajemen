<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditi;
use Alert;
use Validator;

class KomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $komoditi=Komoditi::all();
        return view('PetugasDinas.KelolaKomoditi')
        ->with('komoditi',$komoditi);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan=new Komoditi;
        $simpan->nama_komoditi=$request->input('nama_komoditi');
    

        $validator = Validator::make($request->all(), [
            'nama_komoditi' => 'required|unique:komoditi',
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Nama Komoditi sudah dipakai');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Success !', '');
            return back();
        }
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
        $simpan=Komoditi::find($id);
        $simpan->nama_komoditi=$request->input('nama_komoditi');
   
        $validator = Validator::make($request->all(), [
            'nama_komoditi' => 'required|unique:komoditi,nama_komoditi,'.$simpan->id_komoditi.',id_komoditi'
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Nama Komoditi sudah dipakai');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Success !', '');
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Komoditi::find($id)->delete();
        alert()->success('Berhasil Dihapus !', '');
        return back();
    }
}
