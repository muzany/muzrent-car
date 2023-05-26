<?php
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
      if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "/assets/img/mobil/".$file_name)) {
        echo alert("Upload File Gagal!", "?page=daftar-mobil");
        $err = true;
      }
      @unlink("/assets/img/mobil/".$row["gambar"]);
    } else {
      $file_name = $row["gambar"];
    }
  } else {
    if (!$file) {
      echo alert("File gambar tidak ada!", "?page=-daftar-mobil");
      $err = true;
    }
    $x = explode('.', $_FILES['gambar']['name']);
    $file_name = date("dmYHis").".".strtolower(end($x));
    if (! move_uploaded_file($_FILES['gambar']['tmp_name'], "/assets/img/mobil/".$file_name)) {
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
<div class="row" id="table-hover-row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Mobil</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
            <div class="buttons">
                <a href="?page=tambah-mobil" class="btn btn-info">Tambah</a>
            </div>
            <div class="buttons">
                <a onClick="window.print();return false" class="btn icon btn-primary"><i data-feather="printer"></i></a>             
            </div>
        </div>
        <!-- table hover -->
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>NO</th>
                <th>JENIS</th>
                <th>PLAT NOMOR</th>
                <th>NAMA</th>
                <th>MERK</th>
                <th>HARGA</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; ?>
              <?php if ($query=$connection->query("SELECT * FROM mobil JOIN jenis USING(id_jenis)")); ?>
              <?php while($row=$query->fetch_assoc()) { ?>
              <tr>
                <td class="text-bold-500"><?=$no++?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td class="text-bold-500"><?php echo $row["no_mobil"]; ?></td>
                <td><?php echo $row["nama_mobil"]; ?></td>
                <td><?php echo $row["merk"]; ?></td>
                <td><?php echo $row["harga"]; ?></td>
                <td>
                    <div class="badges">
                        <span class="badge bg-<?=($row['status']) ? "success" : "danger" ?>"><?=($row['status']) ? "Tersedia" : "Tidak Tersedia" ?></span>
                    </div>
                </td>
                <td>
                      <div class="btn-group mb-1 btn-group-sm" role="group" aria-label="Basic example">
                            <a href="../assets/img/mobil/<?=$row['gambar']?>" class="btn btn-info btn-xs fancybox">Lihat</a>
                            <a href="?page=tambah-mobil&action=update&key=<?=$row['id_mobil']?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="?page=daftar-mobil&action=delete&key=<?=$row['id_mobil']?>" class="btn btn-danger btn-xs">Hapus</a>
                      </div>
                </td>
              </tr>
              <?php }  ?>
        </div>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    iframe : {
      preload: false
    }
  });
  $(".various").fancybox({
    maxWidth    : 800,
    maxHeight    : 600,
    fitToView    : false,
    width        : '70%',
    height        : '70%',
    autoSize    : false,
    closeClick    : false,
    openEffect    : 'none',
    closeEffect    : 'none'
  });
  $('.fancybox-media').fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    helpers : {
      media : {}
    }
  });
});
</script>