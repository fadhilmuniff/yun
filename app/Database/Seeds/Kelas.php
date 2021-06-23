<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Kelas extends Seeder
{
	public function run()
	{
		$data = [
			[
				'nama_mentor' => 'Ardhika Seeder',
				'keterangan'  => 'ini keterangan dummy',
				'harga' => 20000,
				'link' => 'bit.ly/seeder',
				'materi' => 'seeder.pdf',
				'status' => 1,
			],
			[
				'nama_mentor' => 'Eri Seeder',
				'keterangan'  => 'ini keterangan dummy',
				'harga' => 30000,
				'link' => 'bit.ly/seeder',
				'materi' => 'seeder.pdf',
				'status' => 1,
			],


		];
		$this->db->table('kelas')->insertBatch($data);

		// foreach ($produk_data as $data) {
		// 	// insert semua data ke tabel
		// }
	}
}
