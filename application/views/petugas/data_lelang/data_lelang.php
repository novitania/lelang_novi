<div class="container">

	<div class="row">
		<div class="col-md-12">
		<!-- pesan error -->
		<?php if (validation_errors()) : ?>
				<div class="alert alert-success" role="alert">
					<?php validation_errors(); ?>
		</div>
		<?php endif; ?>
		<?php echo $this->session->flashdata('message'); ?>	

			<div class="card border-dark">
            <div class="card-header bg-danger text-white">
			<h5>Data Lelang<h5>

			<a href="<?php echo base_url('petugas/data_lelang/create') ?>" 
			class="btn btn-sm btn-warning float-right">Tambahkan Lelang</a>
			</div>
			
			<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover table-bordered">
					<tr>
						<th>NO</th>
						<th>Gambar</th>
                        <th>Nama</th>
						<th>Harga Awal</th>
						<th>Status</th>
						<th>Pemenang</th>
						<th>Harga Akhir</th>
						<th>Petugas</th>
						<th>Action</th>
					</tr>
					<?php $i = 1;
					foreach ($auctions as $auction) : ?>
						<tr>
							<td><?php echo $i; ?></td>
							<td>
								<img src="<?= base_url() . '/assets/images/barang/' . $auction->gambar ?>"
								width="100">
							</td>
							<td><?php echo $auction->nama_barang; ?><h4>...</h4></td>
							<td>Rp. <?= number_format($auction->harga_awal, 2, ',', '.'); ?></td>
							<td>
								<?php if ($auction->status == 'ditutup') :?>
									<div class="text-danger">Ditutup</div>
									<?php else:?>
										<div class="text-success">Dibuka</div>
								<?php endif;?>
							</td>
							
								<td>
								<?php if ($auction->pemenang == null) : ?>
										-
									<?php else : ?>
										<?= $auction->pemenang?>
									<?php endif; ?>
								</td>
								<td>
										<?php if ($auction->harga_akhir == null) : ?>
											-
										<?php else : ?>
											Rp. <?= number_format($auction->harga_akhir, 2, ',', '.') ?>
									<?php endif; ?>
								</td>
							</th>
							
							<td><?= $auction->nama_petugas ?></td>
							<td> 
							
								<?php if (empty($auction->status == 'ditutup')) : ?>
								<?= anchor('petugas/Data_lelang/edit/' . $auction->id_lelang,  
								'<div class="btn btn-primary btn-sm mb-3"><i class="fas fa-edit"></i></div>') ?>

								<?= anchor('petugas/Data_lelang/delete/' . $auction->id_lelang,  
								'<div class="btn btn-danger btn-sm mb-3"><i class="fas fa-trash"></i></div>') ?>

								<?= anchor('petugas/Data_lelang/view/' . $auction->id_lelang,  
								'<div class="btn btn-success btn-sm mb-3"><i class="fas fa-eye"></i></div>') ?>

								<?php else : ?>
								<?= anchor('petugas/Data_lelang/view/' . $auction->id_lelang,  
								'<div class="btn btn-info btn-sm mb-3"><i class="fas fa-eye"></i></div>') ?>

								<?php endif; ?>	
							</td>
						</tr>
					<?php $i++;
					endforeach; ?>
				</table>
				</div></div>
			</div>
		</div>
	</div>

</div>
</div>