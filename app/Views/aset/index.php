<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4>Halaman Aset</h4>
                </div>

                <div class="col-6 text-end">
                    <a href="/aset/tambah" class="btn btn-sm btn-primary"> <i class="bi bi-file-diff"></i> Tambah Aktiva Tetap</a>

                </div>

                <div class="col-12">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-success mt-4" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </div>
        <div class="card-body">


            <table class="table table-striped table-bordered" id="aset">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Aktiva</th>


                        <th>Tanggal <br> Pembelian</th>
                        <th>Umur</th>
                        <th>Nilai <br>Residu</th>
                        <th>Ket.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($aset as $key) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <strong>Kode :</strong>
                                <?= $key['kode_aktiva']; ?><br>
                                <strong> Nama : </strong> <?= $key['nama_aktiva']; ?><br>
                                <strong>Harga Perolehan : </strong><?= $key['harga_peroleh']; ?>
                            </td>


                            <td><?= $key['tgl_pembelian']; ?></td>
                            <td><?= $key['masa_manfaat']; ?> tahun</td>
                            <td><?= $key['nilai_residu']; ?></td>
                            <td><?= $key['jumlah_satuan']; ?> <?= $key['satuan']; ?>


                            </td>

                            <td>
                                <a href="/aset/hapus/<?= $key['id'] ?>" onClick="return confirm('hapus data?')" class="badge bg-danger"><i class="bi bi-trash-fill"></i></a>
                                <a href="/aset/edit/<?= $key['id'] ?>" class="badge bg-success"><i class="bi bi-pencil-fill"></i></a>
                                <a href="/aset/penyusutan/<?= $key['id'] ?>" class="badge bg-dark"> <i class="bi bi-calculator"></i></a>
                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
        //datatables
        table = $('#aset').DataTable({
            "language": {
                "paginate": {
                    "previous": "<",
                    "next": ">"
                }
            }
        });
    });
</script>

<?= $this->endSection(); ?>