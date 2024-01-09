<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        $this->UserModel  = new UserModel();
    }

    public function dataUser()
    {
        $idUser = session()->get('nik');
        // dd($idUser);
        $data = [
            'title' => 'Setting Profile',
            'data_user' => $this->UserModel->getdataUser($idUser)
        ];
        return view('auth/edit_profile', $data);
        return view('layout/sidebar', $data);
        return view('layout/template', $data);
    }

    public function editUser()
    {
        $password = [
            'password' => sha1($this->request->getPost('password'))
        ];

        $konfirmasi_password = [
            'password' => sha1($this->request->getPost('konfirmasi_password'))
        ];

        $data = [
            'nik' =>  session()->get('nik'),
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'password' => $password,
            'password' => $konfirmasi_password
        ];

        if ($data && $password != $konfirmasi_password) {
            $pesan = [
                'stts' => false,
                'msg' => 'Password dan konfimasi password tidak sama!'
            ];
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('User/dataUser');
        } elseif ($data && $password == $konfirmasi_password) {
            $pesan = $this->UserModel->geteditUser($data, $password, $konfirmasi_password);
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('User/dataUser');
        }
    }
}
