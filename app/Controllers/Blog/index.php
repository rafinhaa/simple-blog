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

	public function post_blog($slug = null)
	{		
		$postsModel  = new \App\Models\PostsModel();
        $data = [
			'post' => $postsModel->getPosts($slug),
		];
		if(empty($data['post'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não consegui encontrar esse post');
		}
		return view('blog/post-blog',$data);
	}
}
