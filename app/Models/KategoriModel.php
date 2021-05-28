<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{

    protected $table = 'aktiva_tetap_kategori';
    protected $allowedFields = ['kode_kategori', 'nama_kategori'];
}
