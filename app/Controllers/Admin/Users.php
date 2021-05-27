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
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Não foi possível adicionar o usuário');
            }else{           
				return redirect()->to('/admin/users')->with('success','Usuário adicionado com sucesso');
            }
        }
	}
	public function delete($id = null)
	{		
        if(is_null($id || empty($id))){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Página não encontrada!');
		}
		$usersModel  = new \App\Models\UsersModel();
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
        if(is_null($id || empty($id))){
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
		];
		echo view('admin/users/profile', $data);
	}
    public function upload($id = null){
        if(is_null($id || empty($id))){
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Página não encontrada!');
		}
        $validation = $this->validate([
            'profile-imagem' => [
                'rules' => 'uploaded[profile-imagem]|mime_in[profile-imagem,image/png,image/jpg]|ext_in[profile-imagem,png,jpg]',
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
			//echo view('admin/users/profile/'.$id,$data);      
            return redirect()->back()->withInput();       
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
