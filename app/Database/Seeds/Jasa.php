<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Jasa extends Seeder
{
	public function run()
	{
		$data = [

			[
				'nama_jasa' => 'Service ac',
				'jenis_jasa'  => 'babafix',
				'alamat' => 'bandung',
				'deskripsi' => 'membantu melakukan perbaikan ac rumahan dengan layanan terbaik, berkualitas, dan berpengalaman. ',
			],
			[
				'nama_jasa' => 'Cleaning service',
				'jenis_jasa'  => 'babaclean',
				'alamat' => 'surabaya',
				'deskripsi' => 'membersihkan ruangan, kamar mandi atau toilet, mengepel, menyapu, dan menghilangkan debu. penyedia jasa berpengalaman, jujur, & professional.',
			],



		];
		$this->db->table('jasa')->insertBatch($data);
	}
}
