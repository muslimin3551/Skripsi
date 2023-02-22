<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class InvoiceStatusModel extends Model
{
    protected $table      = 'tbl_invoice_status';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'title', 
        'description',
        'updated_at', 
        'created_at',
        'is_deleted'
    ];
}
