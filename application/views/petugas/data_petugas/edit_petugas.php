

<section class="konten mt-2">
    <div class="container-fluid">

        <div class="card border-dark">
            <div class="card-header bg-danger text-white">
                <!-- <?= $title; ?> -->
                <a href="<?= base_url('admin/data_petugas') ?>" class="btn btn-sm btn-light float-right"> Kembali</a>
            </div>
            <div class="card-body">
			<form action="<?= base_url('admin/data_petugas/update/'); ?>" method="post" enctype="multipart/form-data">
			<input type="hidden" readonly value="<?= $tb_barang['id_petugas']; ?>" class="form-control" name="id_barang" id="id_barang">
				<div class="form-group">
					<label for="nama_petugas">Nama petugas</label>
					<input type="text" name="nama_petugas" id="nama_petugas" value="<?= $tb_petugas['nama_petugas'] ?>" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" name="username" id="username" value="<?= $tb_petugas['username'] ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" value="<?= $tb_barang['password'] ?>" class="form-control" placeholder="kosongkan jika tidak diubah" />
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary" name="save" value="true">Simpan</button>
				</div>
			</form>
		
                 
                </form>
            </div>
        </div>
    </div>
    </div>
</section>
