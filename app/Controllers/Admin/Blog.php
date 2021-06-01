<?php

namespace App\Controllers\Admin;

use App\Controllers\AdminController;

class Blog extends AdminController
{
	public function index()
	{		
        $blogModel  = new \App\Models\BlogModel();
        $data = [
            'titlepage' => 'Configurações',
            'config' => $blogModel->find(1),
            'currentUser' => $this->currentUser,
            'css' => [
                'Toastr' => 'toastr/toastr.min.css',
            ],
            'scripts' => [
                'Toastr' => 'toastr/toastr.min.js',
            ],
        ];
        return view('admin/blog/index',$data);		
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
                'currentUser' => $this->currentUser,
			];
			echo view('admin/blog/index',$data);
        }else{
            $name = $this->request->getpost('nome-blog');
            $bio = $this->request->getpost('bio');
            $theme = $this->request->getpost('theme-color');
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
                'theme'=> $theme,                
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
                return redirect()->to('/admin/blog')->with('success','Configurações salvas com sucesso')->withInput();
            }
        }
	}
    public function imagem(){	
        $blogModel  = new \App\Models\BlogModel();
        $data = [
            'titlepage' => 'Imagem do blog',
            'currentUser' => $this->currentUser,
            'css' => [
                'Toastr' => 'toastr/toastr.min.css',
            ],
            'scripts' => [
                'Toastr' => 'toastr/toastr.min.js',
            ],
        ];
        return view('admin/blog/imagem',$data);
    }
    public function upload(){
        $validation = $this->validate([
            'blog-imagem' => [
                'rules' => 'uploaded[blog-imagem]|mime_in[blog-imagem,image/png,image/jpg]|ext_in[blog-imagem,png,jpg]',
                'errors' => [
                    'uploaded' => 'Não foi possível fazer o upload',
                    'mime_in' => 'Apenas faça upload de arquivos PNG  ou JPG',
                    'ext_in' => 'Extensão da imagem inválida',
                ],
            ],
        ]);
		
        if(!$validation){
			$data = [
				'titlepage' => 'Imagem do blog',
                'validation'=> $this->validator,
                'currentUser' => $this->currentUser,
			];
			echo view('admin/blog/imagem',$data);            
        }else{
            $file = $this->request->getFile('blog-imagem');
            if ($file->isValid() && ! $file->hasMoved()){
                $newName = 'blog-personal-image.' . $file->getExtension();
                if($file->move('assets/images/', $newName, true)){
                    return redirect()->to('/admin/blog/imagem')->with('success','Imagem salva com sucesso');
                }else{
                    return redirect()->to('/admin/blog/imagem')->with('fail','Falha ao tentar salvar a imagem');
                }            
            }
            return redirect()->to('/admin/blog/imagem')->with('fail','Falha ao enviar a imagem');
        }
    }
    public function about(){
		$aboutModel  = new \App\Models\AboutModel();
        if ($this->request->getMethod() == "post") {			
            $validation = $this->validate([
                'title-page' => [
                    'rules' => 'required|min_length[3]|max_length[25]',
                    'errors' => [
                        'required' => 'Você precisa digitar o título da pagína', 
                        'min_length' => 'O título deve ter pelo menos 3 caracteres',
                        'max_length' => 'O título não deve ter mais de 25 caracteres',
                    ],
                ],
                'about' => [
                    'rules' => 'required|min_length[3]',
                    'errors' => [
                        'required' => 'Digite sobre você',
                        'min_length' => 'A biografia deve ter pelo menos 3 caracteres',
                    ],
                ],
            ]);
            
            if(!$validation){
                $data = [
                    'titlepage' => 'Sobre o autor',
                    'validation'=> $this->validator,
                    'currentUser' => $this->currentUser,
                ];
                echo view('admin/blog/about',$data);
            }else{
                $title = $this->request->getpost('title-page');
                $about = $this->request->getpost('about');
                //columns in db
                $values = [
                    'id' => 1,
                    'title_page'=> $title,
                    'about'=> $about,               
                ];
                if(!$aboutModel->find(1)){
                    $result = $aboutModel->insert($values);
                }else{
                    $result = $aboutModel->save($values);
                }
                if(!$result){
                    return redirect()->back()->with('fail','Não foi possível salvar as configurações');
                }else{
                    return redirect()->back()->with('success','Configurações salvas com sucesso');
                }
            }
        }     

        $data = [
            'titlepage' => 'Sobre o autor',
            'config' => $aboutModel->find(1),
            'currentUser' => $this->currentUser,
            'css' => [
                'Toastr' => 'toastr/toastr.min.css',
            ],
            'scripts' => [
                'Toastr' => 'toastr/toastr.min.js',
            ],
        ];
        return view('admin/blog/about',$data);
    }

}
