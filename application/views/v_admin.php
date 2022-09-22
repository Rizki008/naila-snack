<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
            <h3><?= $total_pesanan ?></h3>

            <p>Pesanan Masuk</p>
        </div>
        <div class="icon">
            <i class="fas fa-shopping-cart"></i>
        </div>
        <!-- <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">Pesanan Masuk<i class="fas fa-arrow-circle-up"></i></a> -->
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
            <h3><?= $total_produk ?></h3>

            <p>Produk</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <!-- <a href="<?= base_url('produk') ?>" class="small-box-footer">Jumlah Produk<i class="fas fa-arrow-circle-up"></i></a> -->
    </div>
</div>

<div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
            <h3><?= $total_pelanggan ?></h3>

            <p>Pelanggan</p>
        </div>
        <div class="icon">
            <i class="fas fa-users"></i>
        </div>
        <!-- <a href="<?= base_url('user') ?>" class="small-box-footer">Jumlah Pelanggan<i class="fas fa-arrow-circle-up"></i></a> -->
    </div>
</div>

<div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
        <div class="inner">
            <h3><?= $total_transaksi ?></h3>
            <p>Transaksi</p>
        </div>
        <div class="icon">
            <i class="fas fa-money-check-alt"></i>
        </div>
        <!-- <a href="<?= base_url('admin/pesanan_masuk') ?>" class="small-box-footer">Total Transaksi Selesai<i class="fas fa-arrow-circle-up"></i></a> -->
    </div>
</div>
<!-- Left col -->
<section class="col-lg-7 connectedSortable">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Analisis
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Penjualan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#sales-chart" data-toggle="tab">Pelanggan</a>
                    </li>
                </ul>
            </div>
        </div><!-- /.card-header -->
        <div class="card-body">
            <div class="tab-content p-0">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <?php
                    foreach ($grafik as $key => $value) {
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
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">

                    <?php
                    foreach ($grafik_pelanggan as $key => $value) {
                        $nama_pelanggan[] = $value->nama_pelanggan;
                        $jml[] = $value->qty;
                    }
                    ?>
                    <canvas id="myChartsa" height="100" style="height: 100px;"></canvas>
                    <!-- <canvas id="myChart" height="100"></canvas> -->
                    <script>
                        var ctx = document.getElementById('myChartsa');
                        var myChartsa = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: <?= json_encode($nama_pelanggan) ?>,
                                datasets: [{
                                    label: 'Grafik Analisis Pelanggan',
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