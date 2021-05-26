<?php 

namespace App\Models;
use CodeIgniter\Model;

class AsetModel extends Model{

	protected $table = 'aktiva_tetap';
	protected $allowedFields = ['kode_aktiva', 'nama_aktiva', 'harga_peroleh', 'tgl_pembelian', 'masa_manfaat', 'nilai_residu', 'satuan', 'jumlah_satuan'];


	


}



 ?>