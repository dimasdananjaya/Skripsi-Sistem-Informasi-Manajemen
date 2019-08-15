@extends('layouts.PetugasDinasLayout')

@section('content')
<div class="container">
    <h3>Daftar User</h3>
    <hr>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#user-tambah-modal" style="margin-bottom:20px;">
        Tambah User
    </button>
      
      <!-- Modal Tambah User-->
      <div class="modal fade" id="user-tambah-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h2>Form Tambah User</h2>   
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                
                {!!Form::open(['action'=>'UserController@store', 'method'=>'POST'])!!}
                    <div class="form-group">
                        {{Form::label('Nama ','Nama :')}}
                        {{Form::text('name','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::label('Email','Email :')}}
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        {{Form::label('Alamat','Alamat :')}}
                        {{Form::text('alamat','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::label('no_kontak','No Kontak :')}}
                        {{Form::text('no_kontak','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
                        {{Form::label('Role','Role :')}}
                        <select name='role' class="form-control form-group"> <!--ingat name nya-->
                            <option  value='petugas_dinas'>Petugas Dinas</option>
                        </select>
                        {{Form::label('password','Password :')}}
                        {{Form::text('password','',['class'=>'form-control form-group','placeholder'=>'','required'])}}
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
      <!--Modal Tambah User-->

    <table id="tabel" class="table table-hover">
        <thead>
            <th>Nomor</th>
            <th>Nama User</th>
            <th>Alamat</th>
            <th>No. Telpon</th>
            <th>Email</th>
            <th>Password</th>
            <th>Role</th>
            <th>Status</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        
        @foreach($user as $usr)
                <tr>
                    <td>
                    
                    </td>
                    <td>{{$usr->name}}</td>
                    <td>{{$usr->alamat}}</td>
                    <td>{{$usr->no_kontak}}</td>
                    <td>{{$usr->email}}</td>
                    <td>{{$usr->pwd}}</td>
                    <td>
                        <?php
                            if ($usr->role=='kepala_bidang') {
                                echo 'Kepala Bidang';
                            }

                            else {
                                echo 'Petugas Dinas';
                            }
                        ?>
                    </td>
                    <td>
                        <?php
                            if ($usr->status=='aktif') {
                                echo 'Aktif';
                            }

                            else {
                                echo 'Non Aktif';
                            }
                        ?>
                    </td>
                    <td>
                        
                        {!!Form::open(['action'=>['UserController@destroy', $usr->id_user], 'method'=>'POST'])!!}
                        <!--    {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger'])}}-->
                            <a class="btn btn-success" style="color:#fff;" data-toggle="modal" data-target="#user-edit-modal{{$usr->id_user}}">Edit</a>
                        {!!Form::close()!!} 
                    </td>                       
                </tr>
                
            <!-- Modal Edit User-->
            <div class="modal fade" id="user-edit-modal{{$usr->id_user}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h2>Form Edit User</h2>   
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">                  
                            {!!Form::open(['action'=>['UserController@update', $usr->id_user], 'method'=>'PUT'])!!}
                                <div class="form-group">
                                    {{Form::label('Nama','Nama :')}}
                                    {{Form::text('name',$usr->name,['class'=>'form-control form-group','placeholder'=>'',])}}
                                    {{Form::label('Email','Email :')}}
                                    {{Form::text('email',$usr->email,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('Alamat','Alamat :')}}
                                    {{Form::text('alamat',$usr->alamat,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('no_kontak','No Kontak :')}}
                                    {{Form::text('no_kontak',$usr->no_kontak,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('password','Password :')}}
                                    {{Form::text('password',$usr->pwd,['class'=>'form-control form-group','placeholder'=>''])}}
                                    {{Form::label('status','Status :')}}
                                    {{Form::select('status', ['aktif' => 'Aktif', 'non_aktif' => 'Non Aktif',],$usr->status, ['class' => 'form-control form-group'])  }}
                                    <!--
                                    <select  class="form-control form-group"> 
                                        <option  value='petugas_dinas'>Petugas Dinas</option>
                                    </select>-->
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
                <!--Modal Edit User-->
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