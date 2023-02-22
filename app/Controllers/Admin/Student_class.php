<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ClassModel as AdminClassModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Student_class extends BaseController
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
            $data['title'] = 'CLASS';
            $class = new AdminClassModel();
            $data['class'] = $class->findAll();
            return view('admin/master_data/class/index', $data);
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
            $data['title'] = "ADD CLASS";
            echo view('/admin/master_data/class/create', $data);
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
            $model = new AdminClassModel();
            $data = [
                'title'          => $this->request->getVar('title'),
                'description'         => $this->request->getVar('description'),
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data anda berhasil di tambahkan!');
            return redirect()->to('admin/class');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT CLASS";
            echo view('/admin/master_data/class/create', $data);
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
            $class = new AdminClassModel();
            $data['class'] = $class->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'title'          => 'required',
                'description'         => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $class->update($id, [
                    "title" => $this->request->getPost('title'),
                    "description" => $this->request->getPost('description'),
                    "updated_at" => date('Y-m-d hh:mm:ss'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data anda berhasil di update!');
                return redirect('admin/class');
            }

            // tampilkan form edit
            $data['title'] = "EDIT CLASS";
            echo view('admin/master_data/class/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $class = new AdminClassModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data berhasil di hapus!!');
        $class->delete($id);
        return redirect('admin/class');
    }
}
