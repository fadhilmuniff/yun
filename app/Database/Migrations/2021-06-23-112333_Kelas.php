<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kelas extends Migration
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
			'nama_mentor'       => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'keterangan'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'harga' => [
				'type'           => 'INT',
				'constraint'     => 100
			],
			'link'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'materi'      => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'status'      => [
				'type'           => 'INT',
				'constraint'     => 1
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('kelas', TRUE);
	}

	public function down()
	{
		$this->forge->dropTable('kelas');
	}
}
