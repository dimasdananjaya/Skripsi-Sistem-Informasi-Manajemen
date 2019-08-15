@extends('layouts.PetugasDinasLayout')

@section('content')
<div class="container">
<h3>Daftar Unit Manajemen Lapangan</h3>
<hr>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uml-tambah-modal" style="margin-bottom:20px;">
            Tambah UML
        </button>
          
          <!-- Modal Tambah UML-->
          <div class="modal fade" id="uml-tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h2>Form Tambah UML</h2>   
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    {!!Form::open(['action'=>'UMLController@store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {{Form::label('Nama UML','Nama UML :')}}
                            {{Form::text('nama_uml','',['class'=>'form-control form-group','placeholder'=>'Nama UML','required'])}}
                            {{Form::label('Kabupaten','Kabupaten :')}}
                            <select class="form-control form-group" name="id_daerah">
                                @foreach ($daerah as $d)
                                    <option value="{{$d->id_daerah}}">{{$d->kabupaten}}</option>
                                @endforeach                              
                            </select>
                            {{Form::label('Alamat','Alamat :')}}
                            {{Form::text('alamat','',['class'=>'form-control form-group','placeholder'=>'Alamat','required'])}}
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
                    <th>Nomor</th>
                    <th>Nama UML</th>
                    <th>Kabupaten</th>
                    <th>Alamat</th>
                    <th>Status UML</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($uml as $u)
                    <tr>
                        <td>

                        </td>
                        <td>{{$u->nama_uml}}</td>
                        <td>
                            @php
                            //ambil kabupaten
                             $kabupaten= DB::select(DB::raw("SELECT kabupaten FROM daerah WHERE id_daerah='$u->id_daerah'"));
                             
                             //panggil kabupaten
                             foreach ($kabupaten as $k)
                                 echo $k->kabupaten;
                             
                            @endphp
                        </td>
                        <td>{{$u->alamat}}</td>
                        <td>
                            <?php
                            if ($u->status=='aktif') {
                                echo 'Aktif';
                            }

                            else {
                                echo 'Tidak Aktif';
                            }
                        ?>
                        </td>   
                        <td>
                            <a class="btn btn-success" style="color:#fff;" data-toggle="modal" data-target="#uml-edit-modal{{$u->id_uml}}">Edit</a>
                        </td>                       
                    </tr>
                    
                <!-- Modal Edit UML-->
                <div class="modal fade" id="uml-edit-modal{{$u->id_uml}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Form Edit UML</h2>   
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                  
                                {!!Form::open(['action'=>['UMLController@update', $u->id_uml], 'method'=>'PUT'])!!}
                                    <div class="form-group">
                                        {{Form::label('Nama UML','Nama UML :')}}
                                        {{Form::text('nama_uml',$u->nama_uml,['class'=>'form-control form-group','placeholder'=>'Nama UML'])}}
                                        <!--{{Form::label('Kabupaten','Kabupaten :')}}
                                        <select class="form-control form-group" name="id_daerah" >
                                            @foreach ($daerah as $d)
                                                <option value="{{$d->id_daerah}}">{{$d->kabupaten}}</option>
                                            @endforeach                              
                                        </select>-->
                                        {{Form::label('Alamat','Alamat :')}}
                                        {{Form::text('alamat',$u->alamat,['class'=>'form-control form-group','placeholder'=>'Alamat'])}}
                                        {{Form::label('Status','Status :')}}
                                        {{Form::select('status',['aktif'=>'Aktif','tidak_aktif'=>'Tidak Aktif'],$u->status,['class'=>'form-control form-group'])}}
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