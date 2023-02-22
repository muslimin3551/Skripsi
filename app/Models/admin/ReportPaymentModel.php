<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ReportPaymentModel extends Model
{
    protected $table      = 'report_payment';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'invoice_number', 
        'payment_type',
        'date_created',
        'total'
    ];
}
