<?php
    require_once "koneksi.php";
$update = ((isset($_GET['action']) AND $_GET['action'] == 'update') OR isset($_SESSION["pelanggan"])) ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_SESSION[pelanggan][id]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($update) {
        $sql = "UPDATE pelanggan SET no_ktp='$_POST[no_ktp]', nama='$_POST[nama]', email='$_POST[email]', no_telp='$_POST[no_telp]', alamat='$_POST[alamat]', username='$_POST[username]'";
        if ($_POST["password"] != "") {
            $sql .= ", password='".md5($_POST["password"])."'";
        }
        $sql .= " WHERE id_pelanggan='$_SESSION[pelanggan][id]'";
    } else {
        $sql = "INSERT INTO pelanggan VALUES (NULL, '$_POST[no_ktp]', '$_POST[nama]', '$_POST[email]', '$_POST[no_telp]', '$_POST[alamat]', '$_POST[username]', '".md5($_POST["password"])."')";
    }
  if ($connection->query($sql)) {
    echo alert("Berhasil! Silahkan login", "login.php");
  } else {
        echo alert("Gagal!", "daftar.php");
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign Up MuzRent Car</title>
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
<section class="bg-gradient">  
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-12 mx-auto">
            <div class="card pt-3">
                <div class="card-body">
                	<div class="text-center mb-1">
                		<img src="images/logo3.png" height="75" class='mb-4'>
                		<h3>Sign Up</h3>
                		<p>Silahkan melakukan regestrasi akun</p>
                	</div>
                    <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                        <div class="form-group">
                            <label for="first-name-column">Nama</label>
                            <input type="text" id="first-name-column" placeholder="Nama lengkap" class="form-control"  name="nama" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                        </div>
                        <div class="form-group">
                            <label for="last-name-column">No. KTP</label>
                            <input type="text" id="last-name-column" placeholder="Masukkan No. KTP" class="form-control"  name="no_ktp" <?= (!$update) ?: 'value="'.$row["no_ktp"].'"' ?>>
                        </div>                
                        <div class="form-group">
                            <label for="country-floating">Alamat</label>
                            <input type="text" id="last-name-column" placeholder="Masukkan Alamat" class="form-control"  name="alamat" <?= (!$update) ?: 'value="'.$row["no_ktp"].'"' ?>>
                        </div>
                            <div class="form-group">
                                <label for="username-column">No. Telp</label>
                                <input type="text" id="username-column" placeholder="Masukkan no. telp" class="form-control" name="no_telp" <?= (!$update) ?: 'value="'.$row["no_telp"].'"' ?>>
                            </div>
                        <div class="form-row">    
                            <div class="form-group col-md-4">
                                <label for="company-column">Email</label>
                                <input type="email" id="company-column" placeholder="Email" class="form-control" name="email" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>>
                            </div>
                                <div class="form-group col-md-4">
                                    <label for="email-id-column">Username</label>
                                    <input type="text" id="first-name-column" placeholder="Username" class="form-control" name="username" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email-id-column">Password</label>
                                    <input type="password" id="email-id-column" placeholder="Password" class="form-control" name="password">
                                </div>
                        </div>
                       
                    <div class="clearfix text-center">
                        <?php if ($update): ?>                         
                        <?php else: ?>
                            <button type="submit" class="btn btn-primary">DAFTAR</button>
                        <?php endif; ?>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<footer class="my-1 text-center">
    <!-- Copyright removal is not prohibited! -->
    <p class="mb-2"><small>COPYRIGHT © 2020. ALL RIGHTS RESERVED. DESIGNED BY <a href="https://colorlib.com">MASMUZ </a></small></p>
</footer>

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
