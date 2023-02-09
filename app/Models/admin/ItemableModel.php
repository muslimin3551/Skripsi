<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ItemableModel extends Model
{
    protected $table      = 'tbl_itemabel';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'invoice_id', 
        'item_id',
        'title',
        'description',
        'rate',
        'qty',
        'tax',
        'created_at',
        'updated_at', 
        'is_deleted'
    ];
}
