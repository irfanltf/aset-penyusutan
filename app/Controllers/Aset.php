<?php

namespace App\Controllers;

use App\Models\AsetModel;
use App\Models\KategoriModel;
use TCPDF;


class Aset extends BaseController
{
	protected $aset;
	protected $kategori;

	public function __construct()
	{

		if (!session()->has('username')) {
			header('location:/login');
			exit();
		}

		$this->aset = new AsetModel();
		$this->kategori = new KategoriModel();
	}

	public function index()
	{


		$data = [
			'title' => 'Halaman aset',
			'aset' => $this->aset->dataAset()
		];


		return view('aset/index', $data);
	}


	public function tambah()
	{
		$data['kategori'] = $this->kategori->findAll();
		$data['title'] =   'Halaman Tambah Data Aset';
		$data['validation'] = \Config\Services::validation();
		return view('aset/tambah', $data);
	}

	public function edit($id)
	{
		// dd($this->aset->dataAsetById($id));
		$data['kategori'] = $this->kategori->findAll();
		$data['aset'] = $this->aset->dataAsetById($id);
		$data['title'] =   'Halaman Edit Data Aset';
		$data['validation'] = \Config\Services::validation();
		return view('aset/edit', $data);
	}

	public function penyusutan($id)
	{

		$data['title'] =   'Halaman Hitung Penyusutan Aset';

		$data['aset'] = $this->aset->find($id);
		return view('aset/penyusutan', $data);
	}

	public function tambah_proses()
	{

		if (!$this->validate([
			'kode_aktiva' => [
				'rules' => 'required|is_unique[aktiva_tetap.kode_aktiva]|max_length[8]',
				'errors' => [
					'required' => 'Kode Aktiva Harus Diisi',
					'is_unique' => 'Kode Aktiva Sudah Ada',
					'max_length' => 'Kode Terlalu Panjang'
				]
			],
			'kode_kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kode Tidak Boleh Kosong!'
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
			'kode_kategori' => $this->request->getVar('kode_kategori'),
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


	public function update($id)
	{
		$aset = $this->aset->where(['id' => $id])->first();

		if ($aset['kode_aktiva'] == $this->request->getVar('kode_aktiva')) {

			$rule_kode = 'required|max_length[8]';
		} else {
			$rule_kode = 'required|is_unique[aktiva_tetap.kode_aktiva]|max_length[8]';
		}


		if (!$this->validate([
			'kode_aktiva' => [
				'rules' => $rule_kode,
				'errors' => [
					'required' => 'Kode Aktiva Harus Diisi',
					'is_unique' => 'Kode Aktiva Sudah Ada',
					'max_length' => 'Kode Terlalu Panjang'
				]
			],
			'kode_kategori' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Kode Tidak Boleh Kosong!'
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



			return redirect()->to('/aset/edit/' . $id)->withInput();
		}




		$this->aset->save([
			'id' => $id,
			'kode_aktiva' => $this->request->getVar('kode_aktiva'),
			'kode_kategori' => $this->request->getVar('kode_kategori'),
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

	public function hapus($id)
	{

		$aset = $this->aset->find($id);

		$this->aset->delete($id);
		session()->setFlashdata('pesan', 'Data berhasil dihapus');
		return redirect()->to('/aset');
	}

	public function cetak($id)
	{

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);

		$pdf->SetTitle('Halaman Penyusutan');
		$pdf->SetSubject('Halaman Penyusutan');


		$pdf->AddPage();
		$data['aset'] = $this->aset->find($id);
		$data['request'] = \Config\Services::request();

		$text = view('aset/penyusutan_cetak', $data);
		$pdf->writeHTML($text, true, 0, true, 0);
		$this->response->setContentType('application/pdf');
		$pdf->Output('Perhitungan Penyusutan.pdf', 'i');
	}
	public function cetak_aset()
	{

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		// set document information
		$pdf->SetCreator(PDF_CREATOR);

		$pdf->SetTitle('Halaman Penyusutan');
		$pdf->SetSubject('Halaman Penyusutan');


		$pdf->AddPage('L', 'A4');
		$data['aset'] = $this->aset->dataAset();


		$text = view('aset/aset_cetak', $data);
		$pdf->writeHTML($text, true, 0, true, 0);
		$this->response->setContentType('application/pdf');
		$pdf->Output('Data Aset.pdf', 'i');
	}
}
