<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ItemModel as AdminitemModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Item extends BaseController
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
            $data['title'] = 'ITEM';
            $item = new AdminitemModel();
            $data['item'] = $item->findAll();
            return view('admin/master_data/item/index', $data);
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
            $data['title'] = "ADD USER";
            echo view('/admin/master_data/item/create', $data);
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
            'rate'   => 'required',
            'qty'      => 'required',
        ];

        if ($this->validate($rules)) {
            $model = new AdminitemModel();
            $data = [
                'title'          => $this->request->getVar('title'),
                'description'         => $this->request->getVar('description'),
                'rate'   => $this->request->getVar('rate'),
                'qty'       => $this->request->getVar('qty'),
                'tax' => $this->request->getVar('tax')
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data berhasil di simpan!');
            return redirect()->to('admin/item');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "ADD ITEM";
            echo view('admin/master_data/item/create', $data);
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
            $item = new AdminitemModel();
            $data['item'] = $item->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'title'          => 'required',
                'description'         => 'required',
                'rate'   => 'required',
                'qty'      => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $item->update($id, [
                    "title" => $this->request->getPost('title'),
                    "description" => $this->request->getPost('description'),
                    "rate" => $this->request->getPost('rate'),
                    "qty" => $this->request->getPost('qty'),
                    "tax" => $this->request->getPost('tax'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data berhasil di edit!');
                return redirect('admin/item');
            }

            // tampilkan form edit
            $data['title'] = "EDIT ITEM";
            echo view('/admin/master_data/item/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $item = new AdminitemModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data berhasil di hapus!');
        $item->delete($id);
        return redirect('admin/item');
    }
}
