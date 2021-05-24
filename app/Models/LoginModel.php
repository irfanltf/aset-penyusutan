<?php 

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model{

	protected $table = 'user';


	public function getLogin($usr, $pw){
		return $this->where(['username'=>$usr, 'password' => $pw])->first();
	}


}



 ?>