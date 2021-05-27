<?php

namespace App\Controllers;

class Home extends BaseController
{
		public function __construct(){

		if (!session()->has('username')) {
        header('location:/login');
        exit();
    }
}
	public function index()
	{
		return view('welcome_message');
	}
}
