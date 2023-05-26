<link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <div class="page-title">
        <h3>Selamat datang <?= ucfirst($_SESSION["admin"]["username"]) ?></h3>
        <p class="text-subtitle text-muted">Data statistik transaksi dari MuzRent</p>
    </div>
    <section class="section">
        
        <div class="row">
            <div class="col-12">
                
                <div class="card">
                    <div class="card-header">
                        <h3 class='card-heading p-1 pl-3'>Data Penyewaan</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-12">
                                <div class="pl-3">
                                    <h1 class='mt-5'>130</h1>
                                    <p class='text-xs'><span class="text-green"><i data-feather="bar-chart" width="15"></i> +30%</span> naik dari bulan kemarin</p>
                                    <div class="legends">
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-info mr-2'></div><span class='text-xs'>Bulan Kemarin</span>
                                        </div>
                                        <div class="legend d-flex flex-row align-items-center">
                                            <div class='w-3 h-3 rounded-full bg-blue mr-2'></div><span class='text-xs'>Bulan ini</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-12">
                                <canvas id="bar">
                                </canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Data Transaksi Terbaru</h4>
                        <div class="d-flex ">
                            <i data-feather="download"></i>
                        </div>
                    </div>
                    <div class="card-body m-2">
                            <table class='table table-striped' id="table1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>No. Telp</th>
                                        <th>Mobil</th>
                                        <th>Plat Nomor</th>
                                        <th>Tanggal Ambil</th>
                                        <th>Lama sewa (hari)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                        <?php if ($query=$connection->query("SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil")); ?>
                                        <?php while($row=$query->fetch_assoc()) { ?>
                                    <tr>
                                        <th><?=$no++?></th>
                                        <td><?php echo $row["nama"]; ?></td>
                                        <td><?php echo $row["no_telp"]; ?></td>
                                        <td><?php echo $row["nama_mobil"]; ?></td>
                                        <td><?php echo $row["no_mobil"]; ?></td>  
                                        <td><?php echo $row["tgl_ambil"]; ?></td>
                                        <td><?php echo $row["lama"]; ?></td>
                                    </tr>
                                    <?php }  ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
            
            </div>
<script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
<script src="assets/js/vendors.js"></script>