<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
				'photo_post'     => [
				'type'           => 'TEXT',
				'default'           => null,
				],			
				'views'     => [
				'type'           => 'DECIMAL(10,0)',
				'default'           => 0,
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
		$this->forge->createTable('posts',true);
	}

	public function down()
	{
		$this->forge->dropTable('posts');
	}
}
