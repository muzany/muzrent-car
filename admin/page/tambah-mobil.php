<?php
require_once "../koneksi.php";
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM mobil WHERE id_mobil='$_GET[key]'");
    $row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $err = false;
    $file = $_FILES['gambar']['name'];
    if ($update) {
        if ($file) {
            $x = explode('.', $_FILES['gambar']['name']);
            $file_name = date("dmYHis").".".strtolower(end($x));
            if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/img/mobil/".$file_name)) {
                echo alert("Upload File Gagal!", "?page=daftar-mobil");
                $err = true;
            }
            @unlink("../assets/img/mobil/".$row["gambar"]);
        } else {
            $file_name = $row["gambar"];
        }
    } else {
        if (!$file) {
            echo alert("File gambar tidak ada!", "?page=daftar-mobil");
            $err = true;
        }
        $x = explode('.', $_FILES['gambar']['name']);
        $file_name = date("dmYHis").".".strtolower(end($x));
        if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "../assets/img/mobil/".$file_name)) {
            echo alert("Upload File Gagal!", "?page=daftar-mobil");
            $err = true;
        }
    }
    if ($update) {
        $sql = "UPDATE mobil SET id_jenis='$_POST[id_jenis]', no_mobil='$_POST[no_mobil]', merk='$_POST[merk]', nama_mobil='$_POST[nama_mobil]', gambar='$file_name', harga='$_POST[harga]', status='$_POST[status]' WHERE id_mobil='$_GET[key]'";
    } else {
        $sql = "INSERT INTO mobil VALUES (NULL, '$_POST[id_jenis]', '$_POST[no_mobil]', '$_POST[merk]', '$_POST[nama_mobil]', '$file_name', '$_POST[harga]', '$_POST[status]')";
    }
    if (!$err) {
      if ($connection->query($sql)) {
        echo alert("Berhasil!", "?page=daftar-mobil");
    } else {
        echo alert("Gagal!", "?page=daftar-mobil");
    }
}
}
if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM mobil WHERE id_mobil='$_GET[key]'");
  echo alert("Berhasil!", "?page=daftar-mobil");
}

?>
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Mobil</h4>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" enctype="multipart/form-data" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="first-name-vertical">Jenis Mobil</label>
                                <select name="id_jenis" class="choices form-select">
                                    <option value="">--- Pilih Jenis Mobil ---</option>
                                    <?php $query = $connection->query("SELECT * FROM jenis"); while ($data = $query->fetch_assoc()): ?>
                                    <option value="<?=$data["id_jenis"]?>" <?= (!$update) ?: (($row["id_jenis"] != $data["id_jenis"]) ?: 'selected="on"') ?>><?=$data["nama"]?></option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="first-name-vertical">Plat Nomor</label>
                            <input type="text" id="first-name-vertical" class="form-control" <?= (!$update) ?: 'value="'.$row["no_mobil"].'"' ?> name="no_mobil">
                        </div>
                        <div class="form-group">
                            <label for="first-name-vertical">Nama Mobil</label>
                            <input type="text" id="first-name-vertical" class="form-control" <?= (!$update) ?: 'value="'.$row["nama_mobil"].'"' ?> name="nama_mobil">
                        </div>
                        <div class="form-group">
                            <label for="first-name-vertical">Merk</label>
                            <input type="text" id="first-name-vertical" class="form-control" <?= (!$update) ?: 'value="'.$row["merk"].'"' ?> name="merk">
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" name="gambar" class="form-control">
                            <?php if ($update): ?>
                                <span class="help-block">*) Kosongkang jika tidak diubah</span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="first-name-vertical">Harga Sewa</label>
                            <input type="text" id="first-name-vertical" class="form-control" <?= (!$update) ?: 'value="'.$row["harga"].'"' ?> name="harga">
                        </div>
                        <div class="form-group">
                            <label for="first-name-vertical">Status</label>
                            <select name="status" class="choices form-select">
                                <option value="">--- Pilih Status ---</option>
                                <option value="0" <?= (!$update) ?: (($row["status"] != 0) ?: 'selected="on"') ?>>Tidak Tersedia</option>
                                <option value="1" <?= (!$update) ?: (($row["status"] != 1) ?: 'selected="on"') ?>>Tersedia</option>
                            </select>
                        </div>
                        
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-end">

                    <button type="submit" class="btn btn-primary mr-1 mb-1">Simpan</button>
                    <?php if ($update): ?>

                    <?php endif; ?>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>