@extends('layouts.PetugasDinasLayout')

@section('content')
<div class="container">
    <div class="lead" style="margin-top:30px; margin-bottom:20px;">Daftar Gapoktan Pengolah Komoditi Perkebunan Provinsi Bali :</div>
    <table id="tabel"class="table table-hover">
        <thead>
            <tr>
            <?php
                $nomor=1;
            ?>
                <th>No</th>
                <th>Kabupaten</th>
                <th>Nama Gapoktan</th>
                <th>Komoditi</th>
                <th>UML</th>
                <th>Status</th>
                <th>Hasil Olahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor=1;
            ?>
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
                    <td>
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
                    </td>
                <?php
                    $status=$g->status;
                    $nama_komoditi=DB::select( DB::raw("SELECT nama_komoditi FROM komoditi
                    WHERE id_komoditi = $g->id_komoditi") );
                  ?>
                @if($status=='aktif')
                    <td>Aktif</td>
                    @else
                    <td>Tidak Aktif</td>
                @endif
                <td>
                        <?php
                            $produk=DB::select( DB::raw("SELECT * FROM produksi
                            WHERE id_gapoktan = $g->id_gapoktan") );                            
                        ?>
                    @foreach($produk as $p)
                        {{$p->hasil_olahan}},
                    @endforeach
                </td>
                <td><a class="btn btn-success" href="/petugas_dinas/gapoktan/{{$g->id_gapoktan}}">Detail</td>
            </tr>
            @endforeach
        </tbody>
    </table>
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