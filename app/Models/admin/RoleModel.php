<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RoleModel extends Model
{
    protected $table      = 'tbl_role';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['title', 'description','updated_at', 'is_deleted'];
}
