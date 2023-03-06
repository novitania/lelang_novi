
<h1 class="text-center">HISTORY LELANG</h1>
<div class="row text-center mt-5">
    <!-- begin Page Content -->

    <?php foreach ($history as $hist) : ?>
        <div class="card ml-5 mb-5" style="width: 30rem;">
            <div class="card-body">
           
            <img src="<?= base_url() . '/assets/images/barang/' . $hist->gambar ?>" class="card-img-top" alt="...">
            <div class="card-body">
                    <h5 class="card-title"><?= $hist->nama_barang; ?></h5>
                    <h5 class="card-title"><?= $hist->deskripsi_barang; ?></h5>
            </div>
            <strong>Rp.<?= $hist->harga_awal?></strong>
            <br><br>
            <a href="<?= base_url('history/detail_history/') . $hist->id_lelang; ?>" class="btn btn-primary">Lihat Detail</a>
        </div>
    </div>
         <?php endforeach; ?> 
</div>