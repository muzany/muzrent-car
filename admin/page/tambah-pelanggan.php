<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[key]'");
    $row = $sql->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($update) {
        $sql = "UPDATE pelanggan SET no_ktp='$_POST[no_ktp]', nama='$_POST[nama]', email='$_POST[email]', alamat='$_POST[alamat]', telp='$_POST[no_telp]', username='$_POST[username]'";
        if ($_POST["password"] != "") {
            $sql .= ", password='".md5($_POST["password"])."'";
        }
        $sql .= " WHERE id_pelanggan='$_GET[key]'";
    } else {
        $sql = "INSERT INTO pelanggan VALUES (NULL, '$_POST[no_ktp]', '$_POST[nama]', '$_POST[email]', '$_POST[alamat]', '$_POST[no_telp]', '$_POST[username]', '".md5($_POST["password"])."')";
    }
  if ($connection->query($sql)) {
    echo alert("Berhasil!", "?page=pelanggan");
  } else {
        echo alert("Gagal!", "?page=pelanggan");
  }
}

?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Pelanggan</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="first-name-icon">Nama</label>
                                <div class="position-relative">
                                    <input name="nama" type="text" class="form-control" id="first-name-icon" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">

                            <div class="form-group has-icon-left">
                                <label for="email-id-icon">No. KTP</label>
                                <div class="position-relative">
                                    <input name="no_ktp" type="text" class="form-control" id="email-id-icon" <?= (!$update) ?: 'value="'.$row["no_ktp"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="file"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">No. Telp</label>
                                <div class="position-relative">
                                    <input name="no_telp" type="text" class="form-control" id="mobile-id-icon" <?= (!$update) ?: 'value="'.$row["no_telp"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="phone"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="password-id-icon">Email</label>
                                <div class="position-relative">
                                    <input name="email" type="email" class="form-control" id="password-id-icon" <?= (!$update) ?: 'value="'.$row["email"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">Alamat</label>
                                <div class="position-relative">
                                    <input name="alamat" type="text" class="form-control" id="mobile-id-icon" <?= (!$update) ?: 'value="'.$row["alamat"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="home"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="mobile-id-icon">Username</label>
                                <div class="position-relative">
                                    <input name="username" type="text" class="form-control" id="mobile-id-icon" <?= (!$update) ?: 'value="'.$row["username"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="password-id-icon">Password</label>
                                <div class="position-relative">
                                    <input name="password" type="password" class="form-control" id="password-id-icon" <?= (!$update) ?: 'value="'.$row["password"].'"' ?>>
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                             <label for="gambar">Gambar</label>
                             <!-- <div class="form-file"> -->
                                <input type="file" name="gambar" class="form-control" id="gambar">
                                <?php if ($update): ?> 
                                    <span class="help-block">*) Kosongkang jika tidak diubah</span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                            <?php if ($update): ?>

                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>