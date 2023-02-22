<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ReportInvoiceModel extends Model
{
    protected $table      = 'report_invoice';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'invoice_number', 
        'invoice_status', 
        'name',
        'description',
        'start_date',
        'due_date',
        'total'
    ];
}
