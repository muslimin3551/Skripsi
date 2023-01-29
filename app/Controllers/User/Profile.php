<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        return view('user/profile');
    }
}
