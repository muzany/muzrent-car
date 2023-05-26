<?php
session_start();
require_once "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <title>MuzRent - Rent Car Terpercaya</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mobland - Mobile App Landing Page Template">
    <meta name="keywords" content="HTML5, bootstrap, mobile, app, landing, ios, android, responsive">

    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/media-queries.css">
    <link rel="stylesheet" href="css/simplepicker.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">

    <!-- Nav Menu -->

    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="?page=home"><img src="images/logo1.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <?php if (isset($_SESSION["pelanggan"])): ?>
                                <li class="nav-item"> <a class="nav-link active" href="?page=home">HOME<span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=mobil">MOBIL</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=info">INFO</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=kontak">TENTANG KAMI</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=covid">COVID-19 <span class="badge badge-pill badge-danger">Baru</span> </a>
                                    <li class="dropdown">
                                        <a href="#" data-toggle="dropdown" class="nav-link btn btn-primary dropdown-toggle nav-link-md nav-link-user">
                                            <div class="d-none d-md-block d-lg-inline-block"><?= ucfirst($_SESSION["pelanggan"]["username"]) ?></div>
                                        </a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="?page=profil">Profil</a>
                                            <a class="dropdown-item" href="logout.php">Keluar</a>
                                        </div>
                                    </li>
                                <?php else: ?>
                                <li class="nav-item"> <a class="nav-link" href="?page=home">HOME</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=mobil">MOBIL</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=info">INFO</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=kontak">TENTANG KAMI</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="?page=covid">COVID-19 <span class="badge badge-pill badge-danger">Baru</span> </a>
                                <li class="nav-item"><a href="login.php" data-toggle="tooltip" data-placement="bottom" title="Login ke MuzRent Car" class="btn btn-primary">Login</a></li>
                                
                                <?php endif; ?>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <header class="bg-gradient" id="home">
    </header>

    <?php include page($_PAGE); ?> 

    <!-- // end .section -->
    <footer class="my-4 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p><small>COPYRIGHT © 2020. ALL RIGHTS RESERVED. DESIGNED BY <a href="#">MASMUZ </a></small></p>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-countTo.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/feather-icons/feather.min.js"></script>

    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/script.js"></script>
    <script src="js/wow.min.js"></script>
    <script>
       var wow = new WOW ({
                boxClass:     'wow',      // animated element css class (default is wow)
                animateClass: 'animated', // animation css class (default is animated)
                offset:       120,          // distance to the element when triggering the animation (default is 0)
                mobile:       false,       // trigger animations on mobile devices (default is true)
                live:         true        // act on asynchronously loaded content (default is true)
     }
     );
       wow.init();
     </script> 


</body>

</html>
