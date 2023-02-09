<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PaymenttypeModel extends Model
{
    protected $table      = 'tbl_payment_type';
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
