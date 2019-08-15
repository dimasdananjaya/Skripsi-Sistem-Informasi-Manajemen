<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PetugasUML;
use Hash;
use App\Gapoktan;
use DB;
use App\UML;
use Alert;
use Validator;

class DataPetugasUMLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uml= DB::select( DB::raw("SELECT * FROM uml
        WHERE status = 'aktif'") );
        $petugas_uml=PetugasUML::all();
        return view('PetugasDinas.KelolaPetugasUML')
        ->with('uml',$uml)
        ->with('petugas_uml',$petugas_uml);
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
            'id_uml' => 'required|unique:petugas_uml',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:petugas_uml'],
        ]);
        $simpan=new PetugasUML;
        $simpan->name=$request->input('name');
        $simpan->email=$request->input('email');
        $simpan->alamat=$request->input('alamat');
        $simpan->id_uml=$request->input('id_uml');
        $simpan->role=('petugas_uml');
        $simpan->no_kontak=$request->input('no_kontak');
        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        $simpan->pwd=$request->input('password');
        


        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Pastikan UML dan EMAIL tidak SAMA');
            return back()
                        ;

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
        $simpan=PetugasUML::find($id);
        $simpan->name=$request->input('name');
        $simpan->alamat=$request->input('alamat');
        $simpan->no_kontak=$request->input('no_kontak');
        $password=$request->input('password');
        $simpan->password=Hash::make($password);
        $simpan->email=$request->input('email');
        $simpan->pwd=$request->input('password');
        $simpan->status=$request->input('status');
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:petugas_uml,email,'.$simpan->id_petugas_uml.',id_petugas_uml'
        ]);

        if ($validator->fails()) {
            alert()->error('Penyimpanan Gagal !', 'Email sudah dipakai');
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
        DB::table('gapoktan')->where('id_petugas_uml', '=', $id)->delete();
        PetugasUML::find($id)->delete();
        return back();
    }
}
