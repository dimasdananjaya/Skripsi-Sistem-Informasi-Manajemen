<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditi;
use App\UML;
use App\Gapoktan;
use Auth;
use DB;

class PetugasUMLDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:petugas_uml');
    }

    public function index()
    {
        $komoditi=DB::select( DB::raw("SELECT * FROM komoditi
                                WHERE status = 'aktif'") );
        $uml=UML::all();
        $id_petugas_uml=Auth::user()->id_petugas_uml;

        $gapoktan=DB::select( DB::raw("SELECT * FROM gapoktan
                        WHERE id_petugas_uml = $id_petugas_uml") );
        

   
        return view('PetugasUML.PetugasUMLDasboard')
        ->with('komoditi',$komoditi)
        ->with('uml',$uml)
        ->with('gapoktan',$gapoktan);
    }

    public function halamanPrint($id)
    {
        $gapoktan=Gapoktan::find($id);

        $alat = DB::select( DB::raw("SELECT * FROM alat
        WHERE id_gapoktan = '$id'") );
        $pemasaran = DB::select( DB::raw("SELECT * FROM pemasaran
        WHERE id_gapoktan = '$id'") );
        $produksi = DB::select( DB::raw("SELECT * FROM produksi
        WHERE id_gapoktan = '$id'"));
        
        //cari id petugas yg login
        $id_petugas_uml=Auth::user()->id_petugas_uml;

        //di tabel gapoktan ada id petugas, kalau tidak sama kembalikan ke halaman sebelumnya
        if($id_petugas_uml != $gapoktan->id_petugas_uml)
        {
            return back();
        }
        return view('PetugasUML.PrintPageGapoktan')
        ->with('gapoktan',$gapoktan)
        ->with('alat',$alat)
        ->with('pemasaran',$pemasaran)
        ->with('produksi',$produksi);
    }
    
    public function show($id)
    {
        $gapoktan=Gapoktan::find($id);

        $alat = DB::select( DB::raw("SELECT * FROM alat
        WHERE id_gapoktan = '$id'") );
        $pemasaran = DB::select( DB::raw("SELECT * FROM pemasaran
        WHERE id_gapoktan = '$id'") );
        $produksi = DB::select( DB::raw("SELECT * FROM produksi
        WHERE id_gapoktan = '$id'"));
                $kmd=DB::select( DB::raw("SELECT * FROM komoditi
                WHERE NOT status='tidak_aktif'"));
        //cari id petugas yg login
        $id_petugas_uml=Auth::user()->id_petugas_uml;

        //di tabel gapoktan ada id petugas, kalau tidak sama kembalikan ke halaman sebelumnya
        if($id_petugas_uml != $gapoktan->id_petugas_uml)
        {
            return back();
        }
        return view('PetugasUML.DetailGapoktan')
        ->with('gapoktan',$gapoktan)
        ->with('alat',$alat)
        ->with('pemasaran',$pemasaran)
        ->with('produksi',$produksi)
        ->with('kmd',$kmd);
    }

  
}
