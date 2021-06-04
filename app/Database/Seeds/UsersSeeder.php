<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use \CodeIgniter\I18n\Time;

class UsersSeeder extends Seeder
{
	public function run()
	{
		$data = [
			'name' => 'admin',
			'email'    => 'admin@admin.com',
			'password'    => '$2y$10$rW4X4PlKVry43eTF.iefaOsLkpgxXN1g0iZmH6L5k7KEak9Ql7m8C',
			'created_at'  => Time::now(),
			'updated_at'  => Time::now()
		];
		// Using Query Builder
		$this->db->table('users')->insert($data);
	}
}