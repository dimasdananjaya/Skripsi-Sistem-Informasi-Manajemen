<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Daerah;
use App\UML;
Use App\PetugasUML;
use App\Gapoktan;
use App\Komoditi;

class KepalaBidangDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $totalGpt=DB::select( DB::raw("SELECT * FROM gapoktan WHERE not status='tidak_dipakai'"));
        $gptAktif=Gapoktan::where('status','=','aktif')->count();
        $gptNonAktif=Gapoktan::where('status','=','tidak_aktif')->count();

        $gptBadung = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Badung'))) AND NOT status='tidak_dipakai';"));

        $gptGianyar = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Gianyar')))AND NOT status='tidak_dipakai';"));
        
        $gptBuleleng = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Buleleng')))AND NOT status='tidak_dipakai';"));
        
        $gptTabanan = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Tabanan')))AND NOT status='tidak_dipakai';"));
        
        $gptKarangasem = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Karangasem')))AND NOT status='tidak_dipakai';"));

        $gptJembrana = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Jembrana')))AND NOT status='tidak_dipakai';"));
        
        $gptKlungkung = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Klungkung')))AND NOT status='tidak_dipakai';"));

        $gptBangli = DB::select( DB::raw("SELECT *
        FROM
        gapoktan
        WHERE
            id_petugas_uml IN (SELECT 
                    id_petugas_uml
                FROM
                    petugas_uml
                WHERE
                    id_uml IN(SELECT id_uml from uml WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Bangli')))AND NOT status='tidak_dipakai';"));

        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $umlBadung = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Badung') AND NOT status='tidak_aktif';"));

        $umlGianyar = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Gianyar')AND NOT status='tidak_aktif';"));

        $umlBuleleng = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Buleleng')AND NOT status='tidak_aktif';"));

        $umlTabanan = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Tabanan')AND NOT status='tidak_aktif';"));
        
        $umlKarangasem = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Karangasem')AND NOT status='tidak_aktif';"));

        $umlJembrana = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Jembrana')AND NOT status='tidak_aktif';"));

        $umlKlungkung = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Klungkung')AND NOT status='tidak_aktif';"));

        $umlBangli = DB::select( DB::raw("SELECT *
        FROM
        uml
        WHERE
            id_daerah IN (SELECT 
                    id_daerah
                FROM
                    daerah
                WHERE
                    kabupaten='Bangli')AND NOT status='tidak_aktif';"));

        
        $totalUML=UML::all()
        ->where('status','=','aktif')
        ;


        $semuaGapoktan=DB::select( DB::raw("SELECT * FROM gapoktan WHERE not status='tidak_dipakai'"));
        $dftGapoktanNonAktif=DB::select( DB::raw("SELECT * FROM gapoktan WHERE status='tidak_aktif'"));
       // $id_komoditi=$komoditi=Komoditi::all()->pluck('id_komoditi');
        return view('KepalaBidang.KepalaBidangDasboard')
        ->with('totalGpt',$totalGpt)
        ->with('gptAktif',$gptAktif)
        ->with('gptNonAktif',$gptNonAktif)
        ->with('gptBadung',$gptBadung)
        ->with('gptGianyar',$gptGianyar)
        ->with('gptBuleleng',$gptBuleleng)
        ->with('gptTabanan',$gptTabanan)
        ->with('gptKarangasem',$gptKarangasem)
        ->with('gptJembrana',$gptJembrana)
        ->with('gptKlungkung',$gptKlungkung)
        ->with('gptBangli',$gptBangli)
        ->with('umlBadung',$umlBadung)
        ->with('umlGianyar',$umlGianyar)
        ->with('umlBuleleng',$umlBuleleng)
        ->with('umlTabanan',$umlTabanan)
        ->with('umlKarangasem',$umlKarangasem)
        ->with('umlJembrana',$umlJembrana)
        ->with('umlKlungkung',$umlKlungkung)
        ->with('umlBangli',$umlBangli)
        ->with('dftGapoktanNonAktif',$dftGapoktanNonAktif)
        ->with('totalUML',$totalUML)
        ->with('semuaGapoktan',$semuaGapoktan);
        //->with('id_komoditi',$id_komoditi);

    }

  
}
