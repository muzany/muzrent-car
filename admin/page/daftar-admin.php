<?php 
$update = (isset($_GET['action']) AND $_GET['action'] == 'update') ? true : false;
if ($update) {
  $sql = $connection->query("SELECT * FROM admin WHERE id_admin='$_GET[key]'");
  $row = $sql->fetch_assoc();
}
 if (isset($_GET['action']) AND $_GET['action'] == 'delete') {
  $connection->query("DELETE FROM admin WHERE id_admin='$_GET[key]'");
  echo alert("Berhasil!", "?page=daftar-admin");
}
?>

<div class="row" id="table-hover-row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Data Admin</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
            <div class="buttons">
                <a href="?page=tambah-admin" class="btn btn-info">Tambah</a>
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
              <?php $query=$connection->query("SELECT * FROM admin"); ?>
              <?php while($row=$query->fetch_assoc()) { ?>
              <tr>
                <td class="text-bold-500"><?php echo $row["id_admin"]; ?></td>
                <td><?php echo $row["nama"]; ?></td>
                <td class="text-bold-500"><?php echo $row["telp"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["alamat"]; ?></td>
                <td>
                      <div class="btn-group mb-1 btn-group-sm" role="group" aria-label="Basic example">
                            <a href="?page=tambah-admin&action=update&key=<?=$row['id_admin']?>" class="btn btn-warning btn-xs">Edit</a>
                            <a href="?page=daftar-admin&action=delete&key=<?=$row['id_admin']?>" class="btn btn-danger btn-xs">Hapus</a>
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