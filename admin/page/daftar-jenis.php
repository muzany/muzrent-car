<?php 
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
  $sql = $connection->query("SELECT * FROM jenis WHERE jenis='$_GET[key]'");
  $row = $sql->fetch_assoc();
}
 if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM jenis WHERE id_jenis='$_GET[key]'");
  echo alert("Berhasil!", "?page=daftar-jenis");
}
?>

<div class="row" id="table-hover-row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Jenis Mobil</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
            <div class="buttons">
                <a href="?page=tambah-jenis" class="btn btn-info">Tambah</a>
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
                <th>AKSI</th>
              </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
            	  <?php $query=$connection->query("SELECT * FROM jenis"); ?>
              	<?php while($row=$query->fetch_assoc()) { ?>
              <tr>
                <td class="text-bold-500"><?=$no++?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td>
                      <div class="btn-group mb-1 btn-group-sm" role="group" aria-label="Basic example">
                            <a href="?page=tambah-jenis&action=update&key=<?=$row['id_jenis']?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="?page=daftar-jenis&action=delete&key=<?=$row['id_jenis']?>" class="btn btn-danger btn-xs">Hapus</a>
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