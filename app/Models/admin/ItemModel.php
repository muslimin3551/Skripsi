<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ItemModel extends Model
{
    protected $table      = 'tbl_item';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'title', 
        'description',
        'rate',
        'qty',
        'tax',
        'updated_at', 
        'created_at',
        'is_deleted'
    ];
}
