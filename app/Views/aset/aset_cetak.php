<!DOCTYPE html>
<html>

<head>
    <title>Halaman Penyusutan</title>
    <style type="text/css">
        .center {
            text-align: center;
            vertical-align: middle;

        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td style="text-align:center">
                <h3>Sistem Informasi Akuntansi Penyusutan Aktiva Tetap</h3>
            </td>

        </tr>
        <tr>
            <td style="text-align:center">
                <h3>Metode Garis Lurus </h3>
            </td>

        </tr>
        <tr>
            <td colspan=" 2" class="center">

            </td>

        </tr>
    </table>
    <table border="1" cellpadding="2" style="margin-top: 20px">
        <thead>
            <tr class="center">
                <th>No.</th>
                <th>Kode</th>
                <th>Nama Aktiva Tetap</th>
                <th>Harga Perolehan</th>
                <th>Kategori</th>
                <th>Tanggal <br> Pembelian</th>
                <th>Umur</th>
                <th>Nilai <br>Residu</th>
                <th>Ket.</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($aset as $key) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $key['kode_aktiva']; ?></td>
                    <td><?= $key['nama_aktiva']; ?></td>
                    <td><?= $key['harga_peroleh']; ?></td>
                    <td><?= $key['nama_kategori']; ?></td>
                    <td><?= $key['tgl_pembelian']; ?></td>
                    <td><?= $key['masa_manfaat']; ?> tahun</td>
                    <td><?= $key['nilai_residu']; ?></td>
                    <td><?= $key['jumlah_satuan']; ?> <?= $key['satuan']; ?>


                    </td>



                </tr>
                <?php $i++; ?>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>