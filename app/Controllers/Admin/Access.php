<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel as AdminUserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Access extends BaseController
{
    public function __construct()
    {
        helper('AdminUserHelper');
    }
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'ACCESS';
            // $user = new AdminUserModel();
            // $data['user'] = $user->findAll();
            return view('admin/role_access/access/index', $data);
        }
    }
    public function preview($id)
    {
        $student = new AdminUserModel();
        $data['student'] = $student->where('id', $id)->first();

        if (!$data['student']) {
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('/admin/news_detail', $data);
    }

    //--------------------------------------------------------------------------

    public function create()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            // tampilkan form create
            $data['title'] = "ADD USER";
            echo view('/admin/mahasiswa/create', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'name'          => 'required|min_length[3',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[mahasiswa.email]',
            'phonenumber'   => 'required|min_length[10]|max_length[14]',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new AdminUserModel();
            $data = [
                'name'          => $this->request->getVar('name'),
                'email'         => $this->request->getVar('email'),
                'phonenumber'   => $this->request->getVar('phonenumber'),
                'faculty'       => $this->request->getVar('faculty'),
                'study_program' => $this->request->getVar('study_program'),
                'concentration' => $this->request->getVar('concentration'),
                'class'         => $this->request->getVar('class'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'your data has been added!');
            return redirect()->to('admin/student');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "ADD MAHASISWA";
            echo view('admin/student/create', $data);
        }
    }

    //--------------------------------------------------------------------------

    public function edit($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            // ambil artikel yang akan diedit
            $student = new AdminUserModel();
            $data['student'] = $student->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'name' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $student->update($id, [
                    "name" => $this->request->getPost('name'),
                    "nim" => $this->request->getPost('nim'),
                    "phonenumber" => $this->request->getPost('phonenumber'),
                    "faculty" => $this->request->getPost('faculty'),
                    "study_program" => $this->request->getPost('study_program'),
                    "concentration" => $this->request->getPost('concentration'),
                    "class" => $this->request->getPost('class'),
                    "active" => $this->request->getPost('active'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'your data has been Updated!');
                return redirect('admin/student');
            }

            // tampilkan form edit
            $data['title'] = "EDIT MAHASISWA";
            echo view('/admin/student/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $student = new AdminUserModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'your data has been deleted!!');
        $student->delete($id);
        return redirect('admin/student');
    }
}
