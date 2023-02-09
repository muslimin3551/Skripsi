<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PaymentrecordModel extends Model
{
    protected $table      = 'tbl_payment_record';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'invoice_id',
        'total',
        'note',
        'created_at',
        'updated_at',
        'is_deleted'
    ];
}
