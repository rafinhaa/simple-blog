<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Users extends BaseController
{
	public function index()
	{
		helper(['modal','alert']);
		$usersModel  = new \App\Models\UsersModel();
        $data = [
			'titlepage' => 'Todos os posts',
			'users' => $usersModel->findAll(),
			'view' => 'admin/users/index',
			'css' => [
				'DataTables' => 'datatable/datatables.css',
				'Toastr' => 'toastr/toastr.min.css',
			],
			'scripts' => [
				'DataTables' => 'datatable/datatables.js',
				'DataTables Default' => 'datatable/default-datatable.js',
				'Toastr' => 'toastr/toastr.min.js',
			],
		];
		return view('admin/template', $data);
	}
	public function create(){
		helper('form');
		$data = [
			'titlepage' => 'Adicionar novo',
			'view' => 'admin/users/user',
		];
		echo view('admin/template', $data);
	}
}
