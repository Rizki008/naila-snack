<section class="col-lg-10 connectedSortable">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Analisis produk
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Analisis produk</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <?php
                    foreach ($analisis as $key => $value) {
                        $nama_produk[] = $value->nama_produk;
                        $qty[] = $value->qty;
                    }
                    ?>
                    <canvas id="myChart" height="100" style="height: 100px;"></canvas>
                    <!-- <canvas id="myChart" height="100"></canvas> -->
                    <script>
                        var ctx = document.getElementById('myChart');
                        var myChart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: <?= json_encode($nama_produk) ?>,
                                datasets: [{
                                    label: 'Grafik Penjualan',
                                    data: <?= json_encode($qty) ?>,
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.80)',
                                        'rgba(54, 162, 235, 0.80)',
                                        'rgba(255, 206, 86, 0.80)',
                                        'rgba(75, 192, 192, 0.80)',
                                        'rgba(153, 102, 255, 0.80)',
                                        'rgba(255, 159, 64, 0.80)',
                                        'rgba(201, 76, 76, 0.3)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(0, 140, 162, 1)',
                                        'rgba(158, 109, 8, 1)',
                                        'rgba(201, 76, 76, 0.8)',
                                        'rgba(0, 129, 212, 1)',
                                        'rgba(201, 77, 201, 1)',
                                        'rgba(255, 207, 207, 1)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(128, 98, 98, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(128, 128, 128, 1)',
                                        'rgba(255, 99, 132, 0.80)',
                                        'rgba(54, 162, 235, 0.80)',
                                        'rgba(255, 206, 86, 0.80)',
                                        'rgba(75, 192, 192, 0.80)',
                                        'rgba(153, 102, 255, 0.80)',
                                        'rgba(255, 159, 64, 0.80)',
                                        'rgba(201, 76, 76, 0.3)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(0, 140, 162, 1)',
                                        'rgba(158, 109, 8, 1)',
                                        'rgba(201, 76, 76, 0.8)',
                                        'rgba(0, 129, 212, 1)',
                                        'rgba(201, 77, 201, 1)',
                                        'rgba(255, 207, 207, 1)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(128, 98, 98, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(128, 128, 128, 1)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(201, 76, 76, 0.3)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(0, 140, 162, 1)',
                                        'rgba(158, 109, 8, 1)',
                                        'rgba(201, 76, 76, 0.8)',
                                        'rgba(0, 129, 212, 1)',
                                        'rgba(201, 77, 201, 1)',
                                        'rgba(255, 207, 207, 1)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(128, 98, 98, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(128, 128, 128, 1)',
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(201, 76, 76, 0.3)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(0, 140, 162, 1)',
                                        'rgba(158, 109, 8, 1)',
                                        'rgba(201, 76, 76, 0.8)',
                                        'rgba(0, 129, 212, 1)',
                                        'rgba(201, 77, 201, 1)',
                                        'rgba(255, 207, 207, 1)',
                                        'rgba(201, 77, 77, 1)',
                                        'rgba(128, 98, 98, 1)',
                                        'rgba(0, 0, 0, 1)',
                                        'rgba(128, 128, 128, 1)'
                                    ],
                                    fill: false,
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div><!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>