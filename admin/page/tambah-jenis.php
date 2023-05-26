<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM jenis WHERE id_jenis='$_GET[key]'");
    $row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($update) {
        $sql = "UPDATE jenis SET nama='$_POST[nama]' WHERE id_jenis='$_GET[key]'";
    } else {
        $sql = "INSERT INTO jenis VALUES (NULL, '$_POST[nama]')";
    }
  if ($connection->query($sql)) {
    echo alert("Berhasil!", "?page=daftar-jenis");
  } else {
        echo alert("Gagal!", "?page=daftar-jenis");
  }
}
?>
<div class="card">
            <div class="card-header">
            <h4 class="card-title">Tambah Jenis Mobil</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form action="<?=$_SERVER['REQUEST_URI']?>" method="POST" class="form form-vertical">
                <div class="form-body">
                    <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                        <label for="first-name-vertical">Nama</label>
                        <input type="text" id="first-name-vertical" class="form-control" name="nama" <?= (!$update) ?: 'value="'.$row["nama"].'"' ?>>
                        </div>
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