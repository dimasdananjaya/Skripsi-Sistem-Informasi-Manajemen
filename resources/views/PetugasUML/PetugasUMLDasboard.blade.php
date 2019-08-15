@extends('layouts.PetugasUMLLayout')


@section('content')
<div class="container">
        <?php
            $id_uml_petugas=Auth::user()->id_uml;
            $uml = DB::select( DB::raw("SELECT nama_uml FROM uml
            WHERE id_uml = $id_uml_petugas") );

        ?>
    

    <h3 style="margin-top:20px;">Daftar Gapoktan Pengolah Komoditi Perkebunan Pada UML : @foreach($uml as $nama_u){{$nama_u->nama_uml}}@endforeach</h6>
        <hr>
  
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-gapoktan" style="margin-bottom:20px;">
            Tambah Gapoktan
        </button>

          <!-- Modal Tambah UML-->
          <div class="modal fade" id="tambah-gapoktan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h2>Form Tambah Gapoktan</h2>   
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    {!!Form::open(['action'=>'GapoktanController@store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {{Form::label('Nama Gapoktan','Nama Gapoktan :')}}
                            {{Form::text('nama_gapoktan','',['class'=>'form-control form-group','placeholder'=>'Nama Gapoktan','required'])}}
                            {{Form::label('Nama Ketua','Nama Ketua :')}}
                            {{Form::text('nama_ketua','',['class'=>'form-control form-group','placeholder'=>'Nama Ketua :','required'])}}
                            {{Form::label('komoditi','Komoditi :')}}
                            <select name='id_komoditi' class="form-control form-group"> <!--ingat name nya-->
                                    @foreach($komoditi as $k)
                                        <option  value='{{ $k->id_komoditi }}'>{{ $k->nama_komoditi }}</option>
                                    @endforeach
                            </select>
                            {{Form::label('status','Status Gapoktan :')}}
                            <select name='status' class="form-control form-group">
                                <option value='aktif'>Aktif</option>
                                <option value='tidak_aktif'>Tidak Aktif</option>
                            </select>
                            {{ Form::hidden('id_petugas_uml', Auth::user()->id_petugas_uml)}}
                            <small>*Koordinasikan kepada Petugas Dinas Provinsi bila komoditi tidak tercantum</small>
                        </div>
                        {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                    {!!Form::close()!!}
                </div>
                <div class="modal-footer"> 
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
              </div>
            </div>
          </div>
          <!--Modal UML-->
    <table id="tabel" class="table table-hover">
        <thead>
            <tr>
            <th>No</th>
            <th>Nama Gapoktan</th>
            <th>Komoditi</th>
            <th>Nama Ketua</th>
            <th>Status</th>
            <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <?php
        
            //$id_petugas_uml=Auth::user()->id_petugas_uml;
            //$gapoktan=DB::select( DB::raw("SELECT * FROM gapoktan
                       // WHERE id_petugas_uml = $id_petugas_uml") );
        ?>

          <tbody>

            @foreach ($gapoktan as $g)
            <tr>
              <td></td>
              <td>{{$g->nama_gapoktan}}</td>
              <td>
                  <?php
                    $status=$g->status;
                    $nama_komoditi=DB::select( DB::raw("SELECT nama_komoditi FROM komoditi
                    WHERE id_komoditi = $g->id_komoditi") );
                  ?>

                  @foreach ($nama_komoditi as $nk)
                      {{$nk->nama_komoditi}}
                  @endforeach
              </td>
              <td>{{$g->nama_ketua}}</td>
              <td>
                  <?php
                  if ($g->status=='aktif') {
                      echo 'Aktif';
                  }

                  elseif ($g->status=='tidak_dipakai') {
                    echo 'Data Tidak Digunakan';
                  }

                  else {
                      echo 'Tidak Aktif';
                  }
              ?>
              </td> 
              <td style="text-center"><a style="margin-right:2px;" class="btn btn-success" href="petugas_uml/lihat_gapoktan/{{$g->id_gapoktan}}">Detail<a class="btn btn-success" href="petugas_uml/gapoktan/{{$g->id_gapoktan}}">Kelola</td>
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