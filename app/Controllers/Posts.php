<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\PostsModel;

class Posts extends Controller
{

	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	public function index()
	{
		$model = new PostsModel();
        $data = [
			'posts' => $model->getPosts(),
			'title' => 'SimpleBlog',
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
	
		echo view('templates/header', $data);
		echo view('posts/view', $data);
		echo view('templates/footer', $data);
	}
	public function create(){
		helper('form');
		$data = [
			'title' => 'Create a news item',
		];
		echo view('templates/header', $data);
		echo view('posts/form');
		echo view('templates/footer');
	}

	public function store(){
		helper('form');
		$model = new PostsModel();

		$data = [
			'title' => 'Create a news item',
			'info' => 'Post salvo com sucesso.',
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
	public function edit($slug = null)
	{
		helper('form');
		$model = new PostsModel();
		$data = [
			'post' => $model->getPosts($slug),
		];
		if(empty($data['post'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não consegui encontrar esse post');
		}
		$data = [			
			'title' => 'SimpleBlog',
			'titlepost' => $data['post']['title'],
			'id' => $data['post']['id'],
			'body' => $data['post']['body'],
		];
		echo view('templates/header',$data);
		echo view('posts/form');
		echo view('templates/footer');
	}
	public function delete($slug = null)
	{		
		$model = new PostsModel();
		$model->where('slug', $slug)->delete();
		$data = [			
			'title' => 'SimpleBlog',
			'info' => 'Post deletado com sucesso.',
		];
		echo view('templates/header',$data);
		echo view('posts/success');
		echo view('templates/footer');
	}
}
