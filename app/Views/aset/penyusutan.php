<?= $this->extend('templates/templates'); ?>




<?= $this->section('content') ?>

<?php

$bulan = date("n", strtotime($aset['tgl_pembelian']));

switch ($bulan) {
    case '1':
        $value = 12;
        break;
    case '2':
        $value = 11;
        break;
    case '3':
        $value = 10;
        break;
    case '4':
        $value = 9;
        break;
    case '5':
        $value = 8;
        break;
    case '6':
        $value = 7;
        break;
    case '7':
        $value = 6;
        break;
    case '8':
        $value = 5;
        break;
    case '9':
        $value = 4;
        break;
    case '10':
        $value = 3;
        break;
    case '11':
        $value = 2;
        break;
    case '12':
        $value = 1;
        break;
    default:
        $value = 12;
        break;
}

?>
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h4>Halaman Aset</h4>
        </div>
        <div class="card-body">
            <form action="/aset/penyusutan_process/<?= $aset['id'] ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped">
                            <tr>
                                <td>
                                    <strong> Metode Garis Lurus </strong>
                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Penyusutan
                                </td>
                                <td>
                                    = <span class="text-danger">Presentase Penyusutan</span> x [(<span class="text-warning">Nilai Perolehan</span> - <span class="text-info">Nilai Sisa</span> )] : <span class="text-success">Umur</span>
                                </td>

                            </tr>
                            <tr>
                                <td>Kode Akiva tetap</td>
                                <td>
                                    = <span class="text-primary"><?= $aset['kode_aktiva'] ?></span>
                                </td>

                            </tr>
                            <tr>
                                <td>Nama Akiva tetap</td>
                                <td>
                                    = <span class="text-primary"><?= $aset['nama_aktiva'] ?></span>
                                </td>

                            </tr>
                            <tr>
                                <td>Harga Perolehan</td>
                                <td>
                                    = <span class="text-primary"><?= $aset['harga_peroleh'] ?></span>
                                </td>

                            </tr>
                            <tr>
                                <td>Nilai Sisa/Residu</td>
                                <td>
                                    = <span class="text-primary"><?= $aset['nilai_residu'] ?></span>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    Umur
                                </td>
                                <td class="start-center">
                                    = <span class="text-primary"><?= $aset['masa_manfaat']; ?> Tahun</span>
                                </td>

                            </tr>

                        </table>

                        <table class="table table-bordered">
                            <tr>
                                <td>Tahun</td>
                                <td>Nilai Buku Awal</td>
                                <td>Depresiasi Persen</td>
                                <td>Jumlah Penyusutan</td>
                                <td>Jumlah Akumulasi Penyusutan</td>
                                <td>Nilai Buku Akhir</td>
                            </tr>
                            <?php

                            $penyusutan = $value / 12 * ($aset['harga_peroleh'] - $aset['nilai_residu']) / $aset['masa_manfaat'];
                            $penyusutan_full = 12 / 12 * ($aset['harga_peroleh'] - $aset['nilai_residu']) / $aset['masa_manfaat'];
                            $penyusutan_end = (12 - $value) / 12 * ($aset['harga_peroleh'] - $aset['nilai_residu']) / $aset['masa_manfaat'];
                            $nb_awal = $aset['harga_peroleh'];
                            $akumulasi = $penyusutan;




                            if (date("n", strtotime($aset['tgl_pembelian'])) == 1) {
                                $umur =  $aset['masa_manfaat'] - 1;
                            } else {
                                $umur = $aset['masa_manfaat'];
                            }
                            for ($i = 0; $i <= $umur; $i++) : ?>
                                <?php


                                $p = $i == 0 ? $penyusutan : $penyusutan_full;

                                if ($i == 0) {
                                    $penyusutan;
                                } else if ($i == $umur) {
                                    $penyusutan_end;
                                } else {
                                    $penyusutan_full;
                                }

                                if ($i == 0) {
                                    $persen = $penyusutan / $aset['harga_peroleh'] * 100;
                                } else if ($i == $umur && date("n", strtotime($aset['tgl_pembelian'])) == 1) {
                                    $persen = $penyusutan_full / $aset['harga_peroleh'] * 100;
                                } else if ($i == $umur) {
                                    $persen = $penyusutan_end / $aset['harga_peroleh'] * 100;
                                } else {
                                    $persen = $penyusutan_full / $aset['harga_peroleh'] * 100;
                                }





                                ?>
                                <tr>


                                    <td><?= date("Y", strtotime($aset['tgl_pembelian'])) + $i ?></td>


                                    <td>Rp. <?= number_format($nb_awal, 0, ',', '.') ?></td>
                                    <td>

                                        <?= number_format($persen, 0, '.', '') ?>%

                                    </td>
                                    <td>Rp.<?= number_format($p, 0, ',', '.') ?></td>
                                    <td>Rp.<?= number_format($akumulasi, 0, ',', '.') ?></td>
                                    <td>Rp.<?= number_format($nb_awal - $p, 0, ',', '.') ?></td>
                                </tr>


                            <?php

                                $akumulasi = $akumulasi + $p;
                                $nb_awal = $nb_awal - $p;

                            endfor; ?>
                        </table>
                    </div>


                </div>


                <a href="/cetak" class="btn btn-warning">Cetak</a>
                <a href="/aset" class="btn btn-dark">Batal</a>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>