<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Blog extends Migration
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
			'blog_name' => [
			'type' => 'TEXT',
		],
			'bio' => [
			'type' => 'LONGTEXT',
		],
			'social_twitter' => [
			'type' => 'TEXT',
		],
			'social_linkedin' => [
			'type' => 'TEXT',
		],
			'social_github' => [
			'type' => 'TEXT',
		],
			'social_stoverflow' => [
			'type' => 'TEXT',
		],
			'social_codepen' => [
			'type' => 'TEXT',
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
	$this->forge->createTable('blog_config',true);
	}

	public function down()
	{
		$this->forge->dropTable('blog_config');
	}
}
