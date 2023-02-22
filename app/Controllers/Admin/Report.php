<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ReportInvoiceModel as AdminReportInvoiceModel;
use App\Models\Admin\ReportPaymentModel as AdminReportPaymentModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Report extends BaseController
{
    public function __construct()
    {
        helper('AdminUserHelper');
    }
    public function invoice()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'REPORT INVOICE';
            $invoice = new AdminReportInvoiceModel();
            $data['invoice'] = $invoice->findAll();
            return view('admin/report/report_invoice', $data);
        }
    }
    public function payment()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'REPORT INVOICE';
            $payment = new AdminReportPaymentModel();
            $data['payment'] = $payment->findAll();
            return view('admin/report/report_payment', $data);
        }
    }
}
