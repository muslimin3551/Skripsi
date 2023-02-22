<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class InvoiceModel extends Model
{
    protected $table      = 'tbl_invoice';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'student_id',
        'payment_type_id',
        'invoice_number',
        'invoice_status',
        'start_date',
        'description',
        'due_date',
        'subtotal',
        'total_tax',
        'total',
        'adjustment',
        'admin_note',
        'created_at',
        'updated_at',
        'is_deleted'
    ];
}
