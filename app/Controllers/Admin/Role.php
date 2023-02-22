<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RoleModel as AdminRolepeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Role extends BaseController
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
            $data['title'] = 'ROLE TYPE';
            $role = new AdminRolepeModel();
            $data['role'] = $role->findAll();
            return view('admin/role_access/role/index', $data);
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
            // tampilkan form create
            $data['title'] = "ADD ROLE TYPE";
            echo view('/admin/role_access/role/create', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'title'          => 'required',
            'description'         => 'required',
        ];

        if ($this->validate($rules)) {
            $model = new AdminRolepeModel();
            $data = [
                'title'          => $this->request->getVar('title'),
                'description'         => $this->request->getVar('description'),
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data kelas berhasil di tambahkan!');
            return redirect()->to('admin/role');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT ROLE TYPE";
            echo view('/admin/role_access/role/create', $data);
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
            $role = new AdminRolepeModel();
            $data['role'] = $role->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'title'          => 'required',
                'description'         => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $role->update($id, [
                    "title" => $this->request->getPost('title'),
                    "description" => $this->request->getPost('description'),
                    "updated_at" => date('Y-m-d hh:mm:ss'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'your data has been Updated!');
                return redirect('admin/role');
            }

            // tampilkan form edit
            $data['title'] = "EDIT ROLE TYPE";
            echo view('admin/role_access/role/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $role = new AdminRolepeModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data berhasil di hapus!!');
        $role->delete($id);
        return redirect('admin/role');
    }
}
