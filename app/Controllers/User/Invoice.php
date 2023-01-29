<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

class Invoice extends BaseController
{
    public function index()
    {
        return view('user/invoice');
    }
}
