<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{

    public function index()
    {
        return view('auth/v_login');
    }

    public function login()
    {
        if ($this->validate([
            'username' => [
                'label'  => 'username',
                'rules'  => 'required',
            ],
            'password' => [
                'label'  => 'password',
                'rules'  => 'required',
            ]
        ])) {
            //jika data valid
            $auth    = new AuthModel();
            $stts_login_1 = "aktif";
            $stts_login_2 = "blokir";
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek1 = $auth->login($username, sha1($password), $stts_login_1);
            $cek2 = $auth->cek_login($username, sha1($password), $stts_login_2);
            if ($cek1) {
                session()->set('log', true);
                session()->set('nik', $cek1['nik']);
                session()->set('username', $cek1['username']);
                session()->set('password', $cek1['username']);
                session()->set('fullname', $cek1['fullname']);
                session()->set('privilege', $cek1['privilege']);
                session()->set('position', $cek1['position']);
                $data_session = [
                    'role'     => $cek1['position'] == "Administrator" ? 111 : $cek1['privilege_id'] . $cek1['position'],
                ];
                session()->set($data_session);
                $pesan = [
                    'stts' => true,
                    'msg' => 'Selamat datang di MPS App!'
                ];
                session()->setFlashdata('pesan', $pesan);
            } elseif ($cek2) {
                $pesan = [
                    'stts' => false,
                    'msg' => 'Akun anda sudah ditutup!'
                ];
                session()->setFlashdata('pesan', $pesan);
                return redirect()->to('auth/index');
            } else {
                $pesan = [
                    'stts' => false,
                    'msg' => 'Username atau password anda salah!'
                ];
                session()->setFlashdata('pesan', $pesan);
                return redirect()->to('auth/index');
            }
        } else {
            //jika tidak valid
            $pesan = [
                'stts' => false,
                'msg' => 'Username dan password tidak boleh kosong!'
            ];
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('auth/index');
        }
    }

    function logout()
    {
        session()->remove('log');
        session()->remove('fullname');
        session()->remove('username');
        $pesan = [
            'stts' => true,
            'msg' => 'Terima kasih!'
        ];
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('auth');
    }
}
