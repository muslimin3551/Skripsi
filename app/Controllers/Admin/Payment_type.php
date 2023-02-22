<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PaymenttypeModel as AdminPaymenttypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Payment_type extends BaseController
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
            $data['title'] = 'PAYMENT TYPE';
            $payment_type = new AdminPaymenttypeModel();
            $data['payment_type'] = $payment_type->findAll();
            return view('admin/master_data/payment_type/index', $data);
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
            $data['title'] = "ADD PAYMENT TYPE";
            echo view('/admin/master_data/payment_type/create', $data);
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
            $model = new AdminPaymenttypeModel();
            $data = [
                'title'          => $this->request->getVar('title'),
                'description'         => $this->request->getVar('description'),
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data kelas berhasil di tambahkan!');
            return redirect()->to('admin/payment_type');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT PAYMENT TYPE";
            echo view('/admin/master_data/payment_type/create', $data);
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
            $payment_type = new AdminPaymenttypeModel();
            $data['payment_type'] = $payment_type->where('id', $id)->first();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'title'          => 'required',
                'description'         => 'required',
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $payment_type->update($id, [
                    "title" => $this->request->getPost('title'),
                    "description" => $this->request->getPost('description'),
                    "updated_at" => date('Y-m-d hh:mm:ss'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'your data has been Updated!');
                return redirect('admin/payment_type');
            }

            // tampilkan form edit
            $data['title'] = "EDIT PAYMENT TYPE";
            echo view('admin/master_data/payment_type/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $class = new AdminPaymenttypeModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data berhasil di hapus!!');
        $class->delete($id);
        return redirect('admin/payment_type');
    }
}
