<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Login extends BaseController
{
	public function index()
	{
		helper(['modal','alert']);
		$usersModel  = new \App\Models\UsersModel();
        $data = [
			'titlepage' => 'Login',
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
		return view('admin/login', $data);
	}
	
}
