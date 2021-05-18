<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index($aloo)
	{
		echo $aloo;
		//return view('welcome_message');
	}
}
