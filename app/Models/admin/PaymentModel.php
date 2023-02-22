<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table      = 'tbl_payment_record';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'invoice_id',
        'payment_type_id',
        'total',
        'note',
        'file',
        'created_at',
        'updated_at',
        'is_deleted'
    ];
}
