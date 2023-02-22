<?php

use App\Models\Admin\RoleModel as RoleModel;
use App\Models\Admin\ClassModel as ClassModel;
use App\Models\Admin\StudentModel as StudnetModel;
use App\Models\Admin\InvoiceStatusModel as InvoiceStatusModel;
use App\Models\Admin\PaymenttypeModel as AdminPaymenttypeModel;
use App\Models\Admin\InvoiceModel as AdminInvoiceModel;

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
function get_student_name($id)
{
    $student = new StudnetModel();
    $student_data = $student->where('id', $id)->first();
    return $student_data['name'];
}
function get_status_pembayaran($id)
{
    $invoice_status = new InvoiceStatusModel();
    $invoice_status_data = $invoice_status->where('id', $id)->first();
    if ($invoice_status_data['id'] == 1) {
        return '<span class="badge text-bg-danger">' . $invoice_status_data['title'] . '</span>';
    }elseif ($invoice_status_data['id'] == 2){
        return '<span class="badge text-bg-warning">' . $invoice_status_data['title'] . '</span>';
    }else{
        return '<span class="badge text-bg-success">' . $invoice_status_data['title'] . '</span>';
    }
}
function get_payement_type($id)
{
    $peyment_type = new AdminPaymenttypeModel();
    $peyment_type_data = $peyment_type->where('id', $id)->first();
    return $peyment_type_data['title'];
}
function get_invoice_number($id)
{
    $invoice = new AdminInvoiceModel();
    $invoice_data = $invoice->where('id', $id)->first();
    return $invoice_data['invoice_number'];
}
