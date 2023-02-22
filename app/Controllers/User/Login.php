<?php

namespace App\Controllers\User;
use App\Controllers\BaseController;

use App\Models\Admin\StudentModel as StudentModel;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/dashboard');
        } else {
            $data['title'] = 'USER';
            echo view("/user/login", $data);
        }
    }
    public function auth()
    {
        $session = session();
        $model = new StudentModel();
        $nis = $this->request->getVar('nis');
        $password = $this->request->getVar('password');
        $data = $model->where(['nis' => $nis])->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'name'     => $data['name'],
                    'student_id'     => $data['id'],
                    'nis'    => $data['nis'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Password yang anda masukan salah!');
                return redirect()->to('login');
            }
        } else {
            $session->setFlashdata('msg', 'NIS tidak di temukan');
            return redirect()->to('login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }

    public function forgot_password()
    {
        $data['title'] = 'FORGOT PASSWORD';
        return view('user/forgot_password', $data);
    }
    public function reset_password()
    {
        $data['title'] = 'RESET PASSWORD';
        return view('admin/auth-reset', $data);
    }
}
