<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class News extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id'                => [
				'type'           => 'INT',
				'constraint' => 11,
				'unsigned'  => true,
				'auto_increment' => true,
			],
			'title'         => [
				'type'           => 'VARCHAR',
				'constraint'     => '255',
			],
			'slug'     => [
				'type'             => 'VARCHAR',
				'constraint'   => '255',
			],
			'body'     => [
				'type'             => 'LONGTEXT',
			],
			'created_at'  => [
				'type'	      => 'DATETIME',
				'null'	      => true,
			],
			'updated_at' 	=> [
				'type'	     => 'DATETIME',
				'null'	     => true,
			],
			'deleted_at' 	=> [
				'type'	     => 'DATETIME',
				'null'	     => true,
			]
		]);
		$this->forge->addKey('id', true);
		$this->forge->createTable('posts');
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
