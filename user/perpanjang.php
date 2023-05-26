<?php

if (!isset($_SESSION["pelanggan"])) {
  header('location: login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sql = $connection->query("SELECT t.lama, m.harga FROM transaksi t JOIN mobil m USING(id_mobil) WHERE t.id_transaksi=$_POST[_id]");
		$r = $sql->fetch_assoc();
		$lama = $r["lama"] + $_POST["lama"];
		$harga = $r["harga"] * $lama;
    if ($connection->query("UPDATE transaksi SET lama='$lama', total_harga='$harga' WHERE id_transaksi=$_POST[_id]")) {
        echo alert("Berhasil di perpanjang!", "?page=profil");
    } else {
        echo alert("Gagal di perpanjang!", "?page=perpanjang&id=".$_GET['id']);
    }
}
?>
<div class="section light-bg">
	<div class="container">
		<div class="section-title">
			<small><CENTER>RIWAYAT TRANSAKSI</CENTER></small>
			<h3>Perpanjang Sewa</h3>
		</div>
		<div class="tab-content">
			<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST"></form>>
			<div class="form-group">
				<label for="lama">Lama sewa</label>
				<select name="lama" class="form-control">
					<?php for ($i=1; $i<=7; $i++): ?>
						<option value="<?=$i?>"><?=$i?> Hari</option>
					<?php endfor; ?>
				</select>
			</div>
			<center><button type="submit" class="btn btn-success mr-3">PERPANJANG</button>
			<a href="?page=profil" type="submit" class="btn btn-secondary">BATAL</a></center>
			<input type="hidden" name="_id" value="<?=$_GET['id']?>">
		</form>
	</div>
</div>
</div>