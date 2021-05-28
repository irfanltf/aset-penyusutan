<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    <h4>Halaman Kategori</h4>
                </div>

                <div class="col-6 text-end">
                    <a href="/kategori/tambah" class="btn btn-sm btn-primary"> <i class="bi bi-file-diff"></i> Tambah Kategori</a>

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


            <table class="table table-striped table-bordered" id="kategori">
                <thead class="text-center">
                    <tr>
                        <th>No.</th>
                        <th>Kode Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($kategori as $key) : ?>
                        <tr>
                            <td><?= $i; ?></td>
                            <td>
                                <strong>
                                    <?= $key['kode_kategori']; ?></strong>
                            </td>
                            <td><?= $key['nama_kategori']; ?>
                            </td>

                            <td>
                                <a href="/kategori/hapus/<?= $key['id'] ?>" onClick="return confirm('hapus data?')" class="badge bg-danger"><i class="bi bi-trash-fill"></i></a>
                                <a href="/kategori/edit/<?= $key['id'] ?>" class="badge bg-success"><i class="bi bi-pencil-fill"></i></a>

                            </td>

                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>

    </div>
</div>




<script type="text/javascript">
    $(document).ready(function() {
        //datatables
        table = $('#kategori').DataTable({
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