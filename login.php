<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "koneksi.php";
    $sql = "SELECT * FROM pelanggan WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
                $_SESSION["pelanggan"]["is_logged"] = true;
                $_SESSION["pelanggan"]["id"] = $data["id_pelanggan"];
                $_SESSION["pelanggan"]["username"] = $data["username"];
                $_SESSION["pelanggan"]["nama"] = $data["nama"];
                $_SESSION["pelanggan"]["no_ktp"] = $data["no_ktp"];
                $_SESSION["pelanggan"]["no_telp"] = $data["no_telp"];
                $_SESSION["pelanggan"]["email"] = $data["email"];
                $_SESSION["pelanggan"]["alamat"] = $data["alamat"];
              }
            header('location: index.php');
        } else {
            echo alert("Username / Password tidak sesuai!", "login.php");
        }
    } else {
        echo "Query error!";
    }
}
?>
<!doctype html>
<html lang="en">


<head>
    <title>Login MuzRent Car</title>
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
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="shortcut icon" href="images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Menu -->


    <section class="bg-gradient">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-5 col-sm-12 mx-auto">
    				<div class="card pt-4">
    					<div class="card-body">
    						<div class="text-center mb-5">
    							<img src="images/logo3.png" height="75" class='mb-5'>
    							<h3>Login</h3>
    							<p>Harap login untuk melanjutkan ke MuzRent Car</p>
    						</div>
    						<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
    							<div class="form-group position-relative has-icon-left text-left">
    								<label for="username">Username</label>
    								<div class="position-relative">
    									<input name="username" type="text" class="form-control" id="username">
    									<div class="form-control-icon">
    										<i data-feather="user"></i>
    									</div>
    								</div>
    							</div>
    							<div class="form-group position-relative has-icon-left text-left">
    								<div class="clearfix">
    									<label for="password">Password</label>
    								</div>
    								<div class="position-relative">
    									<input name="password"  type="password" class="form-control" id="password">
    									<div class="form-control-icon">
    										<i data-feather="lock"></i>
    									</div>
    								</div>
    							</div>
    							<div class='form-check clearfix my-4'>
    								<div class="float-right">
    									<a href="daftar.php">Belum punya akun?</a>
    								</div>
    							</div>
    							<div class="clearfix">
    								<button class="btn btn-primary float-right">Login</button>
    							</div>
    						</form>

    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <!-- // end .section -->
    <footer class="my-1 text-center">
        <!-- Copyright removal is not prohibited! -->
        <p class="mb-2"><small>COPYRIGHT © 2020. ALL RIGHTS RESERVED. DESIGNED BY <a href="https://colorlib.com">MASMUZ </a></small></p>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/feather-icons/feather.min.js"></script>
    
    <script src="js/main.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>

</body>

</html>
