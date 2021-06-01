<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;

class Dashboard extends AdminController
{
	public function index()
	{
		$postsModel  = new \App\Models\PostsModel();
		$totalViews = join (',',array_column ( $postsModel->selectSum('views')->get()->getResult(),'views' ) );
		if(empty($totalViews)){
			$totalViews = 0;
		}
		$data = [
			'titlepage' => 'Dashboard',
			'currentUser' => $this->currentUser,
			'totalPosts' => $postsModel->countAllResults(),
			'totalViews' => $totalViews,
			'posts' => $postsModel->orderBy('views', 'DESC')->findAll(10),
		];
		return view('admin/dashboard',$data);
	}
}
