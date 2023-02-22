<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\Admin\PaymentModel as AdminPaymentModel;
use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Models\Admin\ItemAbleModel as AdminItemAbleModel;
use App\Models\Admin\PaymenttypeModel as AdminPaymenttypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Payment extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $student_id = session()->get('student_id');
            $data['title'] = 'PAYMENT';
            $invoice = new AdminInvoiceModel();
            $payment_type = new AdminPaymenttypeModel();
            $data['payment_type'] = $payment_type->findAll();
            $payment_type = '';
            if ($this->request->getGet('payment_type')) {
                $payment_type = $this->request->getGet('payment_type');
            }

            $data_invoice = $invoice->where('student_id', $student_id)->findAll();
            $payment = new AdminPaymentModel();
            $invoice_id = [];
            if ($data_invoice) {
                foreach ($data_invoice as $row) {
                    array_push($invoice_id, $row['id']);
                }
                if ($payment_type != '') {
                    $data['payment'] = $payment->whereIn(['invoice_id' => $invoice_id, 'payment_type_id' => $payment_type])->findAll();
                } else {
                    $data['payment'] = $payment->whereIn('invoice_id', $invoice_id)->findAll();
                }
            } else {
                $data['payment'] = null;
            }
            $data['payment_type_selected'] = $payment_type;
            return view('user/payment', $data);
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
            $payment = new AdminPaymentModel();
            $student_id = session()->get('student_id');
            $data['payment'] = $payment->where('id', $id)->first();
            if (!$data['payment']) {
                throw PageNotFoundException::forPageNotFound();
            }
            $data['invoice'] = $invoice->where('id', $data['payment']['invoice_id'], 'student_id', $student_id)->first();
            $data['itemable'] = $itemable->where('invoice_id', $data['payment']['invoice_id'])->findAll();
            $data['title'] = 'DETAIL PEMBAYARAN';
            echo view('/user/payment_detail', $data);
        }
    }
}
