<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Aset</h4>
        </div>
        <div class="card-body">
            <form action="/aset/update/<?= $aset['id'] ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-6">
                <div class="mb-3">
                    <label for="kode_akiva" class="form-label">Kode Akiva</label>
                    <input type="text" name="kode_aktiva" class="form-control <?= ($validation->hasError('kode_aktiva')) ? 'is-invalid' : '' ?>" id="kode_akiva" aria-describedby="emailHelp" value="<?= (old('kode_aktiva')) ? old('kode_aktiva') : $aset['kode_aktiva'] ?>">
         <div  class="invalid-feedback">
                 <?= $validation->getError('nama_aktiva'); ?>
                    </div>
                </div>
                        </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="nama_aktiva" class="form-label">Nama Aktiva</label>
                    <input type="text" name="nama_aktiva" class="form-control <?= ($validation->hasError('nama_aktiva')) ? 'is-invalid' : '' ?>" id="nama_aktiva" value="<?= (old('nama_aktiva')) ? old('nama_aktiva') : $aset['nama_aktiva'] ?>">
                <div  class="invalid-feedback">
                 <?= $validation->getError('nama_aktiva'); ?>
                    </div>
                </div>

                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="Perolehan" class="form-label">Harga Perolehan</label>
                    <input type="number" min="0" max="999999999999" name="harga_peroleh" class="form-control <?= ($validation->hasError('harga_peroleh')) ? 'is-invalid' : '' ?>" id="Perolehan" value="<?= (old('harga_peroleh')) ? old('harga_peroleh') : $aset['harga_peroleh'] ?>">
                    <div  class="invalid-feedback">
                 <?= $validation->getError('harga_peroleh'); ?>
                    </div>
                </div>
                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="tgl_pembelian" class="form-label">Tanggal Pembelian</label>
                    <input type="date" name="tgl_pembelian" class="form-control <?= ($validation->hasError('tgl_pembelian')) ? 'is-invalid' : '' ?>" id="tgl_pembelian" value="<?= (old('tgl_pembelian')) ? old('tgl_pembelian') : $aset['tgl_pembelian'] ?>">
                        <div  class="invalid-feedback">
                 <?= $validation->getError('tgl_pembelian'); ?>
                    </div>
                </div>
                        
                    </div>

                    <div class="col-6">
                <div class="mb-3">
                    <label for="masa_manfaat" class="form-label">Umur <small>(konteks tahun)</small></label>
                    <input type="number" min="1" max="999" name="masa_manfaat" class="form-control <?= ($validation->hasError('masa_manfaat')) ? 'is-invalid' : '' ?>" id="masa_manfaat" value="<?= (old('masa_manfaat')) ? old('masa_manfaat') : $aset['masa_manfaat'] ?>">
                    <div  class="invalid-feedback">
                 <?= $validation->getError('masa_manfaat'); ?>
                    </div>
                </div>
                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="nilai_residu" class="form-label">Nilai Residu</label>
                    <input type="text" name="nilai_residu" class="form-control <?= ($validation->hasError('nilai_residu')) ? 'is-invalid' : '' ?>" id="nilai_residu" value="<?= (old('nilai_residu')) ? old('nilai_residu') : $aset['nilai_residu'] ?>">
                                   <div  class="invalid-feedback">
                 <?= $validation->getError('nilai_residu'); ?>
                    </div>
                </div>
                        
                    </div>

                     <div class="col-6">
                <div class="mb-3">
                    <label for="satuan" class="form-label">Satuan </label>
                    <input type="text" name="satuan" class="form-control <?= ($validation->hasError('satuan')) ? 'is-invalid' : '' ?>"  id="satuan" value="<?= (old('satuan')) ? old('satuan') : $aset['satuan'] ?>" placeholder="contoh : unit, buah">
                                   <div  class="invalid-feedback">
                 <?= $validation->getError('satuan'); ?>
                    </div>
                </div>
                        
                    </div>
                    <div class="col-6">
                <div class="mb-3">
                    <label for="jumlah_satuan" class="form-label">Jumlah Satuan</label>
                    <input type="number" min="1" max="999"  name="jumlah_satuan" class="form-control <?= ($validation->hasError('jumlah_satuan')) ? 'is-invalid' : '' ?>"  id="jumlah_satuan"value="<?= (old('jumlah_satuan')) ? old('jumlah_satuan') : $aset['jumlah_satuan'] ?>">
                                   <div  class="invalid-feedback">
                 <?= $validation->getError('jumlah_satuan'); ?>
                    </div>
                </div>
                        
                    </div>
                </div>


                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/aset" class="btn btn-dark">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>