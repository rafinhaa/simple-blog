<?php

namespace App\Controllers\Blog;
use App\Controllers\BlogController;

class Index extends BlogController
{
	public function index()
	{	
		if($this->request->getMethod() === 'get' && !empty($this->request->getGet('search')) ){
			$search = $this->request->getGet('search');
			$data = [
				'config' => $this->configBlog->find(1),
				'posts' => $this->postsModel->like('title',$search)->paginate(5,'blog'),
				'currentPage' => $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1,
				'pager' => $this->postsModel->pager,
				'active_home' => true,
			];
			return view('blog/posts',$data);
		}else{
			$data = [
				'config' => $this->configBlog->find(1),
				'posts' => $this->postsModel->getPosts(false,5),
				//custom pagination
				'currentPage' => $this->request->getVar('page_blog') ? $this->request->getVar('page_blog') : 1,
				'pager' => $this->postsModel->pager,
				'active_home' => true,
			];
			return view('blog/posts',$data);
		}		
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
		$new_views = $data['post']['views'] + 1;
		$this->postsModel->where('id', $data['post']['id'])->set(['views' => $new_views])->update();
		return view('blog/post-blog',$data);
	}
	public function about()
	{		
        $data = [
			'config' => $this->configBlog->find(1),
			'about' => $this->aboutModel->find(1),
			'active_about' => true,
		];
		return view('blog/about',$data);
	}
}
