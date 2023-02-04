<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'tbl_user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    protected $allowedFields = ['role_id', 'nip', 'name', 'email', 'gender', 'address', 'brd_date', 'password', 'created_at', 'updated_at', 'is_deleted'];
}
