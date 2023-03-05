<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StudentModel extends Model
{
    protected $table      = 'tbl_student';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = [
        'class_id', 
        'student_type_id',
        'nis',
        'name',
        'gender',
        'address',
        'brd_date',
        'password',
        'token',
        'updated_at', 
        'created_at',
        'is_deleted'
    ];
}
