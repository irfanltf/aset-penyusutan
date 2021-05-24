<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
	protected $logins;

	public function __construct(){
		$this->logins = new LoginModel();
	}

	public function index()
	{

		if (!$this->validate([

			'username' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Username Harus diisi'
				]
			],
			'password' => [
				'rules' => 'required',
				'errors' => [
					'required' => 'Password Harus diisi!'
				]
			]

		])) {
		return view('login/index');
		}else{
			
			return $this->_login();
		}

	}


	private function _login(){
		$usr = $this->request->getVar('username');
		$pw = $this->request->getVar('password');

		$user = $this->logins->getLogin($usr, $pw);
		if($user){
			
		session()->set($user);
		return redirect()->to('/home');
		}else{
	
			session()->setFlashdata('pesan', 'Ada Kesalahan!');
			return redirect()->to('/login');
		}
	}

	public function logout(){
		session()->destroy();
		return redirect()->to('/login');
	}

}
