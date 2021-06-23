<?php

namespace App\Controllers;

use App\Models\Produk_model;

class Pages extends BaseController
{
    protected $produk_model;
    public function __construct()
    {
        $this->produk_model = new Produk_model();
    }
    public function index()
    {
        $produk = $this->produk_model->findAll();
        $data = [
            'title' => 'Home',
            'produk' => $produk
        ];
        // var_dump($produk);
        return view('pages/home', $data);
    }
    public function tambahProduk()
    {
        $data = [
            'title' => 'Tambah Produk',
        ];
        // tampilkan form create
        return view('pages/tambah_produk', $data);
    }
    public function editProduk($id)
    {
        $produk = $this->produk_model->where('id', $id)->first();
        $data = [
            'title' => 'Edit Produk',
            'produk' => $produk,
        ];
        // tampilkan form create
        return view('pages/edit_produk', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();
        $dataBerkas = $request->getFile('gambar');
        $fileName = $dataBerkas->getRandomName();
        $data = [
            "nama" => $request->getPost('nama'),
            "deskripsi" => $request->getPost('deskripsi'),
            "harga" => $request->getPost('harga'),
            "gambar" => $fileName,
            "status" => 1
        ];
        // dd($data);
        $this->produk_model->tambah_produk($data);
        $dataBerkas->move('uploads/produk/', $fileName);
        return redirect()->to(base_url('pages'))->with('success', 'Tambah Produk ' . 'success');
        // return redirect()->to('pages');
        // var_dump($data);
    }

    public function delete($id)
    {
        $this->produk_model->delete_produk($id);
        return redirect()->to(base_url('pages'))->with('success', 'Tambah Produk ' . 'success');
    }
    public function edit()
    {


        $request = \Config\Services::request();
        if (!$this->validate([
            'gambar' => [
                'rules' => 'is_image[gambar]',
                'errors' => [
                    'is_image' => 'File harus berupa jpg/jpeg/png'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            echo "<pre>";
            var_dump($request->getVar());
            echo "</pre>";
        }
        $id =  $request->getPost('id');
        if ($_FILES['gambar']['name']) {
            // dd('pilih gambar nih');
            $dataBerkas = $request->getFile('gambar');
            $fileName = $dataBerkas->getRandomName();
            $data = [
                "nama" => $request->getPost('nama'),
                "deskripsi" => $request->getPost('deskripsi'),
                "harga" => $request->getPost('harga'),
                "gambar" => $fileName,
                "status" => $request->getPost('status')
            ];
            $this->produk_model->edit_produk($data, $id);
            $dataBerkas->move('uploads/produk/', $fileName);
            return redirect()->to(base_url('pages'))->with('success', 'Ubah Produk ' . 'success');
            dd($data);
        } else {
            // dd('ga pilih gambar nih');
            $data = [
                "nama" => $request->getPost('nama'),
                "deskripsi" => $request->getPost('deskripsi'),
                "harga" => $request->getPost('harga'),
                "status" => $request->getPost('status')
            ];
            $this->produk_model->edit_produk($data, $id);
            return redirect()->to(base_url('pages'))->with('success', 'Ubah Produk ' . 'success');
        }
    }
}
