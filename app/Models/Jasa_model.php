<?php

namespace App\Models;

use CodeIgniter\Model;

class Jasa_model extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;

    // protected $table      = 'news';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['id', 'nama_jasa', 'jenis_jasa', 'alamat', 'deskripsi'];


    public function tambah($data)
    {
        $query = $this->db->table('jasa')->insert($data);
        return $query;
    }
    public function delete_jasa($id)
    {
        $query = $this->db->table('jasa')->delete(['id' => $id]);
        return $query;
    }
    public function jasa_edit($data, $id)
    {
        $query = $this->db->table('jasa')->update($data, (['id' => $id]));
        return $query;
    }
}
