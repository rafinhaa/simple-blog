<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id' => [
			'type' => 'INT',
			'constraint' => 11,
			'unsigned' => true,
			'auto_increment' => true,
		],
			'name' => [
			'type' => 'TEXT',
		],
			'email' => [
			'type' => 'TEXT',
		],
			'password' => [
			'type' => 'TEXT',
		],		
			'profile_img' => [
			'type' => 'TEXT',
			'default' => null,
			'null' => true,
		],
			'created_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
			'updated_at' => [
			'type' => 'DATETIME',
			'null' => true,
		],
			'deleted_at' => [
			'type' => 'DATETIME',
			'null' => true,
		]
	]);
	$this->forge->addKey('id', true);
	$this->forge->createTable('users',true);
	}

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
