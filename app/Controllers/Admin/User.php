<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel as AdminUserModel;
use App\Models\Admin\RoleModel as AdminRolepeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController
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
            $data['title'] = 'USER';
            $user = new AdminUserModel();
            $data['user'] = $user->findAll();
            return view('admin/user/index', $data);
        }
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
            $role = new AdminRolepeModel();
            $data['role'] = $role->findAll();
            // tampilkan form create
            $data['title'] = "ADD USER";
            return view('admin/user/create', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nip'          => 'required|is_unique[tbl_user.nip]',
            'name'          => 'required',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new AdminUserModel();
            $data = [
                'nip'          => $this->request->getVar('nip'),
                'role_id'      => $this->request->getVar('role_id'),
                'name'         => $this->request->getVar('name'),
                'email'        => $this->request->getVar('email'),
                'gender'       => $this->request->getVar('gender'),
                'address'      => $this->request->getVar('address'),
                'brd_date'     => $this->request->getVar('brd_date'),
                'password'     => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data user berhasil di simpan!');
            return redirect()->to('admin/user');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "ADD USER";
            echo view('admin/user/create', $data);
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
            $user = new AdminUserModel();
            $data['user'] = $user->where('id', $id)->first();
            $role = new AdminRolepeModel();
            $data['role'] = $role->findAll();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'name' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $user->update($id, [
                    "nip" => $this->request->getPost('nip'),
                    "name" => $this->request->getPost('name'),
                    "email" => $this->request->getPost('email'),
                    "gender" => $this->request->getPost('gender'),
                    "address" => $this->request->getPost('address'),
                    "brd_date" => $this->request->getPost('brd_date'),
                    "updated_at" => date('Y-m-d hh:mm:ss'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data user telah berhasil di update!');
                return redirect('admin/user');
            }

            // tampilkan form edit
            $data['title'] = "EDIT USER";
            echo view('/admin/user/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $user = new AdminUserModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data user telah berhasil di hapus!');
        $user->delete($id);
        return redirect('admin/user');
    }
}
