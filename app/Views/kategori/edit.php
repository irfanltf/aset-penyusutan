<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Halaman kategori</h4>
        </div>
        <div class="card-body">
            <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="kode_kategori" class="form-label">Kode kategori</label>

                            <input type="text" name="kode_kategori" class="form-control <?= ($validation->hasError('kode_kategori')) ? 'is-invalid' : '' ?>" id="kode_kategori" aria-describedby="emailHelp" value="<?= (old('kode_kategori')) ? old('kode_kategori') : $kategori['kode_kategori'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_kategori'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">Nama kategori</label>
                            <input type="text" name="nama_kategori" class="form-control <?= ($validation->hasError('nama_kategori')) ? 'is-invalid' : '' ?>" id="nama_kategori" value="<?= (old('nama_kategori')) ? old('nama_kategori') : $kategori['nama_kategori'] ?>">
                            <div class="invalid-feedback">
                                <?= $validation->getError('nama_kategori'); ?>
                            </div>
                        </div>


                    </div>








                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/kategori" class="btn btn-dark">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>