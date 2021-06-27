<?php

namespace App\Controllers;

use App\Models\Jasa_model;

class Jasa extends BaseController
{
    protected $m_jasa;
    public function __construct()
    {
        $this->m_jasa = new Jasa_model();
        // $this->m_jasa = new m_jasa();
    }
    public function index()
    {
        $result = $this->m_jasa->findAll();
        $data = [
            'title' => 'Home',
            'result' => $result
        ];
        return view('jasa/home', $data);
    }
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Jasa',
        ];
        // tampilkan form create
        return view('jasa/tambah', $data);
    }
    public function edit($id)
    {
        $result = $this->m_jasa->where('id', $id)->first();
        $data = [
            'title' => 'Edit Jasa',
            'result' => $result,
        ];
        // tampilkan form create
        return view('jasa/edit', $data);
    }
    public function save()
    {
        $request = \Config\Services::request();
        $data = [
            "nama_jasa" => $request->getPost('nama_jasa'),
            "jenis_jasa" => $request->getPost('jenis_jasa'),
            "alamat" => $request->getPost('alamat'),
            "deskripsi" => $request->getPost('deskripsi'),
        ];
        $this->m_jasa->tambah($data);
        return redirect()->to(base_url('jasa'))->with('success', 'Tambah  ' . 'Berhasil');
    }

    public function delete_jasa($id)
    {
        $this->m_jasa->delete($id);
        return redirect()->to(base_url('jasa'))->with('success', 'Delete ' . 'Berhasil');
    }
    public function update()
    {
        $request = \Config\Services::request();
        $id =  $request->getPost('id');
        $data = [
            "nama_jasa" => $request->getPost('nama_jasa'),
            "jenis_jasa" => $request->getPost('jenis_jasa'),
            "alamat" => $request->getPost('alamat'),
            "deskripsi" => $request->getPost('deskripsi'),
        ];
        $this->m_jasa->jasa_edit($data, $id);
        return redirect()->to(base_url('jasa'))->with('success', 'Edit  ' . 'Berhasil');
    }
}
