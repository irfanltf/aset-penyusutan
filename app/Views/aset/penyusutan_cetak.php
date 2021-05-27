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

                                 
                        <table >
                            <tr>
                                <td colspan="2" class="center"><h3>Sistem Informasi Akuntansi Penyusutan Aktiva Tetap</h3>
                                </td>
                               
                            </tr> <tr>
                                <td colspan="2" class="center"><h2>Metode Garis Lurus </h2>
                                </td>
                              
                            </tr>
                          <tr>
                                <td>
                                </td>
                                <td>

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
                                <td>Umur
                                </td>
                                <td class="start-center">
                                    = <span class="text-primary"><?= $aset['masa_manfaat']; ?> Tahun</span>
                                </td>

                            </tr>                          <tr>
                                <td>
                                </td>
                                <td class="start-center">
                                   
                                </td>

                            </tr>

                        </table>

                        <table border="1" cellpadding="2" style="margin-top: 20px">
                            <tr class="center" >
                                <th><strong>Tahun</strong></th>
                                <th><strong>Nilai Buku Awal</strong></th>
                                <th><strong>Depresiasi Persen</strong></th>
                                <th><strong>Jumlah Penyusutan</strong></th>
                                <th><strong>Jumlah Akumulasi Penyusutan</strong></th>
                                <th><strong>Nilai Buku Akhir</strong></th>
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
                  </body>
</html>