<?php

namespace App\Controllers\User;

use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('login');
        } else {
            $student_id = session()->get('student_id');
            $data['title'] = 'DASHBOARD';
            $invoice = new AdminInvoiceModel();
            $data['total_tagihan'] = $invoice->where('student_id', $student_id)->findAll();
            $today_1 = date('Y-m-d 00:00:01');
            $today_2 = date('Y-m-d 23:59:59');
            $data['invoice_today'] = $invoice->where([`created_at > $today_1 && created_at < $today_2`, 'student_id' => $student_id])->findAll();
            return view('user/dashboard', $data);
        }
    }
}
