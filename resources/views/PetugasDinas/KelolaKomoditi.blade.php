@extends('layouts.PetugasDinasLayout')

@section('content')
    <div class="container">
        <h3>Daftar Komoditi Perkebunan</h3>
        <hr>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#komoditi-tambah-modal" style="margin-bottom:20px;">
            Tambah Komoditi
        </button>
          
          <!-- Modal Tambah Komoditi-->
          <div class="modal fade" id="komoditi-tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h2>Form Tambah Komoditi</h2>   
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    {!!Form::open(['action'=>'KomoditiController@store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {{Form::label('Nama Komoditi','Nama Komoditi :')}}
                            {{Form::text('nama_komoditi','',['class'=>'form-control form-group','placeholder'=>'Nama Komoditi', 'required'])}}
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
                <th>No</th>
                <th>Nama Komoditi</th>
                <th>Status</th>
                <th>Aksi</th>
            </thead>
            <tbody>
                @foreach($komoditi as $k)
                    <tr>
                        <td></td>
                        <td>{{$k->nama_komoditi}}</td>
                        <td>
                            <?php
                            if ($k->status=='aktif') {
                                echo 'Aktif';
                            }

                            else {
                                echo 'Tidak Aktif';
                            }
                        ?>
                        </td> 
                        <td>
                            <!--{!!Form::open(['action'=>['KomoditiController@destroy', $k->id_komoditi], 'method'=>'POST'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete',['class'=>'btn btn-danger'])}}-->
                                <a class="btn btn-success" style="color:#fff;" data-toggle="modal" data-target="#komoditi-edit-modal{{$k->id_komoditi}}">Edit</a>
                            <!--{!!Form::close()!!}-->
  
                        </td>                       
                    </tr>
                    
                <!-- Modal Edit Komoditi-->
                <div class="modal fade" id="komoditi-edit-modal{{$k->id_komoditi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Form Edit Komoditi</h2>   
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                  
                                {!!Form::open(['action'=>['KomoditiController@update', $k->id_komoditi], 'method'=>'PUT'])!!}
                                    <div class="form-group">
                                        {{Form::label('Nama Komoditi','Nama Komoditi :')}}
                                        {{Form::text('nama_komoditi',$k->nama_komoditi,['class'=>'form-control form-group','placeholder'=>'Nama Komoditi'])}}
                                        {{Form::label('status','Status :')}}
                                        {{Form::select('status',['aktif'=>'Aktif','tidak_aktif'=>'Tidak Aktif'],$k->status,['class'=>'form-control form-group','placeholder'=>'Nama Komoditi'])}}
                                    </div>
                                    {{Form::hidden('_method','PUT')}}
                                    {{Form::submit('Simpan',['class'=>'btn btn-success btn-block'])}}
                                {!!Form::close()!!}
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                        </div>
                </div>
                    <!--Modal Edit UML-->
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