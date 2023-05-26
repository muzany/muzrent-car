<?php
session_start();
require_once "../koneksi.php";
if (!isset($_SESSION["admin"])) {
    header('location: sign-in.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin MuzRent</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />
    <script type="text/javascript" src="assets/fancybox/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-media.js"></script>
    <script type="text/javascript" src="assets/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>
    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header text-center">
                    <img src="assets/img/logo4.png" alt="" srcset="">
                </div>
                <div class="sidebar-menu">
                    <ul class="menu m-0">
                        <li class='sidebar-title'>Main Menu</li>
                        <li class="sidebar-item">
                            <a href="?page=home" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>

                        </li>

                        <li class="sidebar-item has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="file" width="20"></i>
                                <span>Data</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="?page=daftar-admin">Admin</a></li>
                                <li> <a href="?page=daftar-jenis">Jenis Mobil</a></li>
                                <li><a href="?page=daftar-mobil">Mobil</a></li>
                                <li><a href="?page=daftar-pelanggan">Pelanggan</a></li>
                            </ul>
                        </li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i data-feather="book" width="20"></i>
                                <span>Laporan</span>
                            </a>
                            <ul class="submenu ">
                                <li><a href="?page=lap-konfirmasi">Konfirmasi</a></li>
                                <li><a href="?page=lap-penyewaan">Penyewaan Permobil</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
            <div id="main">
                <nav class="navbar navbar-header navbar-expand navbar-light">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                            <li class="dropdown nav-icon">
                                <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="d-lg-inline-block">
                                        <i data-feather="bell"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                                    <h6 class='py-2 px-4'>Notifikasi</h6>
                                    <ul class="list-group rounded-none">
                                        <li class="list-group-item border-0 align-items-start">
                                            <div class="avatar bg-success mr-3">
                                                <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                            </div>
                                            <div>
                                                <h6 class='text-bold'>Penyewaan Baru</h6>
                                                <?php if ($query = $connection->query("SELECT * FROM transaksi INNER JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan INNER JOIN mobil ON transaksi.id_mobil = mobil.id_mobil")); ?>
                                                <?php while ($row = $query->fetch_assoc()) { ?>
                                                    <p class='text-xs'>
                                                        <?php echo $row["nama"]; ?> menyewa mobil <?php echo $row["nama_mobil"]; ?> <?php echo $row["lama"]; ?> hari pada tanggal <?php echo $row["tgl_sewa"]; ?>
                                                    </p>
                                                <?php }  ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                    <div class="avatar mr-1">
                                        <img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                                    </div>
                                    <div class="d-none d-md-block d-lg-inline-block"><?= ucfirst($_SESSION["admin"]["username"]) ?></div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="logout.php"><i data-feather="log-out"></i>Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                <div class="main-content container-fluid">
                    <section class="section">
                        <?php include adminPage($_ADMINPAGE); ?>
                    </section>
                </div>

                <footer>
                    <div class="footer clearfix mb-0 text-muted">
                        <div class="float-left">
                            <p>2020 &copy; MuzRent</p>
                        </div>
                        <div class="float-right">
                            <p>Designed by <span class='text-danger'><i data-feather="heart"></i></span> by <a href="#">Muhammad Muzany Mulyoutomo</a></p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="assets/js/feather-icons/feather.min.js"></script>

        <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>

        <script src="assets/js/app.js"></script>
        <script src="assets/vendors/chartjs/Chart.min.js"></script>
        <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>

        <script src="assets/js/main.js"></script>
</body>

</html>