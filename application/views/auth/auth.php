
<div class="container logo-wrap">
                <div class="row pt-2">
                    <div class="col-12 text-center">
                        <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                       <img src="<?= base_url('assets/images/img.jpg'); ?>" height="350" width="800">
                    </div>
                </div>
            </div>
    </nav>
</div>
        </header>
        <!-- END header -->

<div class="container-fluid">

    <div class="row text-center mt-5">
        <!-- begin Page Content -->

		
        <?php foreach ($auctions as $auction) : ?> 
            <?php if($auction->status == 'dibuka'): ?>
            <div class="card ml-5 mb-5" style="width: 30rem;">
                <div class="card-body">
                <img src="<?= base_url() . '/assets/images/barang/' . $auction->gambar ?>" class="card-img-top" alt="...">
                <div class="card-body"><section</section>
                        <h5 class="card-title"><?= $auction->nama_barang; ?></h5>
                </div>
                <strong>Rp.<?= $auction->harga_awal?></strong>
                <br><br>
                <a href="<?= base_url('petugas/auction/detail_barang/') . $auction->id_lelang; ?>" class="btn btn-primary">
                       lihat detail
                    </a>
            </div>
		</div>
             <?php endif; ?>
			 <?php endforeach; ?> 

    </div>

</div>
