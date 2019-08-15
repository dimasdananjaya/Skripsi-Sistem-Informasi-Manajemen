@extends('layouts.PengunjungLayout')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <!--
                <div class="card">
                    <div class="card-body">
                        <h4>Selamat Datang Pada Sistem Informasi Gabungan Kelompok Tani Pengolah Komoditi Perkebunan</h4>
                        <h4>Dinas Tanaman Pangan Hortikultura Dan Perkebunan Provinsi Bali</h4>
                    </div>
                </div>
                <hr>-->

                <div class="lead" style="margin-top:30px; margin-bottom:20px;">Berikut Adalah Daftar Gapoktan Pengolah Komoditi Perkebunan Provinsi Bali :</div>
                <p>Klik 'Detail' Untuk Melihat Detail Dari Gapoktan</p>
                <a href="/" class="btn btn-primary">Kembali Ke Home</a>
                <hr>
                <table id="tabel" class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kabupaten</th>
                            <th>Nama Gapoktan</th>
                            <th>Komoditi</th>
                            <!--<th>UML</th>-->
                            <th>Hasil Olahan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($gapoktan as $g)
                        <tr>
                            <td></td>
                            <td>
                                <?php
                                    //cari kabupaten
                                    //cari id uml
                                    $uml=DB::select( DB::raw("SELECT id_uml FROM petugas_uml
                                        WHERE id_petugas_uml = $g->id_petugas_uml") );
                                    //cari id daerah
                                    foreach ($uml as $u) {
                                        $id_daerah=DB::select( DB::raw("SELECT id_daerah FROM uml
                                        WHERE id_uml = $u->id_uml") );
                                    }

                                    //cari kabupaten
                                    foreach($id_daerah as $daerah){
                                        $kabupaten=DB::select( DB::raw("SELECT kabupaten FROM daerah
                                        WHERE id_daerah = $daerah->id_daerah") );
                                    }

                                    
                                ?>

                                @foreach ($kabupaten as $kbp)
                                    {{$kbp->kabupaten}}
                                @endforeach
                            </td>
                            <td>{{$g->nama_gapoktan}}</td>
                            <td>
                                <?php
                                    //cari nama komoditi
                                    $nama_komoditi=DB::select( DB::raw("SELECT nama_komoditi FROM komoditi
                                    WHERE id_komoditi = $g->id_komoditi") );
                                ?>
                                @foreach ($nama_komoditi as $kmd)
                                    {{$kmd->nama_komoditi}}
                                @endforeach
                            </td>
                            <!--<td>
                            <?php
                                    //cari uml gapoktan
                                    $uml=DB::select( DB::raw("SELECT id_uml FROM petugas_uml
                                    WHERE id_petugas_uml = $g->id_petugas_uml") );

                                    foreach ($uml as $u) {
                                        $nama_uml=DB::select( DB::raw("SELECT nama_uml FROM uml
                                        WHERE id_uml = $u->id_uml") );
                                    }
                            ?>
                                @foreach ($nama_uml as $nm_uml)
                                    {{$nm_uml->nama_uml}}
                                @endforeach
                            </td>-->
                            <td>
                                    <?php
                                        $produk=DB::select( DB::raw("SELECT * FROM produksi
                                        WHERE id_gapoktan = $g->id_gapoktan") );                            
                                    ?>
                                @foreach($produk as $p)
                                    {{$p->hasil_olahan}},
                                @endforeach
                            </td>
                            <td><a class="btn btn-success" href="pengunjung/{{$g->id_gapoktan}}">Detail</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            var t = $('#tabel').DataTable( {
                "columnDefs": [ {
                    "searchable": false,
                    "orderable": false,
                    "targets": 0
                } ],
                "order": [[ 1, 'asc' ]],

                "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Indonesian.json"
            }
            } );
        
            t.on( 'order.dt search.dt', function () {
                t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                    cell.innerHTML = i+1;
                } );
            } ).draw();        
        } );
    </script>
@endsection