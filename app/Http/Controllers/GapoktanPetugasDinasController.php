<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Gapoktan;
use App\Alat;
use App\Pemasaran;
use App\Produksi;
use DB;


class GapoktanPetugasDinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gapoktan=DB::select( DB::raw("SELECT * FROM gapoktan
        WHERE NOT status='tidak_dipakai'") );
        return view('PetugasDinas.GapoktanPetugasDinas')
        ->with('gapoktan',$gapoktan);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gapoktan=Gapoktan::find($id);

        $alat = DB::select( DB::raw("SELECT * FROM alat
        WHERE id_gapoktan = '$id'") );
        $pemasaran = DB::select( DB::raw("SELECT * FROM pemasaran
        WHERE id_gapoktan = '$id'") );
        $produksi = DB::select( DB::raw("SELECT * FROM produksi
        WHERE id_gapoktan = '$id'"));

        return view('PetugasDinas.DetailGapoktanPetugasDinas')
        ->with('gapoktan',$gapoktan)
        ->with('alat',$alat)
        ->with('pemasaran',$pemasaran)
        ->with('produksi',$produksi);
    }

}
