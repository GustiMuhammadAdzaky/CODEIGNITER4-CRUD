<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }

    public function index()
    {
        // $komik = $this->komikModel->findAll();
        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        // dd($this->komikModel->find([1, 2, 3]));


        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' Tidak Ditemukan');
        }


        return view('komik/detail', $data);
    }

    public function create()
    {
        // session();
        $data = [
            'title' => 'Form Tambah data komik',
            'validation' => \Config\Services::validation()
        ];


        return view('komik/create', $data);
    }

    public function save()
    {

        // dd($this->request->getVar());
        // Validasi input
        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]',



            'sampul' => [
                // Menentukan Ukuran Size
                'rules' => 'uploaded[sampul]|max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih Gambar Sampul Terlebih Dahulu',
                    'max_size' => 'Ukuran Gambar Terlalu Besar',
                    'is_image' => 'Yang Anda Pilih Bukan Gambar',
                    'mime_in' => 'Yang Anda Pilih Bukan Gambar'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // $uri = $this->request->getUri('sampul');

        $fileSampul = $this->request->getFile('sampul');
        
        $fileSampul->move('img');

        $namaSampul = $fileSampul->getName();

        
        

        // dd($namaSampul);

        // $namaSampul = $fileSampul->getName();

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di tambahkan !');

        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        $this->komikModel->delete($id);
        return redirect()->to('/komik');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah data komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];


        return view('komik/edit', $data);
    }


    public function update($id)
    {
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
        if ($komikLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[komik.judul]';
        }


        if (!$this->validate([
            'judul' => $rule_judul,
        ])) {
            $validation = \Config\Services::validation();
            // dd($validation);
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Data berhasil di ubah !');

        return redirect()->to('/komik');
    }
}