<?php

namespace App\Controllers;

use App\Models\Kelas_model;

class Kelas extends BaseController
{
    protected $kelas_model;
    public function __construct()
    {
        $this->kelas_model = new Kelas_model();
        // $this->kelas_model = new kelas_model();
    }
    public function index()
    {
        $kelas = $this->kelas_model->findAll();
        $data = [
            'title' => 'Home',
            'kelas' => $kelas
        ];
        // var_dump($produk);
        return view('pages/home', $data);
    }
    public function tambahKelas()
    {
        $data = [
            'title' => 'Tambah Kelas',
        ];
        // tampilkan form create
        return view('pages/tambah_kelas', $data);
    }
    public function editKelas($id)
    {
        $kelas = $this->kelas_model->where('id', $id)->first();
        $data = [
            'title' => 'Edit Kelas',
            'kelas' => $kelas,
        ];
        // tampilkan form create
        return view('pages/edit_kelas', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();
        $dataBerkas = $request->getFile('materi');
        $fileName = $dataBerkas->getRandomName();
        $data = [
            "nama_mentor" => $request->getPost('nama_mentor'),
            "keterangan" => $request->getPost('keterangan'),
            "harga" => $request->getPost('harga'),
            "link" => $request->getPost('link'),
            "materi" => $fileName,
            "status" => 1
        ];
        // dd($data);
        $this->kelas_model->tambah_kelas($data);
        $dataBerkas->move('uploads/materi/', $fileName);
        return redirect()->to(base_url('kelas'))->with('success', 'Tambah Kelas ' . 'berhasil');
        // return redirect()->to('pages');
        // var_dump($data);
    }

    public function delete($id)
    {
        $this->kelas_model->delete_kelas($id);
        return redirect()->to(base_url('kelas'))->with('success', 'Delete Kelas ' . 'berhasil');
    }
    public function edit()
    {
        $request = \Config\Services::request();
        $id =  $request->getPost('id');
        if ($_FILES['materi']['name']) {
            // dd('pilih gambar nih');
            $dataBerkas = $request->getFile('materi');
            $fileName = $dataBerkas->getRandomName();
            $data = [
                "nama_mentor" => $request->getPost('nama_mentor'),
                "keterangan" => $request->getPost('keterangan'),
                "harga" => $request->getPost('harga'),
                "link" => $request->getPost('link'),
                "materi" => $fileName,
                "status" => $request->getPost('status')
            ];
            $this->kelas_model->edit_kelas($data, $id);
            $dataBerkas->move('uploads/materi/', $fileName);
            return redirect()->to(base_url('kelas'))->with('success', 'Ubah Kelas ' . 'berhasil');
        } else {
            $data = [
                "nama_mentor" => $request->getPost('nama_mentor'),
                "keterangan" => $request->getPost('keterangan'),
                "harga" => $request->getPost('harga'),
                "link" => $request->getPost('link'),
                "status" => $request->getPost('status')
            ];
            $this->kelas_model->edit_kelas($data, $id);
            return redirect()->to(base_url('kelas'))->with('success', 'Ubah Kelas ' . 'berhasil');
        }
    }
}
