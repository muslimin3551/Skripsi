<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PaymentModel as AdminPaymentModel;
use App\Models\Admin\StudentModel as AdminStudentModel;
use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Models\Admin\ItemAbleModel as AdminItemAbleModel;
use App\Models\Admin\ItemModel as AdminitemModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Invoice extends BaseController
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
            $data['title'] = 'INVOICE';
            $invoice = new AdminInvoiceModel();
            $data['invoice'] = $invoice->findAll();
            return view('admin/invoice/index', $data);
        }
    }
    public function detail($id)
    {
        $invoice = new AdminInvoiceModel();
        $itemable = new AdminItemAbleModel();
        $data['invoice'] = $invoice->where('id', $id)->first();
        $data['itemable'] = $itemable->where('invoice_id', $id)->findAll();
        $data['title'] = 'DETAIL INVOICE';
        if (!$data['invoice']) {
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('/admin/invoice/detail', $data);
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

            $student = new AdminStudentModel();
            $data['student'] = $student->findAll();
            $invoice = new AdminInvoiceModel();
            $item = new AdminitemModel();
            $data['items'] = $item->findAll();
            $data['invoice'] = $invoice->orderBy('id', 'desc')->first();
            if($data['invoice'] != null){
                $data['invoice_number'] = $data['invoice']['invoice_number'] + 1;
                
            }else{
                $data['invoice_number'] = date('Y').'0001';
            }
            $data['title'] = "ADD INVOICE";
            echo view('/admin/invoice/create', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'invoice_number'          => 'required',
            'student_id'         => 'required',
        ];

        if ($this->validate($rules)) {
            $model = new AdminInvoiceModel();
            $data = [
                'student_id'                => $this->request->getVar('student_id'),
                'invoice_number'            => $this->request->getVar('invoice_number'),
                'invoice_status'            => 1,
                'description'               => $this->request->getVar('description'),
                'start_date'                => $this->request->getVar('start_date'),
                'due_date'                  => $this->request->getVar('due_date'),
                'subtotal'                  => $this->request->getVar('total'),
                'total'                     => $this->request->getVar('total'),
                'admin_note'                => $this->request->getVar('admin_note'),
            ];
            $model->save($data);
            $invoice_save = $model->orderBy('id', 'desc')->first();
            if ($invoice_save) {
                $item = new AdminItemAbleModel();
                $data_item = [
                    'invoice_id'            => $invoice_save['id'],
                    'item_id'               => $this->request->getVar('item_id'),
                    'description'           => $this->request->getVar('description_item'),
                    'qty'                   => $this->request->getVar('qty'),
                    'rate'                  => $this->request->getVar('rate'),
                ];
                $invoice_save = $item->save($data_item);
            }
            $session = session();
            $session->setFlashdata('msg_succes', 'data anda berhasil di simpan!');
            return redirect()->to('admin/invoice');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $student = new AdminStudentModel();
            $data['student'] = $student->findAll();
            $invoice = new AdminInvoiceModel();
            $item = new AdminitemModel();
            $data['item'] = $item->findAll();
            $data['invoice'] = $invoice->orderBy('id', 'desc')->first();
            $data['invoice_number'] = $data['invoice']['invoice_number'] + 1;
            $data['title'] = "ADD INVOICE";
            echo view('/admin/invoice/create', $data);
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
            $invoice = new AdminInvoiceModel();
            $data['invoice'] = $invoice->where('id', $id)->first();
            $item = new AdminitemModel();
            $item_able = new AdminItemAbleModel();
            $data['items'] = $item->findAll();
            $data['item_able'] = $item_able->where('invoice_id', $id)->first();
            $student = new AdminStudentModel();
            $data['student'] = $student->findAll();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'student_id' => 'required',
                'description' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $invoice_save = $invoice->update($id, [
                    'student_id'                => $this->request->getPost('student_id'),
                    'description'               => $this->request->getPost('description'),
                    'start_date'                => $this->request->getPost('start_date'),
                    'due_date'                  => $this->request->getPost('due_date'),
                    'subtotal'                  => $this->request->getPost('total'),
                    'total'                     => $this->request->getPost('total'),
                    'admin_note'                => $this->request->getPost('admin_note'),
                ]);
                if ($invoice_save) {
                    $item_able->update($id, [
                        'invoice_id'            => $id,
                        'item_id'               => $this->request->getPost('item_id'),
                        'description'           => $this->request->getPost('description_item'),
                        'qty'                   => $this->request->getPost('qty'),
                        'rate'                  => $this->request->getPost('rate'),
                    ]);
                }
                $session = session();
                $session->setFlashdata('msg_succes', 'data anda berhasil di update!');
                return redirect('admin/invoice');
            }

            // tampilkan form edit
            $data['validation'] = $this->validator;
            $data['title'] = "EDIT INVOICE";
            echo view('/admin/invoice/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $invoice = new AdminInvoiceModel();
        $payment = new AdminPaymentModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data anda berhasil di hapus!');
        $data_payment = $payment->where('invoice_id', $id)->first();
        if ($data_payment) {
            $payment->delete($data_payment['id']);
        }
        $invoice->delete($id);
        return redirect('admin/invoice');
    }
}
