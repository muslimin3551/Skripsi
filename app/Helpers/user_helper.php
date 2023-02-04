<?php

use App\Models\Admin\RoleModel as RoleModel;

function get_role_name($id)
{
    $role = new RoleModel();
    $role_data = $role->where('id', $id)->first();
    return $role_data['title'];
}
