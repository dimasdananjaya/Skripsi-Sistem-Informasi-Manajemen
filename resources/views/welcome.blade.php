@extends('layouts.HomePageLayout')

@section('content')
<div class="container">
    <div class="card" style="padding:20px 20px 20px 20px;box-shadow:5px 5px gray;">
        <h2 class="lead text-center">Selamat Datang Di Sistem Gabungan Kelompok Tani Pengolah Komoditi Perkebunan</h2>
        <h2 class="lead text-center" style="text-align:justify;">Dinas Tanaman Pangan, Hortikultura Dan Perkebunan Provinsi Bali</h2>
        <hr>

        <div class="row">   
            <div class="col-12">
                <div class="card mx-auto" style="padding-top:30px;">
                        <p class="card-title lead text-center">Sistem Ini Menyediakan Daftar Gapoktan <br> Pengolah Komoditi Perkebunan Di Provinsi Bali</p>
                    <i class='fas fa-users text-center' style='font-size:36px;'></i>
                    
                    <div class="card-body">

                        <p class="text-center">Klik Tombol Dibawah Ini Untuk Melihat Daftar Gapoktan</p>
                    
                        <a href="/pengunjung" class="btn btn-primary btn-block">Lihat Daftar Gapoktan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--unused login
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                

                        <div class="form-group row">
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
-->
</div>
@endsection
