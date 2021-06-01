<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class About extends Migration
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
			'title_page' => [
			'type' => 'LONGTEXT',			
			'default' => null,			
		],		
			'about' => [
			'type' => 'LONGTEXT',			
			'default' => null,			
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
	$this->forge->createTable('about',true);
	}

	public function down()
	{
		$this->forge->dropTable('about');
	}
}
