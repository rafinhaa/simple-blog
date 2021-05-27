<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
	public function index()
	{
		$data = [
			'titlepage' => 'Dashboard',
			'currentUser' => $this->currentUser,
		];
		return view('admin/template',$data);
	}
}
