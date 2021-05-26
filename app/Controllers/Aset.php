<?php

namespace App\Controllers;
use App\Models\AsetModel;


class Aset extends BaseController
{
	protected $aset;

	public function __construct(){
		$this->aset = new AsetModel();
	}

    public function index()
    {

    	$data = [
    		'aset' => $this->aset->findAll()
    	];


        return view('aset/index', $data);
    }


    public function tambah(){
	
	$data['validation'] = \Config\Services::validation();
    	return view('aset/tambah', $data);
    }

     public function edit($id){
	
	$data['validation'] = \Config\Services::validation();
	$data['aset'] = $this->aset->find($id);
    	return view('aset/edit', $data);
    }

    public function penyusutan($id){
	
	$data['validation'] = \Config\Services::validation();
	$data['aset'] = $this->aset->find($id);
    	return view('aset/penyusutan', $data);
    }

    public function tambah_proses(){

    	if (!$this->validate([
			'kode_aktiva' => [
				'rules'=> 'required|is_unique[aktiva_tetap.kode_aktiva]|max_length[8]',
				'errors' => [
					'required' => 'Kode Aktiva Harus Diisi',
					'is_unique' => 'Kode Aktiva Sudah Ada',
					'max_length' => 'Kode Terlalu Panjang'
				]
			],
			'nama_aktiva' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama Harus Diisi'
				]
			],
			'harga_peroleh' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Harus Diisi'
				]
			],
			'tgl_pembelian' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Pembelian Harus Diisi'
				]
			],
			'masa_manfaat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Umur Harus Diisi'
				]
			],
			'nilai_residu' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nilai Residu Harus Diisi'
				]
			],
			'satuan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom Satuan Harus Diisi'
				]
			],
			'jumlah_satuan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom Jumlah Satuan Harus Diisi'
				]
			]


		])) {
			
			return redirect()->to('/aset/tambah')->withInput();
		}

		$this->aset->save([
			'kode_aktiva' => $this->request->getVar('kode_aktiva'),
			'nama_aktiva' => $this->request->getVar('nama_aktiva'),
			'harga_peroleh' => $this->request->getVar('harga_peroleh'),
			'tgl_pembelian' => $this->request->getVar('tgl_pembelian'),
			'masa_manfaat' => $this->request->getVar('masa_manfaat'),
			'nilai_residu' => $this->request->getVar('nilai_residu'),
			'satuan' => $this->request->getVar('satuan'),
			'jumlah_satuan' => $this->request->getVar('jumlah_satuan')
		]);

		session()->setFlashdata('pesan', 'Berhasil menambahkan Aset!');
		return redirect()->to('/aset');


    }


    public function update($id){





    	if (!$this->validate([
			'kode_aktiva' => [
				'rules'=> 'required|is_unique[aktiva_tetap.kode_aktiva]|max_length[8]',
				'errors' => [
					'required' => 'Kode Aktiva Harus Diisi',
					'is_unique' => 'Kode Aktiva Sudah Ada',
					'max_length' => 'Kode Terlalu Panjang'
				]
			],
			'nama_aktiva' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nama Harus Diisi'
				]
			],
			'harga_peroleh' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Harga Harus Diisi'
				]
			],
			'tgl_pembelian' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Tanggal Pembelian Harus Diisi'
				]
			],
			'masa_manfaat' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Umur Harus Diisi'
				]
			],
			'nilai_residu' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Nilai Residu Harus Diisi'
				]
			],
			'satuan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom Satuan Harus Diisi'
				]
			],
			'jumlah_satuan' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kolom Jumlah Satuan Harus Diisi'
				]
			]


		])) {
			
			return redirect()->to('/aset/edit')->withInput();
		}

		$this->aset->save([
			'id' => $id,
			'kode_aktiva' => $this->request->getVar('kode_aktiva'),
			'nama_aktiva' => $this->request->getVar('nama_aktiva'),
			'harga_peroleh' => $this->request->getVar('harga_peroleh'),
			'tgl_pembelian' => $this->request->getVar('tgl_pembelian'),
			'masa_manfaat' => $this->request->getVar('masa_manfaat'),
			'nilai_residu' => $this->request->getVar('nilai_residu'),
			'satuan' => $this->request->getVar('satuan'),
			'jumlah_satuan' => $this->request->getVar('jumlah_satuan')
		]);

		session()->setFlashdata('pesan', 'Berhasil mengubah Aset!');
		return redirect()->to('/aset');


    }

    public function hapus($id){

    	$aset = $this->aset->find($id);

    	$this->aset->delete($id);
    	session()->setFlashdata('pesan', 'Data berhasil disimpan');
    	return redirect()->to('/aset');



    }






}
