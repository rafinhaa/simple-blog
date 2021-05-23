<?php

namespace App\Controllers\Blog;
use App\Controllers\BlogController;

class Index extends BlogController
{
	public function index()
	{	
		$data = [
			'config' => $this->configBlog->find(1),
			'posts' => $this->postsModel->getPosts(false,5),
			//custom pagination
			'currentPage' => $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1,
			'pager' => $this->postsModel->pager,
		];
		return view('blog/posts',$data);
	}

	public function post_blog($slug = null)
	{		
        $data = [
			'config' => $this->configBlog->find(1),
			'post' => $this->postsModel->getPosts($slug),
		];
		if(empty($data['post'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não consegui encontrar esse post');
		}
		return view('blog/post-blog',$data);
	}
}
