<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $data['title'] = 'DASBOARD';
        return view('admin/mazer/layout-default', $data);
    }
}