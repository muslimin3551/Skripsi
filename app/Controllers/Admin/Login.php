<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel as AdminUserModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/dashboard');
        } else {
            $data['title'] = 'USER';
            echo view("/admin/auth-login", $data);
        }
    }
    public function auth()
    {
        $session = session();
        $model = new AdminUserModel();
        $nip = $this->request->getVar('nip');
        $password = $this->request->getVar('password');
        $data = $model->where(['nip' => $nip])->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'nip'    => $data['nip'],
                    'admin_logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/admin/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('admin/login');
            }
        } else {
            $session->setFlashdata('msg', 'NIP not Found');
            return redirect()->to('admin/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('admin/login');
    }

    public function forgot_password()
    {
        $data['title'] = 'FORGOT PASSWORD';
        return view('admin/auth-forgot', $data);
    }
    public function reset_password()
    {
        $data['title'] = 'RESET PASSWORD';
        return view('admin/auth-reset', $data);
    }
}
