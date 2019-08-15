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
            <!--
                <div class="card text-center" style="padding:10px 10px 10px 10px;">
                        <h3>
                            Laporan Gapoktan Pengolah Komoditi Perkebunan
                        </h3>
                    </div>
                -->
                        <hr>
                        <h4></h4>
                        
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-header">
                                    </div>
                                    <div class="card-body text-center">
                                        <p>Total Gapoktan Bali</p>
                                        <p>{{$totalGpt}}</p>
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
        <div class="tab-pane container fade" id="uml">
                <hr>
        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body text-center">
                                <p>Total UML Bali</p>
                                <p>{{$totalUML}}</p>
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
    
@endsection