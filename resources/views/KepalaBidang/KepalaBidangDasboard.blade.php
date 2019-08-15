@extends('layouts.KepalaBidangLayout')


@section('content')
<div class="container">
        <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#gapoktan">Laporan Gapoktan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#uml">Laporan UML</a>
        </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane container active" id="gapoktan">
                            <hr>

                            <?php
                                $TotalGpt=0;

                                foreach($totalGpt as $totalGapoktan)
                                {
                                    $TotalGpt++;
                                }
                            ?>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>
                                        <div class="card-body text-center">
                                            <p>Total Gapoktan Bali</p>
                                            <p>{{$TotalGpt}}</p>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                        </div>                    
                                        <div class="card-body text-center">
                                            <p>Total Gapoktan Aktif</p>
                                            <p>{{$gptAktif}}</p>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="col-lg-4">
                                    <div class="card">
                                        <div class="card-header">
                                        </div> 
                                        <div class="card-body text-center">
                                            <p>Total Gapoktan Non Aktif</p>
                                            <p>{{$gptNonAktif}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="card" style="padding:10px 10px 10px 10px; margin-top:20px; margin-bottom:20px;">  
                            <h4 style="margin-top:20px;">Grafik Jumlah Gapoktan Pengolah Komoditi Perkebunan Provinsi Bali Per-Kabupaten</h4>
                            <hr>
                            <?php
                                $totalGptBadung=0;
                                foreach ($gptBadung as $totalGpt) {
                                    $totalGptBadung++;
                                }
                    
                                $totalGptGianyar=0;
                                foreach ($gptGianyar as $totalGpt) {
                                    $totalGptGianyar++;
                                }
                    
                                $totalGptBuleleng=0;
                                foreach ($gptBuleleng as $totalGpt) {
                                    $totalGptBuleleng++;
                                }
                    
                                $totalGptTabanan=0;
                                foreach ($gptTabanan as $totalGpt) {
                                    $totalGptTabanan++;
                                }
                                
                                $totalGptKarangasem=0;
                                foreach ($gptKarangasem as $totalGpt) {
                                    $totalGptKarangasem++;
                                }
                    
                                $totalGptJembrana=0;
                                foreach ($gptJembrana as $totalGpt) {
                                    $totalGptJembrana++;
                                }
                    
                                $totalGptKlungkung=0;
                                foreach ($gptKlungkung as $totalGpt) {
                                    $totalGptKlungkung++;
                                }
                    
                                $totalGptBangli=0;
                                foreach ($gptBangli as $totalGpt) {
                                    $totalGptBangli++;
                                }
                    
                            ?>
                            
                            <canvas id="myChart"></canvas>
                            <script>
                            var ctx = document.getElementById("myChart");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ["Badung", "Gianyar", "Buleleng", "Tabanan", "Karangasem", "Jembrana", "Klungkung", "Bangli"],
                                    datasets: [{
                                        label: '# Total Jumlah Gapoktan',
                                        data: [{{$totalGptBadung}}, {{$totalGptGianyar}}, {{$totalGptBuleleng}}, {{$totalGptTabanan}},
                                                {{$totalGptKarangasem}}, {{$totalGptJembrana}}, {{$totalGptKlungkung}}, {{$totalGptBangli}}],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>
                            
                            
                        <div class="card" style="padding:10px 10px 10px 10px; margin-top:20px; margin-bottom:20px;">    
                            <h4>Grafik Total Jumlah Gapoktan Pengolah Bali Per-Komoditi</h4>
                            <ul class="nav nav-tabs">
                                <li class="nav-item active">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiBali">Total Bali</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiBadung">Badung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiGianyar">Gianyar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiBuleleng">Buleleng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiTabanan">Tabanan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiKarangasem">Karangasem</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiJembrana">Jembrana</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiKlungkung">Klungkung</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#totalGptPerKomoditiBangli">Bangli</a>
                                </li>
                                </ul>
                            <?php
                                //cari komoditi
                              

                                //sql total gapoktan per komoditi
                                $totalGptPerKmd=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) AS total FROM gapoktan 
                                                                    RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi WHERE NOT gapoktan.status='tidak_dipakai' 
                                                                    GROUP BY komoditi.nama_komoditi DESC
                                                                            ") );
                                
                             
                                $totalGptPerKmdBadung=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Badung')) AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );
 
                                $totalGptPerKmdGianyar=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Gianyar')) AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );

                                $totalGptPerKmdBuleleng=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Buleleng')) AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );

                                $totalGptPerKmdTabanan=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Tabanan')) AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );
                                                                                    
                                $totalGptPerKmdKarangasem=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Karangasem'))AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );

                                $totalGptPerKmdJembrana=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Jembrana'))AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );

                                $totalGptPerKmdKlungkung=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Klungkung'))AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );

                                $totalGptPerKmdBangli=DB::select( DB::raw("SELECT komoditi.nama_komoditi ,count(gapoktan.id_gapoktan) 
                                                                            AS total FROM gapoktan RIGHT JOIN komoditi ON gapoktan.id_komoditi = komoditi.id_komoditi 
                                                                            WHERE id_petugas_uml IN (SELECT id_petugas_uml FROM petugas_uml WHERE id_uml IN(SELECT id_uml from uml 
                                                                            WHERE id_daerah IN(SELECT id_daerah from daerah WHERE kabupaten='Bangli')) AND NOT gapoktan.status='tidak_dipakai') 
                                                                            GROUP BY komoditi.nama_komoditi DESC") );
                                                               
                            ?>
                    <div class="tab-content">
                        <div class="tab-pane container fade" id="totalGptPerKomoditiBali">
                            <canvas id="chartKomoditi"></canvas>
                            <script>
                            var ctx = document.getElementById("chartKomoditi");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [@foreach($totalGptPerKmd as $kmd)
                                                '{{$kmd->nama_komoditi}}',
                                            @endforeach],
                                    datasets: [{
                                        label: '# Total Jumlah Gapoktan',
                                        data: [@foreach($totalGptPerKmd as $total)
                                                {{$total->total}},
                                            @endforeach],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiBadung">
                            <canvas id="chartKomoditiBadung"></canvas>
                            <script>
                            var ctx = document.getElementById("chartKomoditiBadung");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [@foreach($totalGptPerKmdBadung as $kmd)
                                                '{{$kmd->nama_komoditi}}',
                                            @endforeach],
                                    datasets: [{
                                        label: '# Total Jumlah Gapoktan',
                                        data: [@foreach($totalGptPerKmdBadung as $total)
                                                {{$total->total}},
                                            @endforeach],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiGianyar">
                            <canvas id="chartKomoditiGianyar"></canvas>
                            <script>
                            var ctx = document.getElementById("chartKomoditiGianyar");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [@foreach($totalGptPerKmdGianyar as $kmd)
                                                '{{$kmd->nama_komoditi}}',
                                            @endforeach],
                                    datasets: [{
                                        label: '# Total Jumlah Gapoktan',
                                        data: [@foreach($totalGptPerKmdGianyar as $total)
                                                {{$total->total}},
                                            @endforeach],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiBuleleng">
                            <canvas id="chartKomoditiBuleleng"></canvas>
                            <script>
                            var ctx = document.getElementById("chartKomoditiBuleleng");
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [@foreach($totalGptPerKmdBuleleng as $kmd)
                                                '{{$kmd->nama_komoditi}}',
                                            @endforeach],
                                    datasets: [{
                                        label: '# Total Jumlah Gapoktan',
                                        data: [@foreach($totalGptPerKmdBuleleng as $total)
                                                {{$total->total}},
                                            @endforeach],
                                        backgroundColor: [
                                            'rgba(255, 99, 132, 0.2)',
                                            'rgba(54, 162, 235, 0.2)',
                                            'rgba(255, 206, 86, 0.2)',
                                            'rgba(75, 192, 192, 0.2)',
                                            'rgba(153, 102, 255, 0.2)',
                                            'rgba(255, 159, 64, 0.2)'
                                        ],
                                        borderColor: [
                                            'rgba(255,99,132,1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero:true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiTabanan">
                            <canvas id="chartKomoditiTabanan"></canvas>
                            <script>
                                var ctx = document.getElementById("chartKomoditiTabanan");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [@foreach($totalGptPerKmdTabanan as $kmd)
                                                    '{{$kmd->nama_komoditi}}',
                                                @endforeach],
                                        datasets: [{
                                            label: '# Total Jumlah Gapoktan',
                                            data: [@foreach($totalGptPerKmdTabanan as $total)
                                                    {{$total->total}},
                                                @endforeach],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiKarangasem">
                            <canvas id="chartKomoditiKarangasem"></canvas>
                            <script>
                                var ctx = document.getElementById("chartKomoditiKarangasem");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [@foreach($totalGptPerKmdKarangasem as $kmd)
                                                    '{{$kmd->nama_komoditi}}',
                                                @endforeach],
                                        datasets: [{
                                            label: '# Total Jumlah Gapoktan',
                                            data: [@foreach($totalGptPerKmdKarangasem as $total)
                                                    {{$total->total}},
                                                @endforeach],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>                            
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiJembrana">
                            <canvas id="chartKomoditiJembrana"></canvas>
                            <script>
                                var ctx = document.getElementById("chartKomoditiJembrana");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [@foreach($totalGptPerKmdJembrana as $kmd)
                                                    '{{$kmd->nama_komoditi}}',
                                                @endforeach],
                                        datasets: [{
                                            label: '# Total Jumlah Gapoktan',
                                            data: [@foreach($totalGptPerKmdJembrana as $total)
                                                    {{$total->total}},
                                                @endforeach],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiKlungkung">
                            <canvas id="chartKomoditiKlungkung"></canvas>
                            <script>
                                var ctx = document.getElementById("chartKomoditiKlungkung");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [@foreach($totalGptPerKmdKlungkung as $kmd)
                                                    '{{$kmd->nama_komoditi}}',
                                                @endforeach],
                                        datasets: [{
                                            label: '# Total Jumlah Gapoktan',
                                            data: [@foreach($totalGptPerKmdKlungkung as $total)
                                                    {{$total->total}},
                                                @endforeach],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>

                        <div class="tab-pane container fade" id="totalGptPerKomoditiBangli">
                            <canvas id="chartKomoditiBangli"></canvas>
                            <script>
                                var ctx = document.getElementById("chartKomoditiBangli");
                                var myChart = new Chart(ctx, {
                                    type: 'bar',
                                    data: {
                                        labels: [@foreach($totalGptPerKmdBangli as $kmd)
                                                    '{{$kmd->nama_komoditi}}',
                                                @endforeach],
                                        datasets: [{
                                            label: '# Total Jumlah Gapoktan',
                                            data: [@foreach($totalGptPerKmdBangli as $total)
                                                    {{$total->total}},
                                                @endforeach],
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255,99,132,1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            yAxes: [{
                                                ticks: {
                                                    beginAtZero:true
                                                }
                                            }]
                                        }
                                    }
                                });
                            </script>
                        </div>
                    </div> <!--card-->

                </div>


                <div class="card" style="padding:10px 10px 10px 10px; margin-top:20px; margin-bottom:20px;">  
                        <hr>
                        <h4>Daftar Seluruh Gapoktan Pengolah Komoditi Perkebunan Bali</h4>
                        <table id="tabel" class="table table-hover">
                            <thead>
                                <tr>
                                <tr>
        
                                    <th>No</th>
                                    <th>Kabupaten</th>
                                    <th>Nama Gapoktan</th>
                                    <th>Komoditi</th>
                                    <th>UML</th>
                                    <th>Hasil Olahan</th>
                                    <th style="display:none;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($semuaGapoktan as $g)
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
                                    <td>
                                    <?php
                                        $produk=DB::select( DB::raw("SELECT * FROM produksi
                                        WHERE id_gapoktan = $g->id_gapoktan") );                            
                                    ?>
                                        @foreach($produk as $p)
                                            {{$p->hasil_olahan}},
                                        @endforeach
                                    </td>
                                    <td style="display:none;"><a class="btn btn-default" href="pengunjung/{{$g->id_gapoktan}}">Lihat</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    <hr>
                    <h4>Daftar Gapoktan Non-Aktif</h4>
                    <table id="tabelNonAktif" class="table table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Gapoktan</th>
                                <th>UML</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dftGapoktanNonAktif as $g)
                                <tr>
                                    <td class="counterCell"></td>
                                    <td>{{$g->nama_gapoktan}}</td>
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
                                    <td>{{$g->keterangan2}}</td>                        
                                </tr>
                                <!--Modal Edit UML-->
                            @endforeach
                        </tbody>
                    </table>
                </div> <!--card-->   
            </div>
        

            <div class="tab-pane container fade" id="uml">
                    <hr>
                    <?php
                        $tu=0;

                        foreach($totalUML as $t)
                        {
                            $tu++;
                        }
                    ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body text-center">
                                    <p>Total UML Bali</p>
                                    <p>{{$tu}}</p>
                                </div>
                                <div class="card-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        
                        $totalUMLBadung=0;
                        foreach ($umlBadung as $totalUML) {
                            $totalUMLBadung++;
                        }
                
                        $totalUMLGianyar=0;
                        foreach ($umlGianyar as $totalUML) {
                            $totalUMLGianyar++;
                        }
                
                        $totalUMLBuleleng=0;
                        foreach ($umlBuleleng as $totalUML) {
                            $totalUMLBuleleng++;
                        }
                
                        $totalUMLTabanan=0;
                        foreach ($umlTabanan as $totalUML) {
                            $totalUMLTabanan++;
                        }
                        
                        $totalUMLKarangasem=0;
                        foreach ($umlKarangasem as $totalUML) {
                            $totalUMLKarangasem++;
                        }
                
                        $totalUMLJembrana=0;
                        foreach ($umlJembrana as $totalUML) {
                            $totalUMLJembrana++;
                        }
                
                        $totalUMLKlungkung=0;
                        foreach ($umlKlungkung as $totalUML) {
                            $totalUMLKlungkung++;
                        }
                
                        $totalUMLBangli=0;
                        foreach ($umlBangli as $totalUML) {
                            $totalUMLBangli++;
                        }
                
                    ?>
                <div class="card" style="padding:10px 10px 10px 10px; margin-top:20px; margin-bottom:20px;">  
                    <h4 style="margin-top:20px;">Grafik Jumlah Unit Manajemen Lapangan (UML) Provinsi Bali Per-Kabupaten</h4>
                    <hr>
                    <canvas id="umlChart"></canvas>
                    <script>
                    var ctx = document.getElementById("umlChart");
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ["Badung", "Gianyar", "Buleleng", "Tabanan", "Karangasem", "Jembrana", "Klungkung", "Bangli"],
                            datasets: [{
                                label: '# Total Jumlah UML',
                                data: [{{$totalUMLBadung}},{{$totalUMLGianyar}},{{$totalUMLBuleleng}},{{$totalUMLTabanan}},{{$totalUMLKarangasem}},{{$totalUMLJembrana}},{{$totalUMLKlungkung}},{{$totalUMLBangli}}],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255,99,132,1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero:true
                                    }
                                }]
                            }
                        }
                    });
                    </script>
                    <hr>
                    <h4 style="margin-top:20px;">Daftar UML</h4>
                    <table id="tabelUML" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nomor</th>
                            <th>Nama UML</th>
                            <th>Kabupaten</th>
                            <th>Petugas UML</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $uml=DB::select(DB::raw("SELECT * FROM uml WHERE NOT status='tidak_aktif'"));  
                        ?>
                        @foreach($uml as $u)
                            <tr>
                                <td>
    
                                </td>
    
                                <td>{{$u->nama_uml}}</td>
                                <td>
                                    <?php
                                    //ambil kabupaten
                                    $kabupaten= DB::select(DB::raw("SELECT kabupaten FROM daerah WHERE id_daerah='$u->id_daerah'"));
                                    
                                    //panggil kabupaten
                                    foreach ($kabupaten as $k)
                                        echo $k->kabupaten;
                                    
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $nama_petugas_uml = DB::select( DB::raw("SELECT name FROM petugas_uml
                                        WHERE id_uml = '$u->id_uml'") );
    
                                        foreach($nama_petugas_uml as $nama)
                                        echo $nama->name;
                                    ?>
                                </td>                      
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                </div><!--card-->
            </div>
              
        </div><!-- TAB CONTENT-->
</div>
</div>
            
    
            <hr>
         <!--   
        <div id="rangkuman-gpt">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Rangkuman Total Gapoktan Pengolah Komoditi Perkebunan Provinsi Bali Per-Kabupaten:</h3>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Badung
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptBadung}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Gianyar
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptGianyar}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Buleleng
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptBuleleng}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Tabanan
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptTabanan}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Karangasem
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptKarangasem}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Jembrana
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptJembrana}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Klungkung
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptKlungkung}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
    
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            Total Gapoktan Bangli
                        </div>
                        <div class="card-body text-center"> 
                            <h3>{{$totalGptBangli}}</h3>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>
                
            </div>
        </div>
        </div>
        -->

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

        <script type="text/javascript">
            $(document).ready(function() {
                var t = $('#tabelUML').DataTable( {
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