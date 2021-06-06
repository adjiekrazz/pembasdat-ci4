<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Products extends BaseController
{
	public function index()
	{
		return view('products');
	}
}
