<?php
if (!isset($_SESSION["pelanggan"])) {
  header('location: login.php');
}
?>
<div class="section light-bg" id="profil">
	<div class="container">

		<div class="section-title">
			<small><CENTER>PROFIL</CENTER></small>
			<h3>Selamat datang di profil kamu</h3>
		</div>
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li class="nav-item">
						<a class="nav-link active " data-toggle="tab" href="#data">Data Pribadi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#rtransaksi">Riwayat Transaksi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#rdenda">Riwayat Denda</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane fade show active" id="data">

							<?php if (isset($_SESSION["pelanggan"])): ?>
							<?php $id = $_SESSION["pelanggan"]["id"]; if ($query = $connection->query("SELECT * FROM pelanggan WHERE id_pelanggan=$id")): ?>
							<?php while ($data = $query->fetch_assoc()): ?>
							<div class="text-center">
								<!-- <div height="75" class='mb-5'>
									<?="<img src='..images/pelanggan/".$data['gambar'].";'>"?>
								</div> -->
								<h2><?=$data['nama']?></h2>
								<hr>
								<p class="lead"><span class="ti-mobile mr-2"></span><?=$data['no_telp']?></p>
								<p class="lead"><span class="ti-email mr-2"></span><?=$data['email']?></p>
								<p class="lead"><span class="ti-user mr-2"></span><?=$data['username']?></p>
								<p class="lead"><span class="ti-location-pin mr-2"></span><?=$data['alamat']?></p>
								<hr>
								<a class="btn btn-warning" href="">Edit</a>
							</div>

							<!-- <form>
							<div class="form-group">
								<label for="first-name-column">Nama Lengkap</label>
								<input disabled="on" type="text" id="first-name-column" class="form-control"  name="nama" value="<?=$data['nama']?>">
							</div>
							<div class="form-group">
								<label for="country-floating">No. Telp</label>
								<input disabled="on" type="text" id="country-floating" class="form-control" name="alamat" value="<?=$data['no_telp']?>">
							</div>
							<div class="form-group">
								<label for="last-name-column">Email</label>
								<input disabled="on" type="email" id="last-name-column" class="form-control"  name="no_ktp" value="<?=$data['email']?>">
							</div>                
							<div class="form-group">
								<label for="country-floating">Username</label>
								<input disabled="on" type="text" id="country-floating" class="form-control" name="alamat" value="<?=$data['username']?>">
							</div>
							<div class="form-group">
								<label for="country-floating">Alamat</label>
								<input disabled="on" type="text" id="country-floating" class="form-control" name="alamat" value="<?=$data['alamat']?>">
							</div>
							</form> -->
							<?php endwhile ?>
               				<?php endif ?>
               				<?php endif ?>
					</div>
					<div class="tab-pane fade" id="rtransaksi">
							<?php if ($query = $connection->query("SELECT * FROM transaksi WHERE id_pelanggan=$id")): ?>
							<?php $no = 1; ?>
							<div class="table-responsive text-center">
								<table class="table table-hover mb-0">
									<thead>
										<tr>
											<th>No</th>
											<th>Total</th>
											<th>Lama</th>
											<th>Jaminan</th>
											<th>Tanggal Pemesanan</th>
											<th>Jatuh Tempo</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($data = $query->fetch_assoc()): ?>
											<tr>
												<td><?=$no++?></td>
												<td>Rp.<?=number_format($data['total_harga'])?>,-</td>
												<td><?=$data['lama']?> Hari</td>
												<td><?=$data['jaminan']?></td>
												<td><?=date("d-m-Y H:i:s", strtotime($data['tgl_sewa']))?></td>
												<td><?=date("d-m-Y H:i:s", strtotime($data['jatuh_tempo']))?></td>
												<td>
													<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
													<?php if (!$data['konfirmasi'] AND !$data["pembatalan"]): ?>
														<a href="?page=konfirmasi&id=<?= $data['id_transaksi'] ?>" class="btn btn-success btn-xs">Konfirmasi</a>
													<?php endif ?>
														<a href="?page=detail&id=<?= $data['id_transaksi'] ?>" class="btn btn-info btn-xs">Detail</a>
													</div>
												</td>
											</tr>
										<?php endwhile ?>
									</tbody>
								</table>
							<?php endif ?>
							</div>
					</div>
					<div class="tab-pane fade" id="rdenda">
							<?php if ($query = $connection->query("SELECT * FROM transaksi WHERE id_pelanggan=$id AND denda <> ''")): ?>
                			<?php $no = 1; ?>
							<div class="table-responsive text-center">
								<table class="table table-hover mb-0">
									<thead>
										<tr>
											<th>No</th>
											<th>Jaminan</th>
											<th>Tanggal Ambil</th>
											<th>Tanggal Kembali</th>
											<th>Total Harga</th>
											<th>Total Denda</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<?php while ($data = $query->fetch_assoc()): ?>
											<tr>
												<td><?=$no++?></td>
												<td><?=$data['jaminan']?></td>
												<td><?=date("d-m-Y H:i:s", strtotime($data['tgl_ambil']))?></td>
												<td><?=date("d-m-Y H:i:s", strtotime($data['tgl_kembali']))?></td>
												<td>Rp.<?=number_format($data['total_harga'])?>,-</td>
												<td>Rp.<?=number_format($data['denda'])?>,-</td>
												<td>
													<a href="?page=detail&id=<?= $data['id_transaksi'] ?>" class="btn btn-warning btn-xs">Lihat Transaksi</a>
												</td>
											</tr>
										<?php endwhile ?>
									</tbody>
								</table>
								<?php endif ?>
							</div>
					</div>
				</div>
	</div>
</div>