<?php

use App\Models\Admin\RoleModel as RoleModel;
use App\Models\Admin\ClassModel as ClassModel;

function get_role_name($id)
{
    $role = new RoleModel();
    $role_data = $role->where('id', $id)->first();
    return $role_data['title'];
}
function get_class_name($id)
{
    $class = new ClassModel();
    $class_data = $class->where('id', $id)->first();
    return $class_data['title'];
}
