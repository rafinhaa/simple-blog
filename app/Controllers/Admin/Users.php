<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Libraries\Hash;

class Users extends BaseController
{
	public function index()
	{
		helper(['modal','alert']);
		$usersModel  = new \App\Models\UsersModel();
        $data = [
			'titlepage' => 'Todos os posts',
			'users' => $usersModel->findAll(),
			'view' => 'admin/users/index',
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
		return view('admin/template', $data);
	}
	public function create(){
		helper('form');
		$data = [
			'titlepage' => 'Adicionar novo',
			'view' => 'admin/users/user',
		];
		echo view('admin/template', $data);
	}
	public function store(){
		helper('form','url');
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
				'view' => 'admin/users/user',
			];
			return view('admin/template', $data);
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
                //return redirect()->to('register')->with('fail','something went wrong');
            }else{
                //redirect user to login page
                //return redirect()->to('register')->with('success','You are now registred, please login in');
                //redirect user to dashboard
                //$last_id = $usersModel->insertID();
                //session()->set('loggedUser', $last_id);                
				return redirect()->to('/admin/users')->with('success','Usuário adicionado com sucesso');
            }
        }
	}
	public function delete($id = null)
	{		
		$usersModel  = new \App\Models\UsersModel();
		$query = $usersModel->delete($id);
		if(!$query){
			return redirect()->back()->with('fail','Não foi possível excluir o usuário');
			//return redirect()->to('register')->with('fail','something went wrong');
		}else{
			//redirect to posts page
			return redirect()->to('/admin/users')->with('success','Usuário excluido com sucesso');
		}
	}
}
