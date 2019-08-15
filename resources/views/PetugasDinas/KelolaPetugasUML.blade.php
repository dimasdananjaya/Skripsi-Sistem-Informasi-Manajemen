@extends('layouts.PetugasDinasLayout')

@section('content')
<div class="container">
        <h3>Petugas UML</h3>
        <hr>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#petugas_uml-tambah-modal" style="margin-bottom:20px;">
            Tambah Petugas UML
        </button>
          
          <!-- Modal Tambah UML-->
          <div class="modal fade" id="petugas_uml-tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h2>Form Tambah Petugas UML</h2>   
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    
                    {!!Form::open(['action'=>'DataPetugasUMLController@store', 'method'=>'POST'])!!}
                        <div class="form-group">
                            {{Form::label('Nama Petugas UML','Nama Petugas UML :')}}
                            {{Form::text('name','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                            {{Form::label('Email','Email :')}}
                            {{Form::text('email','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                            {{Form::label('password','Password :')}}
                            {{Form::text('password','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                            {{Form::label('Alamat','Alamat :')}}
                            {{Form::text('alamat','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                            {{Form::label('no_kontak','No Kontak :')}}
                            {{Form::text('no_kontak','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                            {{Form::label('UML','UML :')}}
                            <select name='id_uml' class="form-control form-group"> <!--ingat name nya-->
                                    @foreach($uml as $u)
                                        <option  value='{{ $u->id_uml }}'>{{ $u->nama_uml }}</option>
                                    @endforeach
                            </select>
                            <small>*Pastikan UML dan Email Tidak Sama</small>
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
                    <th>Nama Petugas</th>
                    <th>Alamat</th>
                    <th>No. Telpon</th>
                    <th>UML</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petugas_uml as $ptgs)
                    <tr>
                        <td>
                        </td>
                        <td>{{$ptgs->name}}</td>
                        <td>{{$ptgs->alamat}}</td>
                        <td>{{$ptgs->no_kontak}}</td>
                        <td>{{$ptgs->uml()->first()->nama_uml}}</td>
                        <td>{{$ptgs->email}}</td>
                        <td>{{$ptgs->pwd}}</td> 
                        <td>
                            <?php
                                if ($ptgs->status=='aktif') {
                                    echo 'Aktif';
                                }
    
                                else {
                                    echo 'Non Aktif';
                                }
                            ?>
                        </td>
                        <td><a class="btn btn-success" data-toggle="modal" data-target="#petugas_uml-edit-modal{{$ptgs->id_petugas_uml}}" style="color:#fff;">Edit</a></td>
                    </tr>
                    
                <!-- Modal Edit Petugas UML-->
                <div class="modal fade" id="petugas_uml-edit-modal{{$ptgs->id_petugas_uml}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2>Form Edit Petugas UML</h2>   
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">                  
                                {!!Form::open(['action'=>['DataPetugasUMLController@update',$ptgs->id_petugas_uml], 'method'=>'PUT'])!!}
                                    {{Form::label('Nama Petugas UML','Nama Petugas UML :')}}
                                    {{Form::text('name',$ptgs->name,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('Email','Email :')}}
                                    {{Form::text('email',$ptgs->email,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('Alamat','Alamat :')}}
                                    {{Form::text('alamat',$ptgs->alamat,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('no_kontak','No Kontak :')}}
                                    {{Form::text('no_kontak',$ptgs->no_kontak,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('password','Password :')}}
                                    {{Form::text('password',$ptgs->pwd,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('status','Status :')}}
                                    {{Form::select('status', ['aktif' => 'Aktif', 'non_aktif' => 'Tidak Aktif',],$ptgs->status, ['class' => 'form-control form-group'])  }}
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