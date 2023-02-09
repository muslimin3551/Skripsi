<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'DASBOARD';
            return view('admin/dashboard', $data);
        }
    }
}
