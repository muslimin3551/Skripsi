<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $data['title'] = 'LOGIN';
        return view('admin/mazer/auth-login', $data);
    }
}
