@extends('layouts.KepalaBidangLayout')

@section('content')
    <div class="container">
        <div class="card text-center" style="padding:10px 10px 10px 10px;">
        <h3>
            Laporan Unit Manajemen Lapangan (UML) Provinsi Bali
        </h3>
    </div>
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
        <canvas id="myChart"></canvas>
        <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Badung", "Gianyar", "Buleleng", "Tabanan", "Karangasem", "Jembrana", "Klungkung", "Bangli"],
                datasets: [{
                    label: '# Total Jumlah Gapoktan',
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
@endsection