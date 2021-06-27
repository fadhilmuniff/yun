<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TbJasa extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 11,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'nama_jasa'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'jenis_jasa'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'alamat' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'deskripsi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			]

		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('jasa', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('jasa');
	}
}
