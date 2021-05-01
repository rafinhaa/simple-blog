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
}
