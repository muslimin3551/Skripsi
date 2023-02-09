<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ClassModel extends Model
{
    protected $table      = 'tbl_class';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'title', 
        'description',
        'created_at',
        'updated_at', 
        'is_deleted'
    ];
}
