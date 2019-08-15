@extends('layouts.PetugasUMLLayout')


@section('content')
<section id="detail-gapoktan">
    <div class="container">
        <button class="btn btn-success noPrint" style="margin-bottom:5px;" onClick="window.print()">Cetak Informasi Gapoktan Ini</button>
        <?php
            $k=DB::select( DB::raw("SELECT nama_komoditi FROM komoditi
            WHERE id_komoditi = $gapoktan->id_komoditi") );
        ?>
        <div class="card">
            <div class="card-header">Gapoktan {{$gapoktan->nama_gapoktan}} @foreach($k as $nk)<div style="float:right;">Komoditi :  {{$nk->nama_komoditi}}</div>@endforeach</div>
            <div class="card-body">
                <div class="row">
                 
                    <div class="col-12">
                        <strong>Gambaran Umum</strong>
                        <hr>
                    </div>
  
                    <div class="col-12">
                        <div class="card-deck">
                            <div class="card">
                                <div class="card-body">
                                    <p>Nama Gapoktan : {{$gapoktan->nama_gapoktan}}</p>
                                    <p>Alamat : {{$gapoktan->alamat}}</p>
                                    <p>Tahun Berdiri : {{$gapoktan->tahun_berdiri}}</p>
                                    <p>Luas Lahan (Hektar): {{$gapoktan->luas_lahan}}</p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <p>Jumlah Kelompok Tani : {{$gapoktan->jumlah_kt}}<p>
                                    <p>Jumlah Anggota :{{$gapoktan->jumlah_anggota}}</p>
                                    <p>Upah Tenaga Kerja : Rp. {{number_format($gapoktan->upah_tk)}}</p>
                                    <p>Nama Pendamping : {{$gapoktan->nama_pendamping}} </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <p>Nama Ketua : {{$gapoktan->nama_ketua}}</p>
                                    <p>Sekretaris : {{$gapoktan->nama_sekretaris}}</p>
                                    <p>Bendahara : {{$gapoktan->bendahara}}</p>
                                    <p>No Kontak : {{$gapoktan->no_kontak}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12" style="margin-top:20px;">
                            <div class="card">
                                <div class="card-body">
                                    <label>Tentang Gapoktan:</label>
                                    <p style="text-align:justify;">{{$gapoktan->deskripsi}}</p> 
                                </div>
                            </div>
                    </div>
                </div>
                <hr>    
                    <div class="col-12">
                            <strong>Hasil Produksi Gapoktan</strong>
                            <br>
                            <br>
                             <table class="table table-hover table-sm table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Hasil Olahan</th>
                                    <th>Jumlah (ton/tahun)</th>
                                    <th>Merk</th>
                                </thead>
                                <tbody>
                                    @foreach($produksi as $prd)
                                        <tr>
                                            <td class="counterCell"></td>
                                            <td>{{$prd->hasil_olahan}}</td>
                                            <td>{{$prd->jumlah_produksi}}</td>
                                            <td>{{$prd->merk}}</td>
   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    <hr>
                    <div class="col-12">
                        <strong>Pemasaran Dan Kerjasama Gapoktan</strong>
                        <br>
                        <br>
                             <table class="table table-hover table-sm table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>Tujuan Pemasaran</th>
                                    <th>Nama Mitra / Kerjasama</th>
                                    <th>Jenis</th>
 
                                </thead>
                                <tbody>
                                    @foreach($pemasaran as $pms)
                                    <tr>
                                        <td class="counterCell"></td>
                                        <td>{{$pms->tujuan_pemasaran}}</td>
                                        <td>{{$pms->kerjasama}}</td>
                                        <td>{{$pms->jenis}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <strong>Peralatan Yang Dimiliki</strong>
                        <br>
                        <br> 
                            <table class="table table-hover table-sm table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Tahun Diperoleh</th>
                                    <th>Asal Alat</th>
                                    <th>Kapasitas</th>
                                </thead>
                                <tbody>
                                    @foreach($alat as $a)
                                        <tr>
                                            <td class="counterCell"></td>
                                            <td>{{$a->nama_alat}}</td>
                                            <td>{{$a->jenis_alat}}</td>
                                            <td>{{$a->tahun_diperoleh}}</td>
                                            <td>{{$a->asal_alat}}</td>
                                            <td>{{$a->kapasitas}}</td>                   
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="card-footer text-center"> Dikelola Oleh Dinas Tanaman Pangan Hortikultura Dan Perkebunan Provinsi Bali      
                    </div>
            </div><!--body-->
        </div><!--card-->

    </div><!--container-->
</section>
@endsection