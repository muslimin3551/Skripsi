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
        if (session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['title'] = 'FORGOT PASSWORD';
            return view('user/forgot_password', $data);
        }
    }

    public function forgot()
    {
        $session = session();
        $model = new StudentModel();
        $nis = $this->request->getVar('nis');
        $data = $model->where('nis', $nis)->first();
        if ($data) {
            //generate uniq token
            $token = md5(uniqid($data['name'], true));
            $model->update($data['id'], [
                'token'     => $token,
                "updated_at" => date('Y-m-d hh:mm:ss'),
            ]);
            $data = [
                'token' => $token
            ];
            $session->set($data);
            return redirect('reset_password');
        } else {
            $session->setFlashdata('msg', 'NIS tidak di temukan');
            return redirect('forgot_password');
        }
    }

    public function reset_password()
    {
        if (session()->get('token')) {
            $data['title'] = 'RESET PASSWORD';
            return view('user/reset_password', $data);
        } else {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        }
    }
    public function reset()
	{
		//include helper form
		$session = session();
		helper(['form']);
		//set rules validation form
		$rules = [
			'password'      => 'required|min_length[6]|max_length[200]',
			'confm_password'  => 'matches[password]'
		];
		$model = new StudentModel();
		$session = session();
		$token = $session->get('token');
		$data = $model->where('token', $token)->first();
		if ($this->validate($rules)) {
			if ($data) {
				$model->update($data['id'], [
					'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
					'token' => null,
                    "updated_at" => date('Y-m-d hh:mm:ss'),

				]);
				$session = session();
				$session->setFlashdata('msg_succes', 'Password anda berhasil di perbarui!');
				return redirect('login');
			} else {
				$session->setFlashdata('msg', 'Token tidak valid!');
				return redirect('reset_password');
			}
		} else {
            $data['title'] = 'RESET PASSWORD';
			$data['validation'] = $this->validator;
			echo view('/user/reset_password', $data);
		}
	}
}
