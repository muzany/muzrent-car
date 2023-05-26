<?php
if (!isset($_SESSION["pelanggan"])) {
  header('location: login.php');
  exit;
}
?>

<div class="section light-bg">
    <div class="container">
        <div class="section-title">
                <small><CENTER>FORMULIR RENTAL MOBIL</CENTER></small>
                <h3>Silahkan isi formulir</h3>
            </div>
        <div class="tab-content">
        <form action="?page=selesai" method="POST">
            <input type="hidden" name="id_mobil" value="<?=$_GET["id"]?>">
            <div class="form-group">
                <label for="lama">Lama sewa</label>
                <select name="lama" class="form-control">
                    <?php for ($i=1; $i<=7; $i++): ?>
                      <option value="<?=$i?>"><?=$i?> Hari</option>
                    <?php endfor; ?>
                </select>
            </div>  
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="supir">Pilih tanggal ambil</label>
                <select name="tgl" class="form-control">
                    <option>--- Tanggal ---</option>
                    <?php for ($i=1; $i<=31; $i++): ?>
                      <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor; ?>
                </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="supir">Pilih bulan</label>
                <select name="bln" class="form-control">
                    <option>--- Bulan ---</option>
                    <?php for ($i=1; $i<=12; $i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor; ?>
                </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="supir">Pilih tahun</label>
                <select name="thn" class="form-control">
                    <option>--- Tahun ---</option>
                    <?php for ($i=2020; $i<=2025; $i++): ?>
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor; ?>
                </select>
                </div>
            </div>
            <div class="form-group">
                <label for="supir">Pakai supir?</label>
                <select name="status" class="form-control">
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                </select>
            </div>
            <div class="form-group">
                <label for="jaminan">Jaminan</label>
                <select name="jaminan" class="form-control">
                    <option value="STNK">STNK</option>
                    <option value="Sertifikat Rumah">Sertifikat Rumah</option>
                </select>
            </div>
            <center><button type="submit" class="btn btn-primary">LANJUT</button></center>

        </form>
        </div>
    </div>
</div>

