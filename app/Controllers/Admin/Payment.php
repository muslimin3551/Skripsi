<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PaymentModel as AdminPaymentModel;
use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Models\Admin\PaymenttypeModel as AdminPaymenttypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Files\File;

class Payment extends BaseController
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
            $data['title'] = 'PAYMENT';
            $payment = new AdminPaymentModel();
            $data['payment'] = $payment->findAll();
            return view('admin/payment/index', $data);
        }
    }
    public function detail($id)
    {
        $payment = new AdminPaymentModel();
        $invoice = new AdminInvoiceModel();
        $data['invoice'] = $invoice->where('id', $id)->first();
        $data['payment'] = $payment->where('invoice_id', $id)->first();
        $data['title'] = 'PAYMENT DETAIL';
        if (!$data['payment']) {
            throw PageNotFoundException::forPageNotFound();
        }
        echo view('/admin/payment/detail', $data);
    }

    //--------------------------------------------------------------------------

    public function paid($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            // tampilkan form create
            $invoice = new AdminInvoiceModel();
            $data['invoice'] = $invoice->where('id', $id)->first();
            $payment_type = new AdminPaymenttypeModel();
            $data['payment_type'] = $payment_type->findAll();
            $data['title'] = "FORM PEMBAYARAN";
            echo view('/admin/payment/paid', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'invoice_id'          => 'required',
            'total'          => 'required',
            'file' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[file]',
                    'is_image[file]',
                    'mime_in[file,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];
        $id = $this->request->getVar('invoice_id');
        $total = $this->request->getVar('total');
        $status = 0;
        $invoice = new AdminInvoiceModel();
        $invoice_data = $invoice->where('id', $id)->first();
        if ($total < $invoice_data['total']) {
            $status = 2;
        } else {
            $status = 3;
        }
        if ($this->request->getFile('file')) {
            $dataBerkas = $this->request->getFile('file');
            $fileName = $dataBerkas->getRandomName();
        } else {
            $fileName = '';
        }
        if ($this->validate($rules)) {
            $model = new AdminPaymentModel();
            $data = [
                'invoice_id'        => $this->request->getVar('invoice_id'),
                'payment_type_id'   => $this->request->getVar('payment_type_id'),
                'total'             => $this->request->getVar('total'),
                'file'              => $fileName,
                'note'              => $this->request->getVar('note'),
            ];
            $model->save($data);
            if ($this->request->getFile('file')) {
                $dataBerkas->move('uploads', $fileName);
            }
            $invoice->update($id, [
                "invoice_status" => $status,
                "updated_at" => date('Y-m-d hh:mm:ss'),
            ]);
            $session = session();
            $session->setFlashdata('msg_succes', 'data pembayaran berhasil di tambahkan!');
            return redirect()->to('admin/invoice/detail/' . $id);
        } else {
            var_dump($fileName);
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['invoice'] = $invoice->where('id', $id)->first();
            $payment_type = new AdminPaymenttypeModel();
            $data['payment_type'] = $payment_type->findAll();
            $data['title'] = "FORM PEMBAYARAN";
            echo view('/admin/payment/paid', $data);
        }
    }

    //--------------------------------------------------------------------------


    public function delete($id)
    {
        $payment = new AdminPaymentModel();
        $invoice = new AdminInvoiceModel();
        $data_payment = $payment->where('id', $id)->first();
        $invoice->update($data_payment['invoice_id'], [
            "invoice_status" => 1,
            "updated_at" => date('Y-m-d hh:mm:ss'),
        ]);
        $session = session();
        $session->setFlashdata('msg_succes', 'data telah berhasil di hapus!');
        $payment->delete($id);
        return redirect('admin/payment');
    }
}
