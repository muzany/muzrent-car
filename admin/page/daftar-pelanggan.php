<?php
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
    $sql = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[key]'");
    $row = $sql->fetch_assoc();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($update) {
        $sql = "UPDATE pelanggan SET nama='$_POST[nama]' WHERE id_pelanggan='$_GET[key]'";
    } else {
        $sql = "INSERT INTO pelanggan VALUES (NULL, '$_POST[nama]')";
    }
  if ($connection->query($sql)) {
    echo alert("Berhasil!", "?page=daftar-pelanggan");
  } else {
        echo alert("Gagal!", "?page=daftar-pelanggan");
  }
}
 if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM pelanggan WHERE id_pelanggan='$_GET[key]'");
  echo alert("Berhasil!", "?page=daftar-pelanggan");
}
?>
<div class="row" id="table-hover-row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Pelanggan</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
            <div class="buttons">
                <a href="?page=tambah-pelanggan" class="btn btn-info">Tambah</a>
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
                <th>NAMA</th>
                <th>NO. TELP</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>ALAMAT</th>
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php $query=$connection->query("SELECT * FROM pelanggan"); ?>
                <?php while($row=$query->fetch_assoc()) { ?>
              <tr>
                <td class="text-bold-500"><?=$no++?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td class="text-bold-500"><?php echo $row["no_telp"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td>
                      <div class="btn-group mb-1 btn-group-sm" role="group" aria-label="Basic example">
                            <a href="img/pelanggan/<?=$row['gambar']?>" class="btn btn-info btn-xs fancybox">Lihat</a>
                            <a href="?page=tambah-pelanggan&action=update&key=<?=$row['id_pelanggan']?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="?page=daftar-pelanggan&action=delete&key=<?=$row['id_pelanggan']?>" class="btn btn-danger btn-xs">Hapus</a>
                      </div>
                </td>
              </tr>
            <?php } ?>
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