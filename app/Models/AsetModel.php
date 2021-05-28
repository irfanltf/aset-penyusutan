<?php

namespace App\Models;

use CodeIgniter\Model;

class AsetModel extends Model
{

	protected $table = 'aktiva_tetap';
	protected $allowedFields = ['kode_aktiva', 'kode_kategori', 'nama_aktiva', 'harga_peroleh', 'tgl_pembelian', 'masa_manfaat', 'nilai_residu', 'satuan', 'jumlah_satuan'];



	public function dataAset()
	{
		$builder = $this->db->table('aktiva_tetap');
		$builder->join('aktiva_tetap_kategori', 'aktiva_tetap_kategori.kode_kategori=aktiva_tetap.kode_kategori');;
		$builder->select('aktiva_tetap.id, aktiva_tetap.kode_kategori,aktiva_tetap_kategori.nama_kategori, kode_aktiva, nama_aktiva, harga_peroleh, tgl_pembelian, masa_manfaat, nilai_residu,satuan,jumlah_satuan');
		return  $builder->get()->getResultArray();
	}
	public function dataAsetById($id)
	{
		$builder = $this->db->table('aktiva_tetap');
		$builder->join('aktiva_tetap_kategori', 'aktiva_tetap_kategori.kode_kategori=aktiva_tetap.kode_kategori');
		$builder->select('aktiva_tetap.id, aktiva_tetap.kode_kategori,aktiva_tetap_kategori.nama_kategori, kode_aktiva, nama_aktiva, harga_peroleh, tgl_pembelian, masa_manfaat, nilai_residu,satuan,jumlah_satuan');
		$builder->where('aktiva_tetap.id', $id);
		return  $builder->get()->getRowArray();
	}
}
