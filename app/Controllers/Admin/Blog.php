<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Blog extends AdminController
{
	public function index()
	{
		helper('form','url');		
        $blogModel  = new \App\Models\BlogModel();
        $data = [
            'titlepage' => 'Configurações',
            'config' => $blogModel->find(1),
            'view' => 'admin/blog/index',
            'css' => [
                'Toastr' => 'toastr/toastr.min.css',
            ],
            'scripts' => [
                'Toastr' => 'toastr/toastr.min.js',
            ],
        ];
        return view('admin/template',$data);		
	}
	public function store(){
        $validation = $this->validate([
            'nome-blog' => [
                'rules' => 'required|min_length[3]|max_length[25]',
                'errors' => [
                    'required' => 'Você precisa digitar o nome do blog', 
                    'min_length' => 'O nome deve ter pelo menos 3 caracteres',
                    'max_length' => 'O nome não deve ter mais de 25 caracteres',
                ],
            ],
            'bio' => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Digite a sua biografia',
					'min_length' => 'A biografia deve ter pelo menos 3 caracteres',
                ],
            ],
            'twitter-link' => [
                'rules' => 'valid_url|permit_empty',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
            'github-link' => [
                'rules' => 'valid_url|permit_empty',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'linkedin-link' => [
                'rules' => 'valid_url|permit_empty',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'stackoverflow-link' => [
                'rules' => 'valid_url|permit_empty',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'codepen-link' => [
                'rules' => 'valid_url|permit_empty',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
        ]);
		
        if(!$validation){
			$data = [
				'titlepage' => 'Configurações',
                'validation'=> $this->validator,
				'view' => 'admin/blog/index',
			];
			echo view('admin/template',$data);
        }else{
            $name = $this->request->getpost('nome-blog');
            $bio = $this->request->getpost('bio');
            $twitter = $this->request->getpost('twitter-link');
            $github = $this->request->getpost('github-link');
            $linkedin = $this->request->getpost('linkedin-link');
            $stackoverflow = $this->request->getpost('stackoverflow-link');
            $codepen = $this->request->getpost('codepen-link');
            //columns in db
            $values = [
                'id' => 1,
                'blog_name'=> $name,
                'bio'=> $bio,                
                'social_twitter'=> $twitter,                
                'social_linkedin'=> $linkedin,                
                'social_github'=> $github,                
                'social_stoverflow'=> $stackoverflow,                
                'social_codepen'=> $codepen,                
            ];
            $blogModel = new \App\Models\BlogModel();
            if(!$blogModel->find(1)){
                $query = $blogModel->insert($values);
            }else{
                $query = $blogModel->save($values);
            }
            if(!$query){
                return redirect()->back()->with('fail','Não foi possível salvar as configurações');
                //return redirect()->to('register')->with('fail','something went wrong');
            }else{
                //$this->index();
                return redirect()->to('/admin/blog')->with('success','Configurações salvas com sucesso');
            }
        }
	}
}
