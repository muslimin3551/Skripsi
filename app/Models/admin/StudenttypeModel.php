<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StudenttypeModel extends Model
{
    protected $table      = 'tbl_student_type';
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
