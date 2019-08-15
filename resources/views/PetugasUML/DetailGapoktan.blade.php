@extends('layouts.PetugasUMLLayout')


@section('content')
<section id="detail-gapoktan">
        <?php
        $k=DB::select( DB::raw("SELECT nama_komoditi FROM komoditi
        WHERE id_komoditi = $gapoktan->id_komoditi") );
    ?>
    <div class="container">
        <div class="card">
            <div class="card-header">Gapoktan {{$gapoktan->nama_gapoktan}} @foreach($k as $nk)<div style="float:right;">Komoditi :  {{$nk->nama_komoditi}}</div>@endforeach</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <strong>Gambaran Umum</strong>
                        <br>
                        <br>
                    <div class="row">
                        
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <p>Nama Gapoktan : {{$gapoktan->nama_gapoktan}}</p>
                                    <p>Alamat : {{$gapoktan->alamat}}</p>
                                    <p>Tahun Berdiri : {{$gapoktan->tahun_berdiri}}</p>
                                    <p>Luas Lahan (Hektar) : {{$gapoktan->luas_lahan}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <p>Jumlah Kelompok Tani : {{$gapoktan->jumlah_kt}}<p>
                                    <p>Jumlah Anggota :{{$gapoktan->jumlah_anggota}}</p>
                                    <p>Upah Tenaga Kerja : Rp. {{number_format($gapoktan->upah_tk)}}</p>
                                    <p>Nama Pendamping : {{$gapoktan->nama_pendamping}} </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <p>Nama Ketua : {{$gapoktan->nama_ketua}}</p>
                                    <p>Sekretaris : {{$gapoktan->nama_sekretaris}}</p>
                                    <p>Bendahara : {{$gapoktan->bendahara}}</p>
                                    <p>No Kontak : {{$gapoktan->no_kontak}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12" style="margin-top:20px;">
                            <div class="card">
                                <div class="card-body">
                                    <label>Tentang Gapoktan:</label>
                                    <p>{{$gapoktan->deskripsi}}</p> 
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit-gambaran-umum-modal{{$gapoktan->id_gapoktan}}" style="margin-bottom:10px; margin-left:-15px; margin-top:15px;">
                                Edit Gambaran Umum
                            </button>
                        </div>
                        <!-- Modal Gambaran Umum-->
                        <div class="modal fade" id="edit-gambaran-umum-modal{{$gapoktan->id_gapoktan}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Form Edit Gambaran Umum </h2>   
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">                  
                                        {!!Form::open(['action'=>['GapoktanController@update', $gapoktan->id_gapoktan], 'method'=>'PUT'])!!}
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-4">
                                                    {{Form::label('status','Status :')}}
                                                    {{Form::select('status',['aktif'=>'Aktif','tidak_aktif'=>'Tidak Aktif','tidak_dipakai'=>'Data Tidak Digunakan'],$gapoktan->status,['class'=>'form-control form-group'])}}

                                                    {{Form::label('NamaGapoktan','Nama Gapoktan :')}}
                                                    {{Form::text('nama_gapoktan',$gapoktan->nama_gapoktan,['class'=>'form-control form-group','placeholder'=>'Nama Komoditi'])}}

                                                    <?php
                                                        $nama_komoditi=DB::select(DB::raw("SELECT id_komoditi, nama_komoditi FROM komoditi
                                                        WHERE id_komoditi =$gapoktan->id_komoditi"));
                                                    ?>
                                                    {{Form::label('komoditi','Komoditi :')}}
                                                    <select name="id_komoditi" class="form-group form-control">
                                                    @foreach ($nama_komoditi as $kAwal)
                                                        <option value="{{$kAwal->id_komoditi}}">{{$kAwal->nama_komoditi}}</option>
                                                    @endforeach
                                                    @foreach ($kmd as $k)
                                                        <option value="{{$k->id_komoditi}}">{{$k->nama_komoditi}}</option>
                                                    @endforeach
                                                    </select>

                                                    {{Form::label('Alamat','Alamat :')}}
                                                    {{Form::text('alamat',$gapoktan->alamat,['class'=>'form-control form-group','placeholder'=>'Alamat'])}}

                                                    {{Form::label('TahunBerdiri','Tahun Berdiri :')}}
                                                    {{Form::number('tahun_berdiri',$gapoktan->tahun_berdiri,['class'=>'form-control form-group','placeholder'=>'Tahun Berdiri'])}}
                                                    </div>
                                                    <div class="col-4">
                                                    {{Form::label('LuasLahan','Luas Lahan (Hektar):')}}
                                                    {{Form::number('luas_lahan',$gapoktan->luas_lahan,['class'=>'form-control form-group','placeholder'=>'Luas Lahan', 'step' => '0.001'])}}

                                                    {{Form::label('JumlahKT','Jumlah Kelompok Tani :')}}
                                                    {{Form::number('jumlah_kt',$gapoktan->jumlah_kt,['class'=>'form-control form-group','placeholder'=>'Jumlah Kelompok Tani'])}}
                                              
                                                    {{Form::label('JumlahAnggota','Jumlah Anggota :')}}
                                                    {{Form::number('jumlah_anggota',$gapoktan->jumlah_anggota,['class'=>'form-control form-group','placeholder'=>'Jumlah Anggota'])}}

                                                    {{Form::label('UpahTK','Upah Tenaga Kerja :')}}
                                                    {{Form::text('upah_tk',$gapoktan->upah_tk,['class'=>'form-control form-group','placeholder'=>'Upah Tenaga Kerja','id'=>'rupiah'])}}

                                                    {{Form::label('ketua','Nama Ketua :')}}
                                                    {{Form::text('nama_ketua',$gapoktan->nama_ketua,['class'=>'form-control form-group','placeholder'=>'Nama Ketua'])}}
                                                    </div>

                                                    <div class="col-4">
                                                    {{Form::label('NamaSekretaris','Nama Sekretaris :')}}
                                                    {{Form::text('nama_sekretaris',$gapoktan->nama_sekretaris,['class'=>'form-control form-group','placeholder'=>'Nama Sekretaris'])}}

                                                    {{Form::label('bendahara','Nama Bendahara :')}}
                                                    {{Form::text('bendahara',$gapoktan->bendahara,['class'=>'form-control form-group','placeholder'=>'bendahara'])}}
                                                
                                                    
                                                    {{Form::label('NoKontak','No. Kontak :')}}
                                                    {{Form::text('no_kontak',$gapoktan->no_kontak,['class'=>'form-control form-group','placeholder'=>'No. Kontak'])}}

                                                    {{Form::label('pendamping','Nama Pendamping :')}}
                                                    {{Form::text('nama_pendamping',$gapoktan->nama_pendamping,['class'=>'form-control form-group','placeholder'=>'Nama Pendamping'])}}
                                                    </div>
                                                    
                                                    <div class="col-12">
                                                    {{Form::label('Deskripsi','Deskripsi :')}}
                                                    {{Form::textArea('deskripsi',$gapoktan->deskripsi,['class'=>'form-control form-group','placeholder'=>'Deskripsi'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                    
                                                    {{Form::label('keterangan2','Keterangan Non Aktif :')}}
                                                    {{Form::textArea('keterangan2',$gapoktan->keterangan2,['class'=>'form-control form-group','placeholder'=>'Deskripsi'])}}
                                                    {{Form::hidden('_method','PUT')}}
                                                    </div>
                                                </div>
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
                        <hr>
                    </div>
                    <div class="col-lg-12">
                        <strong>Hasil Produksi Gapoktan</strong>
                        <br>
                        <br>

                            <!-- Modal Produksi-->
                              <div class="modal fade" id="produksi-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Form Tambah Produksi</h2>   
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        {!!Form::open(['action'=>'ProduksiController@store', 'method'=>'POST'])!!}
                                            <div class="form-group">
                                                {{Form::label('hasil_olahan','Hasil Olahan :')}}
                                                {{Form::text('hasil_olahan','',['class'=>'form-control form-group','placeholder'=>'Hasil Olahan','required'])}}
                                                {{Form::label(' jumlah_produksi','Jumlah Produksi:')}}
                                                {{Form::number('jumlah_produksi','',['class'=>'form-control form-group','placeholder'=>'Jumlah Produksi', 'step' => '0.001','required'])}}
                                                {{Form::label('merk','Merk :')}}
                                                {{Form::text('merk','',['class'=>'form-control form-group','placeholder'=>'Merk','required'])}}
                                                {{Form::hidden('id_gapoktan', $gapoktan->id_gapoktan) }}
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
                              <!--Modal Produksi-->
                             <table class="table table-hover table-sm">
                                <thead>
                                    <th>No.</th>
                                    <th>Hasil Olahan</th>
                                    <th>Jumlah (ton/tahun)</th>
                                    <th>Merk</th>
                                    <th colspan="2">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach($produksi as $prd)
                                        <tr>
                                            <td class="counterCell"></td>
                                            <td>{{$prd->hasil_olahan}}</td>
                                            <td>{{$prd->jumlah_produksi}}</td>
                                            <td>{{$prd->merk}}</td>
                                            <td>
                                                <a class="btn btn-success" style="color:#fff;float:left; margin-right:20px;" data-toggle="modal" data-target="#produksi-edit-modal{{$prd->id_produksi}}">Edit</a>
                                                {!!Form::open(['action'=>['ProduksiController@destroy', $prd->id_produksi], 'method'=>'POST','id'=>'form-delete-produksi'.$prd->id_produksi])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    
                                                    {{Form::submit('Hapus',['class'=>'btn btn-danger'])}}

                                                {!!Form::close()!!}
                                            </td>
                                            
                                            <script>
                                                    document.querySelector('#form-delete-produksi{{$prd->id_produksi}}').addEventListener('click', function(e){
                                                    var form =this;
                                                    e.preventDefault();
                                                    swal({
                                                    title: 'Hapus data yang dipilih?',
                                                    text: "Klik Hapus untuk menghapus data !",
                                                    type: 'warning',
                                                    buttons:{
                                                        cancel:"Batal",
                                                        confirm:{
                                                            text:"Hapus",
                                                            value:"catch",
                                                        }
                                                    }
                                                    }).then((value) => {
                                                    switch(value){
                                                        case "catch":
                                                        form.submit();
                                                        break;
                                                
                                                        default:
                                                        
                                                            break;
                                                    }
                                                    })
                                                });
                                            </script>
                                        </tr>
                    
                                    <!-- Modal Edit Produksi-->
                                    <div class="modal fade" id="produksi-edit-modal{{$prd->id_produksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Form Edit Produksi</h2>   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">                  
                                                    {!!Form::open(['action'=>['ProduksiController@update', $prd->id_produksi], 'method'=>'PUT'])!!}
                                                        <div class="form-group">
                                                            {{Form::label('hasil_olahan','Hasil Olahan :')}}
                                                            {{Form::text('hasil_olahan',$prd->hasil_olahan,['class'=>'form-control form-group','placeholder'=>'Hasil Olahan'])}}
                                                            {{Form::label(' jumlah','Jumlah :')}}
                                                            {{Form::number('jumlah_produksi',$prd->jumlah_produksi,['class'=>'form-control','placeholder'=>'jumlah', 'step' => '0.001'])}}
                                                            {{Form::label('merk','Merk :')}}
                                                            {{Form::text('merk',$prd->merk,['class'=>'form-control','placeholder'=>'tahun'])}}
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
                                    <!--Modal Edit Produksi-->
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#produksi-modal" style="margin-bottom:10px;">
                                Tambah Produksi
                            </button>
                            <hr>
                    </div>
                    <div class="col-lg-12">
                        <strong>Pemasaran Dan Kerjasama Gapoktan</strong>
                        <br>
                        <br>
                            <!-- Modal Pemasaran-->
                            <div class="modal fade" id="pemasaran-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Form Tambah Pemasaran</h2>   
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        {!!Form::open(['action'=>'PemasaranController@store', 'method'=>'POST'])!!}
                                            <div class="form-group">
                                                {{Form::label('Tujuan Pemasaran','Tujuan Pemasaran :')}}
                                                {{Form::text('tujuan_pemasaran','',['class'=>'form-control form-group','placeholder'=>'Tujuan Pemasaran','required'])}}
                                                {{Form::label('Kerjasama','Kerjasama :')}}
                                                {{Form::text('kerjasama','',['class'=>'form-control form-group','placeholder'=>'Kerjasama','required'])}}
                                                {{Form::label('Jenis Pemasaran','Jenis Pemasaran :')}}
                                                {{Form::select('jenis', ['Domestik' => 'Domestik', 'Mancanegara' => 'Mancanegara'],'',['class'=>'form-control form-group'])}}
                                                {{Form::hidden('id_gapoktan', $gapoktan->id_gapoktan) }}
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
                              <!--Modal Pemasaran-->
                             <table class="table table-hover table-sm">
                                <thead>
                                    <th>No.</th>
                                    <th>Tujuan Pemasaran</th>
                                    <th>Nama Mitra / Kerjasama</th>
                                    <th>Jenis</th>
                                    <th colspan="2">Aksi</th>
                                </thead>
                                <tbody>
                                    @foreach($pemasaran as $pms)
                                        <tr>
                                            <td class="counterCell"></td>
                                            <td>{{$pms->tujuan_pemasaran}}</td>
                                            <td>{{$pms->kerjasama}}</td>
                                            <td>{{$pms->jenis}}</td>
                                            <td>
                                                <a class="btn btn-success" style="color:#fff;float:left; margin-right:20px;" data-toggle="modal" data-target="#pemasaran-edit-modal{{$pms->id_pemasaran}}">Edit</a>
                                                {!!Form::open(['action'=>['PemasaranController@destroy', $pms->id_pemasaran], 'method'=>'POST','id'=>'form-delete-pemasaran'.$pms->id_pemasaran])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}                                              
                                                    {{Form::submit('Hapus',['class'=>'btn btn-danger'])}}
                                                {!!Form::close()!!}
                                                <script>
                                                        document.querySelector('#form-delete-pemasaran{{$pms->id_pemasaran}}').addEventListener('click', function(e){
                                                        var form =this;
                                                        e.preventDefault();
                                                        swal({
                                                        title: 'Hapus data yang dipilih?',
                                                        text: "Klik Hapus untuk menghapus data !",
                                                        type: 'warning',
                                                        buttons:{
                                                            cancel:"Batal",
                                                            confirm:{
                                                                text:"Hapus",
                                                                value:"catch",
                                                            }
                                                        }
                                                        }).then((value) => {
                                                        switch(value){
                                                            case "catch":
                                                            form.submit();
                                                            break;
                                                    
                                                            default:
                                                        
                                                                break;
                                                        }
                                                        })
                                                    });
                                                </script>
                                            </td>
                    
                                    <!-- Modal Edit Pemasaran-->
                                    <div class="modal fade" id="pemasaran-edit-modal{{$pms->id_pemasaran}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Form Edit Pemasaran</h2>   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">                  
                                                    {!!Form::open(['action'=>['PemasaranController@update', $pms->id_pemasaran], 'method'=>'PUT'])!!}
                                                        <div class="form-group">
                                                            {{Form::label('Tujuan Pemasaran','Tujuan Pemasaran :')}}
                                                            {{Form::text('tujuan_pemasaran',$pms->tujuan_pemasaran,['class'=>'form-control form-group','placeholder'=>'Tujuan Pemasaran'])}}
                                                            {{Form::label('Kerjasama','Kerjasama :')}}
                                                            {{Form::text('kerjasama',$pms->kerjasama,['class'=>'form-control','placeholder'=>'Kerjasama'])}}
                                                            {{Form::label('Jenis','Jenis :')}}
                                                            {{Form::select('jenis', ['Domestik' => 'Domestik', 'Mancanegara' => 'Mancanegara'],$pms->jenis, ['class'=>'form-control form-group','placeholder' => 'Pilih Kabupaten :'])}}
                                                
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
                                    <!--Modal Edit Pemasaran-->
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pemasaran-modal" style="margin-bottom:10px;">
                                Tambah Pemasaran
                            </button>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="col-lg-12">
                        <strong>Peralatan</strong>
                        <br>
                        <br> 
                              <!-- Modal Tambah Alat-->
                              <div class="modal fade" id="alat-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                        <h2>Form Tambah Alat</h2>   
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        
                                        {!!Form::open(['action'=>'AlatController@store', 'method'=>'POST'])!!}
                                            <div class="form-group">
                                                {{Form::label('Nama Alat','Nama Alat :')}}
                                                {{Form::text('nama_alat','',['class'=>'form-control form-group','placeholder'=>'Nama Alat','required'])}}
                                                {{Form::label('jenis_alat','Jenis Alat :')}}
                                                <select name="jenis_alat" class="form-control form-group">
                                                    <option value="Pascapanen">Pascapanen</option>
                                                    <option value="Pengolahan">Pengolahan</option>
                                                </select>
                                                {{Form::label('asal','Asal Alat :')}}
                                                {{Form::text('asal_alat','',['class'=>'form-control form-group','placeholder'=>'Asal Alat','required'])}}
                                                {{Form::label('tahun_diperoleh','Tahun Diperoleh :')}}
                                                {{Form::number('tahun_diperoleh','',['class'=>'form-control form-group','placeholder'=>'Tahun Diperoleh','required'])}}
                                                {{Form::label('kapasitas','Kapasitas :')}}
                                                {{Form::text('kapasitas','',['class'=>'form-control form-group','placeholder'=>'Kapasitas','required'])}}
                                                
                                                {{ Form::hidden('id_gapoktan', $gapoktan->id_gapoktan) }}
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
                              <!--Modal Alat-->
                    
                            <table class="table table-hover table-sm">
                                <thead>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Tahun Diperoleh</th>
                                    <th>Asal Alat</th>
                                    <th>Kapasitas</th>
                                    <th colspan="2">Aksi</th>
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
                                            <td>
                                                <a class="btn btn-success" style="color:#fff;float:left; margin-right:25px;" data-toggle="modal" data-target="#alat-edit-modal{{$a->id_alat}}">Edit</a>
                                                {!!Form::open(['action'=>['AlatController@destroy', $a->id_alat], 'method'=>'POST','id'=>'form-delete-alat'.$a->id_alat])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}
                                                    {{Form::submit('Hapus',['class'=>'btn btn-danger'])}}

                                                {!!Form::close()!!}
                                                <script>
                                                        document.querySelector('#form-delete-alat{{$a->id_alat}}').addEventListener('click', function(e){
                                                        var form =this;
                                                        e.preventDefault();
                                                        swal({
                                                        title: 'Hapus data yang dipilih?',
                                                        text: "Klik Hapus untuk menghapus data !",
                                                        type: 'warning',
                                                        buttons:{
                                                            cancel:"Batal",
                                                            confirm:{
                                                                text:"Hapus",
                                                                value:"catch",
                                                            }
                                                        }
                                                        }).then((value) => {
                                                        switch(value){
                                                            case "catch":
                                                            form.submit();
                                                            break;
                                                    
                                                            default:
                                                        
                                                                break;
                                                        }
                                                        })
                                                    });
                                                </script>
                                            </td>                       
                                        </tr>
                                        
                                    <!-- Modal Edit Alat-->
                                    <div class="modal fade" id="alat-edit-modal{{$a->id_alat}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2>Form Edit Alat</h2>   
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">                  
                                                    {!!Form::open(['action'=>['AlatController@update', $a->id_alat], 'method'=>'PUT'])!!}
                                                        <div class="form-group">
                                                            {{Form::label('Nama Alat','Nama Alat :')}}
                                                            {{Form::text('nama_alat',$a->nama_alat,['class'=>'form-control form-group','placeholder'=>'Nama Alat'])}}
                                                            {{Form::label('jenis_alat','Jenis Alat :')}}
                                                            {{Form::select('jenis_alat', ['Pascapanen' => 'Pascapanen', 'Pengolahan' => 'Pengolahan'],$a->jenis_alat, ['class'=>'form-control form-group'])}}
                                                            {{Form::label('asal_alat','Asal Alat :')}}
                                                            {{Form::text('asal_alat',$a->asal_alat,['class'=>'form-control','placeholder'=>'Asal Alat'])}}
                                                            {{Form::label('tahun','Tahun Diperoleh :')}}
                                                            {{Form::number('tahun_diperoleh',$a->tahun_diperoleh,['class'=>'form-control','placeholder'=>'Tahun Diperoleh'])}}
                                                            {{Form::label('kapasitas','Kapasitas :')}}
                                                            {{Form::text('kapasitas',$a->kapasitas,['class'=>'form-control','placeholder'=>'Kapasitas'])}}
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
                                        <!--Modal Edit Alat-->
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#alat-modal" style="margin-bottom:10px;">
                                Tambah Peralatan
                            </button>
                    </div>
                </div>
            </div><!--body-->
            <?php
                $id_petugas=$gapoktan->id_petugas_uml;

                $cari_uml= DB::select( DB::raw("SELECT id_uml FROM petugas_uml
                WHERE id_petugas_uml = $id_petugas") );
               // $uml = DB::select( DB::raw("SELECT nama_uml FROM uml
                //WHERE id_uml = $cari_uml") );
                $nama_petugas=DB::select(DB::raw("SELECT * FROM petugas_uml WHERE id_petugas_uml =$id_petugas"));

            ?>
            <div class="card-footer text-center">
                         
            </div>
        </div><!--card-->
    </div><!--container-->

</section>

<script type="text/javascript">
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
      dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
      var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa  = split[0].length % 3,
        rupiah  = split[0].substr(0, sisa),
        ribuan  = split[0].substr(sisa).match(/\d{3}/gi);
        
      if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }
      
      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  
  </script> 
@endsection
