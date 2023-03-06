<section class="konten mt-2">
    <div class="container-fluid">

        <div class="card border-dark">
            <div class="card-header bg-danger text-white">
           

                <a href="<?= base_url('admin/Data_admin') ?>" class="btn btn-sm btn-light float-right"> Kembali</a>
            </div>
            <div class="card-body">
                <form method="post" action="<?= base_url('admin/data_admin/insert') ?>">
                
                    <div class="form-group">
                        <label for="">Nama petugas</label>
                        <input type="text" name="nama_petugas" class="form-control"  required
                        placeholder="Masukkan nama petugas...">
                        
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control"  required
                        placeholder="Masukkan nama username...">

                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" required
                        placeholder="Masukkan nama password...">

                    </div>
                   
                    <div class="form_group">
                        <label for="">Role</label>
                        <select name="id_level" id="id_level" class="form-control">

                            <option value="" >--- Pilih Role ---</caption>
                            <option value="1">1. administrator</option>
                            <option value="2">2. petugas</option>
                        </select>
                    </div>
                    

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-sm">simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</section>