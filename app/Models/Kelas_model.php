<?php

namespace App\Models;

use CodeIgniter\Model;

class Kelas_model extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    // protected $table      = 'news';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'nama_mentor', 'keterangan', 'harga', 'link', 'materi', 'status'];


    public function tambah_kelas($data)
    {
        $query = $this->db->table('kelas')->insert($data);
        return $query;
    }
    public function delete_kelas($id)
    {
        $query = $this->db->table('kelas')->delete(['id' => $id]);
        return $query;
    }
    public function edit_kelas($data, $id)
    {
        $query = $this->db->table('kelas')->update($data, (['id' => $id]));
        return $query;
    }
}
