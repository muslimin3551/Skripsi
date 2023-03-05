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
            $data['tagihan'] = $invoice->where(['student_id' => $student_id, 'invoice_status' => 1])->findAll();
            $today_start = date('Y-m-d 00:00:01');
            $month_start = date('Y-m-01 00:00:01');
            $year_start = date('Y-01-01 00:00:01');
            $today_end = date('Y-m-d 23:59:59');
            $month_end = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start)));
            $year_end = date('Y-m-d 23:59:59', strtotime('+12 month', strtotime($year_start)));
            $data['invoice_today'] = $invoice->where(['created_at >=' => $today_start, 'created_at <=' => $today_end, 'student_id' => $student_id])->limit(5)->findAll();
            $data['invoice_monthly'] = $invoice->where(['created_at >=' => $month_start, 'created_at <=' => $month_end, 'student_id' => $student_id])->limit(5)->findAll();
            $data['invoice_yearly'] = $invoice->where(['created_at >=' => $year_start, 'created_at <=' => $year_end, 'student_id' => $student_id])->limit(5)->findAll();
            $sum_total = [];
            foreach ($data['tagihan'] as $row) {
                array_push($sum_total, $row['total']);
            }
            $data['total_tagihan'] = array_sum($sum_total);
            return view('user/dashboard', $data);
        }
    }
}
