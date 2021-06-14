<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    protected $authentication;

    public function __construct()
    {
        $this->authentication = service('authentication');
    }

	public function index()
	{
        $data = [
            'user' => $this->authentication->user()
        ];

		return view('profile', $data);
	}
}
