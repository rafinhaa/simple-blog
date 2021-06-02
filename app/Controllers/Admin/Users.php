<?php

namespace App\Controllers\Admin;
use App\Controllers\AdminController;
use App\Libraries\Hash;

class Users extends AdminController
{
	public function index()
	{
		$usersModel  = new \App\Models\UsersModel();
        $data = [
			'titlepage' => 'Todos os posts',
			'users' => $usersModel->findAll(),
            'currentUser' => $this->currentUser,
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
		return view('admin/users/index', $data);
	}
	public function create(){
		$data = [
			'titlepage' => 'Adicionar novo',
            'currentUser' => $this->currentUser,
		];
		echo view('admin/users/user', $data);
	}
	public function store(){        
        if ( !empty($this->request->getPost('id'))) {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required|min_length[2]',
                    'errors' => [
                        'required' => 'Seu nome é necessário',
                        'min_length' => 'Seu nome deve ter pelo menos 2 caracteres',
                    ],
                ],
                'email' => [
                    'rules' => 'valid_email',
                    'errors' => [
                        'valid_email' => 'Você deve inserir um email válido',
                    ],
                ],
                'password' => [
                    'rules' => 'permit_empty|min_length[5]|max_length[12]',
                    'errors' => [
                        'min_length' => 'A senha deve ter pelo menos 5 caracteres',
                        'max_length' => 'A senha não deve ter mais de 12 caracteres',
                    ],                
                ],
                'cpassword' => [
                    'rules' => 'permit_empty|min_length[5]|max_length[12]|matches[password]',
                    'errors' => [
                        'min_length' => 'A senha deve ter pelo menos 5 caracteres',
                        'max_length' => 'A senha não deve ter mais de 12 caracteres',
                        'matches' => 'A confirmação de senha não confere com a senha digitada',
                    ],  
                ],
            ]);
    
            if(!$validation){
                return redirect()->back()->withInput()->with('validation', $this->validator);
            }else{
                $id = $this->request->getpost('id');
                $name = $this->request->getpost('name');
                $email = $this->request->getpost('email');
                $password = $this->request->getpost('password');
                //columns in db                
                $values = [
                    'id' => $id,
                    'name'=> $name,
                    'email'=> $email,                    
                ];
                if(!empty($password) || !is_null($password)){
                    $values['password'] = Hash::make($password);
                }
                $usersModel = new \App\Models\UsersModel();
                $result = $usersModel->save($values);
                if(!$result){
                    return redirect()->back()->with('fail','Não foi possível alterar o usuário');
                }else{           
                    return redirect()->to('/admin/users')->with('success','Usuário alterado com sucesso');
                }
            }
        } else {
            $validation = $this->validate([
                'name' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Seu nome é necessário',
                    ],
                ],
                'email' => [
                    'rules' => 'required|valid_email|is_unique[users.email]',
                    'errors' => [
                        'required' => 'Seu email é necessário', 
                        'valid_email' => 'Você deve inserir um email válido',
                        'is_unique' => 'Esse email já está cadastrado',
                    ],
                ],
                'password' => [
                    'rules' => 'required|min_length[5]|max_length[12]',
                    'errors' => [
                        'required' => 'Você precisa digitar uma senha', 
                        'min_length' => 'A senha deve ter pelo menos 5 caracteres',
                        'max_length' => 'A senha não deve ter mais de 12 caracteres',
                    ],                
                ],
                'cpassword' => [
                    'rules' => 'required|min_length[5]|max_length[12]|matches[password]',
                    'errors' => [
                        'required' => 'Digite a senha novamente', 
                        'min_length' => 'A senha deve ter pelo menos 5 caracteres',
                        'max_length' => 'A senha não deve ter mais de 12 caracteres',
                        'matches' => 'A confirmação de senha não confere com a senha digitada',
                    ],  
                ],
            ]);
    
            if(!$validation){
                $data = [
                    'titlepage' => 'Adicionar novo',
                    'validation'=> $this->validator,
                    'currentUser' => $this->currentUser,
                ];
                return view('admin/users/user', $data);
            }else{
                $name = $this->request->getpost('name');
                $email = $this->request->getpost('email');
                $password = $this->request->getpost('password');
                //columns in db
                $values = [
                    'name'=> $name,
                    'email'=> $email,
                    'password'=> Hash::make($password),
                ];
    
                $usersModel = new \App\Models\UsersModel();
                $result = $usersModel->insert($values);
                if(!$result){
                    return redirect()->back()->with('fail','Não foi possível adicionar o usuário');
                }else{           
                    return redirect()->to('/admin/users')->with('success','Usuário adicionado com sucesso');
                }
            }
        }
	}
	public function delete($id = null)
	{		
        if(is_null($id || empty($id))){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Página não encontrada!');
		}else if ($id == session()->get('loggedUser')){
            return redirect()->back()->with('fail','Você não pode se excluir, use outra conta');
        }
		$usersModel  = new \App\Models\UsersModel();        
        $photo_del = $usersModel->where('id', $id)->findColumn('profile_img');
		if(!empty($photo_del[0]) && !is_null($photo_del[0])  ){
			if(!unlink(set_realpath('upload/userprofile/'.$photo_del[0]))){
				return redirect()->back()->with('fail','Não foi possível excluir o usuário');
			}
		}
		$result = $usersModel->delete($id);
		if(!$result){
			return redirect()->back()->with('fail','Não foi possível excluir o usuário');
			//return redirect()->to('register')->with('fail','something went wrong');
		}else{
			//redirect to posts page
			return redirect()->to('/admin/users')->with('success','Usuário excluido com sucesso');
		}
	}
    public function profile($id = null){
        if(is_null($id) || empty($id)){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Página não encontrada!');
		}
        $usersModel  = new \App\Models\UsersModel();
        $user = $usersModel->find($id);
        if(empty($user) || is_null($user) ){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Não consegui encontrar esse usuário');
		}
		$data = [
			'titlepage' => 'Editar usuário',
            'user' => $user,
            'currentUser' => $this->currentUser,            
			'css' => [
				'Toastr' => 'toastr/toastr.min.css',
			],
			'scripts' => [
				'Toastr' => 'toastr/toastr.min.js',
			],
		];
		echo view('admin/users/profile', $data);
	}
    public function upload($id = null){
        if(is_null($id) || empty($id)){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Página não encontrada!');
		}
        $validation = $this->validate([
            'profile-imagem' => [
                'rules' => 'required|uploaded[profile-imagem]|mime_in[profile-imagem,image/png,image/jpg]|ext_in[profile-imagem,png,jpg]',
                'errors' => [
                    'required' => 'Você não enviou nenhuma imagem',
                    'uploaded' => 'Não foi possível fazer o upload',
                    'mime_in' => 'Apenas faça upload de arquivos PNG  ou JPG',
                    'ext_in' => 'Extensão da imagem inválida',
                ],
            ],
        ]);
		
        if(!$validation){
			return redirect()->back()->withInput()->with('validation', $this->validator);       
        }else{
            $file = $this->request->getFile('profile-imagem');
            if ($file->isValid() && ! $file->hasMoved()){
                $newName = $file->getRandomName();
                if($file->move('upload/userprofile/', $newName, true)){
                    $values = [
                        'id' => $id,
                        'profile_img' => $newName,
                    ];
                    $usersModel  = new \App\Models\UsersModel();
                    $info = $usersModel->where('id', $id)->findColumn('profile_img');
                    if(!empty($info[0]) || !is_null($info[0]) ){
                        unlink(set_realpath('upload/userprofile/'.$info[0]));
                    }
                    $result = $usersModel->save($values);
                    if(!$result){
                        return redirect()->back()->with('fail','Falha ao tentar salvar a imagem');
                        //return redirect()->to('register')->with('fail','something went wrong');
                    }
                    return redirect()->to('/admin/users/profile/'.$id)->with('success','Imagem salva com sucesso');
                }else{
                    return redirect()->to('/admin/users/profile/'.$id)->with('fail','Falha ao tentar salvar a imagem');
                }            
            }
            return redirect()->to('/admin/users/profile/'.$id)->with('fail','Falha ao enviar a imagem');
        }
    }
}
