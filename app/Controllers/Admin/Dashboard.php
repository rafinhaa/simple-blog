<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [
			'titlepage' => 'Dashboard',
		];
		return view('admin/template',$data);
	}
}
