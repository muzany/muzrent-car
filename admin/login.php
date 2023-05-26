<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "../koneksi.php";
    $sql = "SELECT * FROM admin WHERE username='$_POST[username]' AND password='" . md5($_POST['password']) . "'";
    if ($query = $connection->query($sql)) {
        if ($query->num_rows) {
            session_start();
            while ($data = $query->fetch_array()) {
              $_SESSION["admin"]["is_logged"] = true;
              $_SESSION["admin"]["username"] = $data["username"];
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin MuzRent</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <div id="auth">

        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">
                            <div class="text-center mb-5">
                                <img src="../images/logo3.png" height="48" class='mb-4'>
                                <h3>Login</h3>
                                <p>Harap login untuk melanjutkan ke halaman Admin.</p>
                            </div>
                            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
                                <div class="form-group position-relative has-icon-left">
                                    <label for="username">Username</label>
                                    <div class="position-relative">
                                        <input name="username" placeholder="Username" type="text" class="form-control" id="username" autofocus="on">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group position-relative has-icon-left">
                                    <div class="clearfix">
                                        <label for="password">Password</label>
                                    </div>
                                    <div class="position-relative">
                                        <input name="password" placeholder="Password" type="password" class="form-control" id="password">
                                        <div class="form-control-icon">
                                            <i data-feather="lock"></i>
                                        </div>
                                    </div>
                                </div>

                        <!-- <div class='form-check clearfix my-4'>
                            <div class="checkbox float-left">
                                <input type="checkbox" id="checkbox1" class='form-check-input' >
                                <label for="checkbox1">Ingat saya</label>
                            </div>
                        </div> -->
                        <div class="clearfix">
                            <button type="submit" class="btn btn-primary float-right">Login</button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<script src="assets/js/feather-icons/feather.min.js"></script>
<script src="assets/js/app.js"></script>

<script src="assets/js/main.js"></script>
</body>

</html>
