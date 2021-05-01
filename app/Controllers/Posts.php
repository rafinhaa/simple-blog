<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PostsModel;

class Posts extends Controller
{
	public function index()
	{
		$model = new PostsModel();
        $data = [
			'posts' => $model->getPosts(),
			'title' => 'SimpleBlog',
			'titlepage' => 'Últimas Postagens',
		];
	
		echo view('templates/header',$data);
		echo view('posts/overview', $data);
		echo view('templates/footer', $data);
	}
	public function view($slug = NULL)
	{
		$model = new PostsModel();
	
		$data['posts'] = $model->getPosts($slug);
	
		if (empty($data['posts']))
		{
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não foi possível encontrar esse item: '. $slug);
		}
	
		$data['title'] = 'SimpleBlog';
		$data['titlepage'] = $data['posts']['title'];
	
		echo view('templates/header', $data);
		echo view('posts/view', $data);
		echo view('templates/footer', $data);
	}
	public function create(){
			/**$model = new PostsModel();
		
			if ($this->request->getMethod() === 'post' && $this->validate([
				'title' => 'required|min_length[3]|max_length[255]',
				'body'  => 'required',
			]))
		{
			$model->save([
				'title' => $this->request->getPost('title'),
				'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
				'body'  => $this->request->getPost('body'),
			]);
			//echo view('news/success');
		}
		else
		{*/
			$data = [
				'title' => 'Create a news item',
				'titlepage' => 'Create a news item',
			];
			echo view('templates/header', $data);
			echo view('posts/form');
			echo view('templates/footer');
		//}
	}

	public function store(){
		//helper('form');
		$model = new PostsModel();

		$data = [
			'title' => 'Create a news item',
			'titlepage' => 'Create a news item',
		];

		$rules = [
			'title' => 'required|min_length[3]|max_length[255]',
			'body' => 'required',
		];

		if($this->validate($rules)){
			$model->save([
				'id' => $this->request->getPost('id'),
				'title' => $this->request->getPost('title'),
				'slug'  => url_title($this->request->getPost('title'), '-', TRUE),
				'body'  => $this->request->getPost('body'),
			]);
			echo view('templates/header',$data);
			echo view('posts/success');
			echo view('templates/footer');
		}else{
			echo view('templates/header',$data);
			echo view('posts/form');
			echo view('templates/footer');
		}
	}
}
