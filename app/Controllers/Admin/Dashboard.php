<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
	public function index()
	{
		$postsModel  = new \App\Models\PostsModel();
		echo print_r($postsModel->selectCount('views')->get()); die;
		$data = [
			'titlepage' => 'Dashboard',
			'currentUser' => $this->currentUser,
			'totalPosts' => $postsModel->countAllResults(),
			'totalViews' => $postsModel->selectCount('views')->get(),
			'posts' => $postsModel->orderBy('views', 'DESC')->findAll(10),
		];
		return view('admin/dashboard',$data);
	}
}
