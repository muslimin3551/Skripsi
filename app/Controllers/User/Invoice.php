<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Models\Admin\ItemAbleModel as AdminItemAbleModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Invoice extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $student_id = session()->get('student_id');
            $data['title'] = 'TAGIHAN';
            $invoice = new AdminInvoiceModel();
            $status = '';
            if ($this->request->getGet('status')) {
                $status = $this->request->getGet('status');
            }
            if ($status != '') {
                $data['invoice'] = $invoice->where(['student_id' => $student_id, 'invoice_status' => $status])->findAll();
            } else {
                $data['invoice'] = $invoice->where('student_id', $student_id)->findAll();
            }
            $data['status_selected'] = $status;
            return view('user/invoice', $data);
        }
    }
    public function detail($id)
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $invoice = new AdminInvoiceModel();
            $itemable = new AdminItemAbleModel();
            $student_id = session()->get('student_id');
            $data['invoice'] = $invoice->where('id', $id, 'student_id', $student_id)->first();
            $data['itemable'] = $itemable->where('invoice_id', $id)->findAll();
            $data['title'] = 'DETAIL TAGIHAN';
            if (!$data['invoice']) {
                throw PageNotFoundException::forPageNotFound();
            }
            echo view('/user/invoice_detail', $data);
        }
    }
}
