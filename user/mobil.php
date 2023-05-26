<div class="section light-bg" id="mobil">

        <div class="container">

            <div class="section-title">
                <small>PILIHAN MOBIL</small>
                <h3>Silahkan memilih mobil</h3>
            </div>


            <div class="row">
            <?php $query = $connection->query("SELECT * FROM mobil JOIN jenis USING(id_jenis)"); while ($row = $query->fetch_assoc()): ?>
                <div class="col-12 col-lg-3">
                    <div class="card features">
                        <img class="card-img-top" src="images/mobil/<?=$row['gambar']?>" alt="Card image cap">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <h4 class="card-title"><?=$row["nama_mobil"]?></h4>
                                    <hr>
                                    <h5 class="card-text">Rp. <?=$row["harga"]?>/hari</h5>
                                    <p class="card-text"><?=$row["nama"]?></p>
                                    <p class="card-text"><?=$row["merk"]?></p>
                                    <p class="card-text"><?=$row["no_mobil"]?></p>
                                    <span class="badge badge-pill badge-<?=($row['status']) ? "success" : "danger" ?>"><?=($row['status']) ? "Tersedia" : "Tidak Tersedia" ?></span>
                                    <hr>
                                    <center><a href="<?=($row['status']) ? "?page=sewa&id=$row[id_mobil]" : "?page=tidak-tersedia" ?>" class="btn btn-primary" <?=($row['status']) ?: "disabled" ?>>Sewa</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
            <?php endwhile; ?>        
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