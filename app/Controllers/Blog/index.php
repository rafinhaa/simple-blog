<?php

namespace App\Controllers\Blog;
use App\Controllers\BaseController;

class Index extends BaseController
{
	public function index()
	{
		$postsModel  = new \App\Models\PostsModel();
        $data = [
			'posts' => $postsModel->getPosts(false,5),
			//custom pagination
			'currentPage' => $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1,
			'pager' => $postsModel->pager,
		];
		return view('blog/posts',$data);
	}
}
