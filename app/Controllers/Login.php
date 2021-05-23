<?php

namespace App\Controllers;
//use App\Controllers\AdminController;
use App\Libraries\Hash;

class Login extends AdminController
{
	public function index()
	{
		helper(['modal','alert']);
		$usersModel  = new \App\Models\UsersModel();
        $data = [
			'titlepage' => 'Login',
		];
		return view('admin/login', $data);
	}
	public function check(){
		helper('form');
        $validation = $this->validate([
            'email' => [
                'rules' => 'required|valid_email|is_not_unique[users.email]',
                'errors' => [
                    'required' => 'Digite seu email',
                    'is_not_unique' => 'Email não registrado',
                    'valid_email' => 'Digite um email válido',
                ],
            ],
            'password' => [
                'rules' => 'required|min_length[5]|max_length[12]',
                'errors' => [
                    'required' => 'Digite sua senha', 
                    'min_length' => 'A senha deve ter pelo menos 5 caracteres',
                    'max_length' => 'A senha não deve ter mais de 12 caracteres',
                ],                
            ],
        ]);
        if(!$validation){
			$data=[
				'titlepage' => 'Login',
				'validation'=>$this->validator,
			];
            return view('admin/login',$data);
        }else{
            $email = $this->request->getpost('email');
            $password = $this->request->getpost('password');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('email',$email)->first();
            $check_password = Hash::check($password, $user_info['password']);
            if(!$check_password){
                session()->setFlashdata('fail','Verifique seu usuário e senha');                
                return redirect()->to('/login')->withInput();
            }else{
                $user_id = $user_info['id'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('/admin');
            }
        }
    }
    public function logout() {
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/login?access=out')->with('fail','Você saiu!');
        }else{
            return redirect()->to('/login?access=out')->with('fail','Você saiu!');
        }
    }
	
}
