<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Blog extends BaseController
{
	public function index()
	{
		helper('form','url');
		if ($this->request->getMethod() == "post") {
            $this->store();
		}else{
            $blogModel  = new \App\Models\BlogModel();
			$data = [
				'titlepage' => 'Configurações',
				'config' => $blogModel->find(1),
				'view' => 'admin/blog/index',
			];
			return view('admin/template',$data);
		}		
	}
	private function store(){
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
                'rules' => 'valid_url',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
            'github-link' => [
                'rules' => 'valid_url',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'linkedin-link' => [
                'rules' => 'valid_url',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'stackoverflow-link' => [
                'rules' => 'valid_url',
                'errors' => [
                    'valid_url' => 'O link digitado não é válido',
                ],                
            ],
			'codepen-link' => [
                'rules' => 'valid_url',
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
                'blog_name'=> $name,
                'bio'=> $bio,                
                'social_twitter'=> $twitter,                
                'social_linkedin'=> $github,                
                'social_github'=> $linkedin,                
                'social_stoverflow'=> $stackoverflow,                
                'social_codepen'=> $codepen,                
            ];

            $blogModel = new \App\Models\BlogModel();
            $query = $blogModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Não foi possível adicionar o usuário');
                //return redirect()->to('register')->with('fail','something went wrong');
            }else{
                //redirect user to login page
                //return redirect()->to('register')->with('success','You are now registred, please login in');
                //redirect user to dashboard
                //$last_id = $blogModel->insertID();
                //session()->set('loggedUser', $last_id);                
				return redirect()->to('/blog')->with('success','Configurações salvas com sucesso');
            }
        }
	}
}
