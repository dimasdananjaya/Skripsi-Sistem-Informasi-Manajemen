@extends('layouts.PetugasDinasLayout')


@section('content')
    <section id="petugas-dinas-dashboard">
    <div class="container">
        <h3>Selamat Datang Di Dashboard Petugas Dinas</h3>
        <h6>Silahkan Memilih Menu Yang Tersedia :</h6>
        <hr>
        <div class="row">
            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <i class='far fa-id-badge text-center' style='font-size:36px;'></i>
                    <div class="card-body">
                        <h5 class="card-title text-center">Unit Manajemen Lapangan</h5>
                        <a href="petugas_dinas/uml" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <i class='fas fa-tree text-center' style='font-size:36px;'></i>
                    <div class="card-body">
                        <h5 class="card-title text-center">Komoditi</h5>
                        <a href="petugas_dinas/komoditi" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <i class='fas fa-users text-center' style='font-size:36px;'></i>
                    <div class="card-body">
                        <h5 class="card-title text-center">Gapoktan</h5>
                        <a href="petugas_dinas/gapoktan" class="btn btn-primary btn-block">Pilih</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                    <div class="card" style="width: 18rem;">
                        <i class='fas fa-users text-center' style='font-size:36px;'></i>
                        <div class="card-body">
                        <h5 class="card-title text-center">Petugas UML</h5 >
                        <a href="petugas_dinas/data_petugas_uml" class="btn btn-primary btn-block">Pilih<link rel="stylesheet" href=""></a>
                        </div>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="card" style="width: 18rem;">
                    <i class='fas fa-users text-center' style='font-size:36px;'></i>
                    <div class="card-body">
                    <h5 class="card-title text-center">User</h5 >
                    <a href="petugas_dinas/user" class="btn btn-primary btn-block">Pilih<link rel="stylesheet" href=""></a>
                    </div>
                </div>
        </div>
        </div>
    </div>
@endsection