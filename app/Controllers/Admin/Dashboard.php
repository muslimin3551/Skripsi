<?php

namespace App\Controllers\Admin;

use App\Models\Admin\InvoiceModel as AdminInvoiceModel;
use App\Models\Admin\PaymentModel as AdminPaymentModel;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'DASBOARD';
            $invoice = new AdminInvoiceModel();
            $payment = new AdminPaymentModel();
            $data['tagihan'] = $invoice->findAll();
            $data['count_student'] = $invoice->countAllResults();
            $data['count_invoice'] = $invoice->countAllResults();
            $data['count_payment'] = $payment->countAllResults();
            $data['count_user'] = $invoice->countAllResults();
            $today_start = date('Y-m-d 00:00:01');
            $month_start = date('Y-m-01 00:00:01');
            $year_start = date('Y-01-01 00:00:01');
            $today_end = date('Y-m-d 23:59:59');
            $month_end = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start)));
            $year_end = date('Y-m-d 23:59:59', strtotime('+12 month', strtotime($year_start)));
            $data['invoice_today'] = $invoice->where(['created_at >=' => $today_start, 'created_at <=' => $today_end])->limit(5)->findAll();
            $data['invoice_monthly'] = $invoice->where(['created_at >=' => $month_start, 'created_at <=' => $month_end])->limit(5)->findAll();
            $data['invoice_yearly'] = $invoice->where(['created_at >=' => $year_start, 'created_at <=' => $year_end])->limit(5)->findAll();
            $sum_total = [];
            foreach ($data['tagihan'] as $row) {
                array_push($sum_total, $row['total']);
            }
            //JANUARY
            $month_start_january = date('Y-01-01 00:00:01');
            $month_end_january = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_january)));
            $data['invoice_monthly_january'] = $invoice->where(['created_at >=' => $month_start_january, 'created_at <=' => $month_end_january])->findAll();
            $sum_total_january = [];
            foreach ($data['invoice_monthly_january'] as $row) {
                array_push($sum_total_january, $row['total']);
            }
            $data['sum_total_january'] = array_sum($sum_total_january);
            //END
            //FEBRUARY
            $month_start_february = date('Y-02-01 00:00:01');
            $month_end_february = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_february)));
            $data['invoice_monthly_february'] = $invoice->where(['created_at >=' => $month_start_february, 'created_at <=' => $month_end_february])->findAll();
            $sum_total_february = [];
            foreach ($data['invoice_monthly_february'] as $row) {
                array_push($sum_total_february, $row['total']);
            }
            $data['sum_total_february'] = array_sum($sum_total_february);
            //END
            //MARET
            $month_start_maret = date('Y-03-01 00:00:01');
            $month_end_maret = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_maret)));
            $data['invoice_monthly_maret'] = $invoice->where(['created_at >=' => $month_start_maret, 'created_at <=' => $month_end_maret])->findAll();
            $sum_total_maret = [];
            foreach ($data['invoice_monthly_maret'] as $row) {
                array_push($sum_total_maret, $row['total']);
            }
            $data['sum_total_maret'] = array_sum($sum_total_maret);
            //END
            //APRIL
            $month_start_april = date('Y-04-01 00:00:01');
            $month_end_april = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_april)));
            $data['invoice_monthly_april'] = $invoice->where(['created_at >=' => $month_start_april, 'created_at <=' => $month_end_april])->findAll();
            $sum_total_april = [];
            foreach ($data['invoice_monthly_april'] as $row) {
                array_push($sum_total_april, $row['total']);
            }
            $data['sum_total_april'] = array_sum($sum_total_april);
            //END
            //MEI
            $month_start_mei = date('Y-05-01 00:00:01');
            $month_end_mei = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_mei)));
            $data['invoice_monthly_mei'] = $invoice->where(['created_at >=' => $month_start_mei, 'created_at <=' => $month_end_mei])->findAll();
            $sum_total_mei = [];
            foreach ($data['invoice_monthly_mei'] as $row) {
                array_push($sum_total_mei, $row['total']);
            }
            $data['sum_total_mei'] = array_sum($sum_total_mei);
            //END
            //JUNI
            $month_start_juni = date('Y-06-01 00:00:01');
            $month_end_juni = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_juni)));
            $data['invoice_monthly_juni'] = $invoice->where(['created_at >=' => $month_start_juni, 'created_at <=' => $month_end_juni])->findAll();
            $sum_total_juni = [];
            foreach ($data['invoice_monthly_juni'] as $row) {
                array_push($sum_total_juni, $row['total']);
            }
            $data['sum_total_juni'] = array_sum($sum_total_juni);
            //END
            //JULI
            $month_start_juli = date('Y-07-01 00:00:01');
            $month_end_juli = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_juli)));
            $data['invoice_monthly_juli'] = $invoice->where(['created_at >=' => $month_start_juli, 'created_at <=' => $month_end_juli])->findAll();
            $sum_total_juli = [];
            foreach ($data['invoice_monthly_juli'] as $row) {
                array_push($sum_total_juli, $row['total']);
            }
            $data['sum_total_juli'] = array_sum($sum_total_juli);
            //END
            //AGUSTUS
            $month_start_agustus = date('Y-08-01 00:00:01');
            $month_end_agustus = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_agustus)));
            $data['invoice_monthly_agustus'] = $invoice->where(['created_at >=' => $month_start_agustus, 'created_at <=' => $month_end_agustus])->findAll();
            $sum_total_agustus = [];
            foreach ($data['invoice_monthly_agustus'] as $row) {
                array_push($sum_total_agustus, $row['total']);
            }
            $data['sum_total_agustus'] = array_sum($sum_total_agustus);
            //END
            //SEPTEMBER
            $month_start_september = date('Y-09-01 00:00:01');
            $month_end_september = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_september)));
            $data['invoice_monthly_september'] = $invoice->where(['created_at >=' => $month_start_september, 'created_at <=' => $month_end_september])->findAll();
            $sum_total_september = [];
            foreach ($data['invoice_monthly_september'] as $row) {
                array_push($sum_total_september, $row['total']);
            }
            $data['sum_total_september'] = array_sum($sum_total_september);
            //END
            //OKTOBER
            $month_start_oktober = date('Y-10-01 00:00:01');
            $month_end_oktober = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_oktober)));
            $data['invoice_monthly_oktober'] = $invoice->where(['created_at >=' => $month_start_oktober, 'created_at <=' => $month_end_oktober])->findAll();
            $sum_total_oktober = [];
            foreach ($data['invoice_monthly_oktober'] as $row) {
                array_push($sum_total_oktober, $row['total']);
            }
            $data['sum_total_oktober'] = array_sum($sum_total_oktober);
            //END
            //NOVEMBER
            $month_start_november = date('Y-11-01 00:00:01');
            $month_end_november = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_november)));
            $data['invoice_monthly_november'] = $invoice->where(['created_at >=' => $month_start_november, 'created_at <=' => $month_end_november])->findAll();
            $sum_total_november = [];
            foreach ($data['invoice_monthly_november'] as $row) {
                array_push($sum_total_november, $row['total']);
            }
            $data['sum_total_november'] = array_sum($sum_total_november);
            //END
            //DESEMBER
            $month_start_desember = date('Y-12-01 00:00:01');
            $month_end_desember = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_desember)));
            $data['invoice_monthly_desember'] = $invoice->where(['created_at >=' => $month_start_desember, 'created_at <=' => $month_end_desember])->findAll();
            $sum_total_desember = [];
            foreach ($data['invoice_monthly_desember'] as $row) {
                array_push($sum_total_desember, $row['total']);
            }
            $data['sum_total_desember'] = array_sum($sum_total_desember);
            //END


            //JANUARY
            $month_start_january_payment = date('Y-01-01 00:00:01');
            $month_end_january_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_january_payment)));
            $data['invoice_monthly_january_payment'] = $payment->where(['created_at >=' => $month_start_january_payment, 'created_at <=' => $month_end_january_payment])->findAll();
            $sum_total_january_payment = [];
            foreach ($data['invoice_monthly_january_payment'] as $row) {
                array_push($sum_total_january_payment, $row['total']);
            }
            $data['sum_total_january_payment'] = array_sum($sum_total_january_payment);
            //END
            //FEBRUARY
            $month_start_february_payment = date('Y-02-01 00:00:01');
            $month_end_february_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_february_payment)));
            $data['invoice_monthly_february_payment'] = $payment->where(['created_at >=' => $month_start_february_payment, 'created_at <=' => $month_end_february_payment])->findAll();
            $sum_total_february_payment = [];
            foreach ($data['invoice_monthly_february_payment'] as $row) {
                array_push($sum_total_february_payment, $row['total']);
            }
            $data['sum_total_february_payment'] = array_sum($sum_total_february_payment);
            //END
            //MARET
            $month_start_maret_payment = date('Y-03-01 00:00:01');
            $month_end_maret_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_maret_payment)));
            $data['invoice_monthly_maret_payment'] = $payment->where(['created_at >=' => $month_start_maret_payment, 'created_at <=' => $month_end_maret_payment])->findAll();
            $sum_total_maret_payment = [];
            foreach ($data['invoice_monthly_maret_payment'] as $row) {
                array_push($sum_total_maret_payment, $row['total']);
            }
            $data['sum_total_maret_payment'] = array_sum($sum_total_maret_payment);
            //END
            //APRIL
            $month_start_april_payment = date('Y-04-01 00:00:01');
            $month_end_april_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_april_payment)));
            $data['invoice_monthly_april_payment'] = $payment->where(['created_at >=' => $month_start_april_payment, 'created_at <=' => $month_end_april_payment])->findAll();
            $sum_total_april_payment = [];
            foreach ($data['invoice_monthly_april_payment'] as $row) {
                array_push($sum_total_april_payment, $row['total']);
            }
            $data['sum_total_april_payment'] = array_sum($sum_total_april_payment);
            //END
            //MEI
            $month_start_mei_payment = date('Y-05-01 00:00:01');
            $month_end_mei_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_mei_payment)));
            $data['invoice_monthly_mei_payment'] = $payment->where(['created_at >=' => $month_start_mei_payment, 'created_at <=' => $month_end_mei_payment])->findAll();
            $sum_total_mei_payment = [];
            foreach ($data['invoice_monthly_mei_payment'] as $row) {
                array_push($sum_total_mei_payment, $row['total']);
            }
            $data['sum_total_mei_payment'] = array_sum($sum_total_mei_payment);
            //END
            //JUNI
            $month_start_juni_payment = date('Y-06-01 00:00:01');
            $month_end_juni_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_juni_payment)));
            $data['invoice_monthly_juni_payment'] = $payment->where(['created_at >=' => $month_start_juni_payment, 'created_at <=' => $month_end_juni_payment])->findAll();
            $sum_total_juni_payment = [];
            foreach ($data['invoice_monthly_juni_payment'] as $row) {
                array_push($sum_total_juni_payment, $row['total']);
            }
            $data['sum_total_juni_payment'] = array_sum($sum_total_juni_payment);
            //END
            //JULI
            $month_start_juli_payment = date('Y-07-01 00:00:01');
            $month_end_juli_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_juli_payment)));
            $data['invoice_monthly_juli_payment'] = $payment->where(['created_at >=' => $month_start_juli_payment, 'created_at <=' => $month_end_juli_payment])->findAll();
            $sum_total_juli_payment = [];
            foreach ($data['invoice_monthly_juli_payment'] as $row) {
                array_push($sum_total_juli_payment, $row['total']);
            }
            $data['sum_total_juli_payment'] = array_sum($sum_total_juli_payment);
            //END
            //AGUSTUS
            $month_start_agustus_payment = date('Y-08-01 00:00:01');
            $month_end_agustus_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_agustus_payment)));
            $data['invoice_monthly_agustus_payment'] = $payment->where(['created_at >=' => $month_start_agustus_payment, 'created_at <=' => $month_end_agustus_payment])->findAll();
            $sum_total_agustus_payment = [];
            foreach ($data['invoice_monthly_agustus_payment'] as $row) {
                array_push($sum_total_agustus_payment, $row['total']);
            }
            $data['sum_total_agustus_payment'] = array_sum($sum_total_agustus_payment);
            //END
            //SEPTEMBER
            $month_start_september_payment = date('Y-09-01 00:00:01');
            $month_end_september_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_september_payment)));
            $data['invoice_monthly_september_payment'] = $payment->where(['created_at >=' => $month_start_september_payment, 'created_at <=' => $month_end_september_payment])->findAll();
            $sum_total_september_payment = [];
            foreach ($data['invoice_monthly_september_payment'] as $row) {
                array_push($sum_total_september_payment, $row['total']);
            }
            $data['sum_total_september_payment'] = array_sum($sum_total_september_payment);
            //END
            //OKTOBER
            $month_start_oktober_payment = date('Y-10-01 00:00:01');
            $month_end_oktober_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_oktober_payment)));
            $data['invoice_monthly_oktober_payment'] = $payment->where(['created_at >=' => $month_start_oktober_payment, 'created_at <=' => $month_end_oktober_payment])->findAll();
            $sum_total_oktober_payment = [];
            foreach ($data['invoice_monthly_oktober_payment'] as $row) {
                array_push($sum_total_oktober_payment, $row['total']);
            }
            $data['sum_total_oktober_payment'] = array_sum($sum_total_oktober_payment);
            //END
            //NOVEMBER
            $month_start_november_payment = date('Y-11-01 00:00:01');
            $month_end_november_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_november_payment)));
            $data['invoice_monthly_november_payment'] = $payment->where(['created_at >=' => $month_start_november_payment, 'created_at <=' => $month_end_november_payment])->findAll();
            $sum_total_november_payment = [];
            foreach ($data['invoice_monthly_november_payment'] as $row) {
                array_push($sum_total_november, $row['total']);
            }
            $data['sum_total_november_payment'] = array_sum($sum_total_november_payment);
            //END
            //DESEMBER
            $month_start_desember_payment = date('Y-12-01 00:00:01');
            $month_end_desember_payment = date('Y-m-d 23:59:59', strtotime('+1 month', strtotime($month_start_desember_payment)));
            $data['invoice_monthly_desember_payment'] = $payment->where(['created_at >=' => $month_start_desember_payment, 'created_at <=' => $month_end_desember_payment])->findAll();
            $sum_total_desember_payment = [];
            foreach ($data['invoice_monthly_desember_payment'] as $row) {
                array_push($sum_total_desember_payment, $row['total']);
            }
            $data['sum_total_desember_payment'] = array_sum($sum_total_desember_payment);
            //END


            $data['total_tagihan'] = array_sum($sum_total);
            return view('admin/dashboard', $data);
        }
    }
}
