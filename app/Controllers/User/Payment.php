<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Payment extends BaseController
{
    public function index()
    {
        return view('user/payment');
    }
}
