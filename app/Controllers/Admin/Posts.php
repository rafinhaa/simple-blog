<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;
use App\Models\PostsModel;

class Posts extends AdminController
{

	/**
	 * Instance of the main Request object.
	 *
	 * @var HTTP\IncomingRequest
	 */
	protected $request;

	public function index()
	{
		$postsModel  = new \App\Models\PostsModel();
        $data = [
			'titlepage' => 'Todos os posts',
			'posts' => $postsModel->getPosts(),
			'css' => [
				'DataTables' => 'datatable/datatables.css',
				'Toastr' => 'toastr/toastr.min.css',
			],
			'scripts' => [
				'DataTables' => 'datatable/datatables.js',
				'DataTables Default' => 'datatable/default-datatable.js',
				'Toastr' => 'toastr/toastr.min.js',
			],
		];
		return view('admin/posts/index', $data);
	}
	public function create(){
		$data = [
			'titlepage' => 'Adicionar novo',
		];
		echo view('admin/posts/post', $data);
	}
	public function store(){
		$validation = $this->validate([
            'title' => [
                'rules' => 'required|min_length[3]|max_length[255]|is_unique[posts.slug]',
                'errors' => [
                    'required' => 'O título é necessário',
                    'min_length' => 'O título está muito pequeno',
                    'max_length' => 'O título está grande demais',
                    'is_unique' => 'Esse título já existe',
                ],
            ],
            'body' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'O corpo da postagem é necessário',
                ],                
            ],
        ]);

		if(!$validation){
			$data = [
				'titlepage' => 'Adicionar novo',
				'validation'=> $this->validator,
				'view' => 'admin/posts/post',
			];
			return view('admin/posts/post', $data);
        }else{
			$id = $this->request->getpost('id');
            $title = $this->request->getpost('title');
            $body = $this->request->getpost('body');
			//columns in db
            $values = [
                'id' => $id,
                'title' => $title,
                'body' => $body,
				'slug' => url_title($this->request->getPost('title'), '-', TRUE),
            ];
			$postsModel  = new \App\Models\PostsModel();
			$query = $postsModel->save($values);
			if(!$query){
                return redirect()->back()->with('fail','something went wrong');
                //return redirect()->to('register')->with('fail','something went wrong');
            }else{
                //redirect to posts page
                return redirect()->to('/admin/posts')->with('success','Post salvo com sucesso!');
            }
        }
	}
	public function edit($slug = null)
	{
		$model = new PostsModel();
		$data = [
			'post' => $model->getPosts($slug),
		];
		if(empty($data['post'])){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não consegui encontrar esse post');
		}
		$data = [			
			'titlepage' => 'Editar postagem',
			'titlepost' => $data['post']['title'],
			'id' => $data['post']['id'],
			'body' => $data['post']['body'],
		];
		echo view('admin/posts/post', $data);
	}
	public function delete($slug = null)
	{		
		$postsModel  = new \App\Models\PostsModel();
		$query = $postsModel->where('slug', $slug)->delete();
		if(!$query){
			return redirect()->back()->with('fail','Não foi possível excluir o post');
			//return redirect()->to('register')->with('fail','something went wrong');
		}else{
			//redirect to posts page
			return redirect()->to('/admin/posts')->with('success','Post excluído com sucesso!');
		}
	}
}
