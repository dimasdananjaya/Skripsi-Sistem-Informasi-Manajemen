<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UML;
use App\PetugasUML;
use App\Daerah;
use DB;
use Alert;
use Validator;

class UMLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daerah=Daerah::all();
        $uml=UML::all();
        $petugas_uml=PetugasUML::all();
        //$nama_petugas_uml = DB::select( DB::raw("SELECT nama_petugas_uml FROM petugas_u_m_ls
        //WHERE id_gapoktan = '$id'") );

        return view('PetugasDinas.KelolaUML')
        ->with('uml',$uml)
        ->with('petugas_uml',$petugas_uml)
        ->with('daerah',$daerah);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_uml' => 'required|unique:uml',
        ]);
        $simpan=new UML;
        $simpan->nama_uml=$request->input('nama_uml');
        $simpan->alamat=$request->input('alamat');
        $simpan->id_daerah=$request->input('id_daerah');


        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Nama UML sudah dipakai');
            return back()
                        ->withInput();

        }

        else{
            $simpan->save();
            return back();
            alert()->success('Berhasil Disimpan!', '');
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

        $simpan=UML::find($id);
        $simpan->nama_uml=$request->input('nama_uml');
        $simpan->alamat=$request->input('alamat');
        $nama=$request->input('nama_uml');
        $simpan->status=$request->input('status');

        $validator = Validator::make($request->all(), [
            'nama_uml' => 'required|unique:uml,nama_uml,'.$simpan->id_uml.',id_uml'
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Nama UML sudah dipakai');
            return back();

        }

        else{
            $simpan->save();
            alert()->success('Berhasil Disimpan !', '');
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
        UML::find($id)->delete();
        return back();
    }
}
