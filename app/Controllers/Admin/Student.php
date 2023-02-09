<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StudentModel as AdminStudentModel;
use App\Models\Admin\ClassModel as AdminClassModel;
use App\Models\Admin\StudenttypeModel as AdminStudentTypeModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Student extends BaseController
{
    public function __construct()
    {
        helper('AdminUserHelper');
    }
    public function index()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $data['title'] = 'STUDENT';
            $student = new AdminStudentModel();
            $data['student'] = $student->findAll();
            return view('admin/student/index', $data);
        }
    }

    //--------------------------------------------------------------------------

    public function create()
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $class = new AdminClassModel();
            $data['class'] = $class->findAll();
            $student_type = new AdminStudentTypeModel();
            $data['student_type'] = $student_type->findAll();
            // tampilkan form create
            $data['title'] = "ADD STUDENT";

            return view('admin/student/create', $data);
        }
    }
    public function add()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nis'          => 'required|is_unique[tbl_student.nis]',
            'name'          => 'required',
            'password'      => 'required|min_length[6]|max_length[200]',
            'confpassword'  => 'matches[password]'
        ];

        if ($this->validate($rules)) {
            $model = new AdminStudentModel();
            $data = [
                'nis'               => $this->request->getVar('nis'),
                'class_id'          => $this->request->getVar('class_id'),
                'student_type_id'   => $this->request->getVar('student_type_id'),
                'name'              => $this->request->getVar('name'),
                'gender'            => $this->request->getVar('gender'),
                'address'           => $this->request->getVar('address'),
                'brd_date'          => $this->request->getVar('brd_date'),
                'password'          => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            $session = session();
            $session->setFlashdata('msg_succes', 'data user berhasil di simpan!');
            return redirect()->to('admin/student');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            $data['validation'] = $this->validator;
            $data['title'] = "ADD STUDENT";
            echo view('admin/student/create', $data);
        }
    }

    //--------------------------------------------------------------------------

    public function edit($id)
    {
        if (!session()->get('admin_logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/admin/login');
        } else {
            $session = session();
            $data['name'] = $session->get('name');
            // ambil artikel yang akan diedit
            $student = new AdminStudentModel();
            $data['student'] = $student->where('id', $id)->first();
            $class = new AdminClassModel();
            $data['class'] = $class->findAll();
            $student_type = new AdminStudentTypeModel();
            $data['student_type'] = $student_type->findAll();

            // lakukan validasi data mahasiswa
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'id' => 'required',
                'name' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if ($isDataValid) {
                $student->update($id, [
                    "nis" => $this->request->getPost('nis'),
                    "class_id" => $this->request->getPost('class_id'),
                    "student_type_id" => $this->request->getPost('student_type_id'),
                    "name" => $this->request->getPost('name'),
                    "gender" => $this->request->getPost('gender'),
                    "address" => $this->request->getPost('address'),
                    "brd_date" => $this->request->getPost('brd_date'),
                    "updated_at" => date('Y-m-d hh:mm:ss'),
                ]);
                $session = session();
                $session->setFlashdata('msg_succes', 'data  telah berhasil di update!');
                return redirect('admin/student');
            }

            // tampilkan form edit
            $data['title'] = "EDIT STUDENT";
            echo view('/admin/student/edit', $data);
        }
    }
    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $student = new AdminStudentModel();
        $session = session();
        $session->setFlashdata('msg_succes', 'data telah berhasil di hapus!');
        $student->delete($id);
        return redirect('admin/student');
    }
}
