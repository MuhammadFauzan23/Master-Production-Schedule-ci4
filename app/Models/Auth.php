<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{

    // public function __construct()
    // {
    //     $this->load->library('form_validation');
    // }

    public function index()
    {
        // $this->form_validation->set_rules('username', 'trim|required|valid_username');
        // $this->form_validation->set_rules('password', 'trim|required');
        // if ($this->form_validation->run == false) {
        return view('auth/v_login');
        // }
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi !!!'
                ]
            ]
        ])) {
            //jika data valid 
            $auth    = new AuthModel();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $auth->login($username, sha1($password));
            if ($cek) {
                session()->set('log', true);
                session()->set('nik', $cek['nik']);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['username']);
                session()->set('fullname', $cek['fullname']);
                session()->set('privilege', $cek['privilege']);
                session()->set('position', $cek['position']);

                //return redirect()->to('auth/dashboard'); digantikan ke filter.php pada config pada setingan afte
            } else {
                session()->setFlashdata('pesan_salah', 'Username atau password salah !!!');
                return redirect()->to('auth/index');
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('auth/index');
        }
    }

    function register()
    {
        $auth    = new AuthModel();

        //$data['variabel'] = $auth->METHOD PADA MODEL();
        $data['privilegeID'] = $auth->getPrivilegeID(); //dropdown pada privilege
        $data['positionID'] = $auth->getPositionID(); //dropdown pada position
        $data['deptID'] = $auth->getDeptID(); //dropdown pada departmen
        return view('auth/v_register', $data);
    }

    function logout()
    {
        session()->remove('log');
        session()->remove('fullname');
        session()->remove('username');
        session()->setFlashdata('pesan_logout', 'Anda telah Log Out !!!');
        return redirect()->to('auth');
    }
}
