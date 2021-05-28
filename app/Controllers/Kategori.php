<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    protected $kategori;

    public function __construct()
    {

        if (!session()->has('username')) {
            header('location:/login');
            exit();
        }

        $this->kategori = new KategoriModel();
    }

    public function index()
    {


        $data = [
            'title' => 'Halaman Kategori',
            'kategori' => $this->kategori->findAll()
        ];


        return view('kategori/index', $data);
    }


    public function tambah()
    {

        $data['title'] =   'Halaman Kategori';
        $data['validation'] = \Config\Services::validation();
        return view('kategori/tambah', $data);
    }

    public function edit($id)
    {
        $data['title'] =   'Halaman Kategori';
        $data['validation'] = \Config\Services::validation();
        $data['kategori'] = $this->kategori->find($id);
        return view('kategori/edit', $data);
    }



    public function tambah_proses()
    {

        if (!$this->validate([
            'kode_kategori' => [
                'rules' => 'required|is_unique[aktiva_tetap_kategori.kode_kategori]|max_length[8]',
                'errors' => [
                    'required' => 'Kode Kategori Harus Diisi',
                    'is_unique' => 'Kode Kategori Sudah Ada',
                    'max_length' => 'Kode Terlalu Panjang'
                ]
            ],
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ]


        ])) {

            // dd($this->request->getVar('kode_kategori'));
            return redirect()->to('/kategori/tambah')->withInput();
        }


        $this->kategori->save([
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori'),

        ]);

        session()->setFlashdata('pesan', 'Berhasil menambahkan kategori!');
        return redirect()->to('/kategori');
    }


    public function update($id)
    {
        $kat = $this->kategori->where(['id' => $id])->first();


        if ($kat['kode_kategori'] == $this->request->getVar('kode_kategori')) {

            $rule_kode = 'required|max_length[8]';
        } else {
            $rule_kode = 'required|is_unique[aktiva_tetap_kategori.kode_kategori]|max_length[8]';
        }

        if (!$this->validate([
            'kode_kategori' => [
                'rules' => $rule_kode,
                'errors' => [
                    'required' => 'Kode Kategori Harus Diisi',
                    'is_unique' => 'Kode Kategori Sudah Ada',
                    'max_length' => 'Kode Terlalu Panjang'
                ]
            ],
            'nama_kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama Harus Diisi'
                ]
            ]


        ])) {

            return redirect()->to('/kategori/edit/' . $id)->withInput();
        }
        $this->kategori->save([
            'id' => $id,
            'kode_kategori' => $this->request->getVar('kode_kategori'),
            'nama_kategori' => $this->request->getVar('nama_kategori'),

        ]);

        session()->setFlashdata('pesan', 'Berhasil mengubah kategori!');
        return redirect()->to('/kategori');
    }

    public function hapus($id)
    {

        $kategori = $this->kategori->find($id);

        $this->kategori->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/kategori');
    }
}
