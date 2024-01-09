<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MasterModel;
use CodeIgniter\HTTP\Request;

class Master extends BaseController
{
    public function __construct()
    {
        $this->master = new MasterModel();
    }

    // +------------------------------------------------------------------+
    // +------------------------------------------------------------------+
    // | Dibawah ini adalah kumpulan controller untuk mengatur data" user |
    // +------------------------------------------------------------------+
    // +------------------------------------------------------------------+

    public function viewUser()
    {
        $data = [
            'title' => 'Master User',
            'master_user' => $this->master->getdataMasterUser(),
            'data_privilege' => $this->master->getdataPrivilege(),
            'data_position' => $this->master->getdataPosition(),
        ];
        return view('master/list_master_user', $data);
    }

    public function addUser()
    {
        $date = date("d-m-Y H:i:s");
        $data = [
            'nik' => $this->request->getPost('nik'),
            'username' => $this->request->getPost('username'),
            'password' => sha1($this->request->getPost('username')),
            'fullname' => $this->request->getPost('fullname'),
            'privilege' => $this->request->getPost('privilege'),
            'position' => $this->request->getPost('position'),
            // 'level_app' => $this->request->getPost('level_app'),
            'dept' => $this->request->getPost('dept') ? $this->request->getPost('dept') : "",
            'enable_login' => $this->request->getPost('enable_login'),
            'stamp_name' => $this->request->getPost('username'),
            'created_date' => $date,
            'created_by' => session()->get('username')
        ];

        $pesan = $this->master->getaddUser($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('Master/viewUser');
    }

    public function editUser()
    {
        $date = date("d-m-Y H:i:s");
        $nik = $this->request->getPost('nik');
        $password = [
            'password' => sha1($this->request->getPost('password'))
        ];

        $konfirmasi_password = [
            'password' => sha1($this->request->getPost('konfirmasi_password'))
        ];

        $data = [
            'username' => $this->request->getPost('username'),
            'fullname' => $this->request->getPost('fullname'),
            'privilege' => $this->request->getPost('privilege'),
            'position' => $this->request->getPost('position'),
            // 'level_app' => $this->request->getPost('level_app'),
            'dept' => $this->request->getPost('dept') ? $this->request->getPost('dept') : "",
            'enable_login' => $this->request->getPost('enable_login'),
            'password' => $password,
            'password' => $konfirmasi_password,
            'updated_date' => $date,
            'updated_by' => session()->get('username')
        ];

        if ($nik && $data && $password != $konfirmasi_password) {
            $pesan = [
                'stts' => false,
                'msg' => 'Password dan konfimasi password tidak sama!'
            ];
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('Master/viewUser');
        } elseif ($nik && $data && $password == $konfirmasi_password) {
            $pesan = $this->master->geteditUser($data, $nik);
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('Master/viewUser');
        }
    }

    public function deleteUser()
    {
        $iduser = $this->request->getVar('id');
        $pesan = $this->master->deleteUser($iduser);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('Master/viewUser');
    }

    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------


    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+
    // | Dibawah ini adalah kumpulan controller untuk mengatur Menu dan Sub Menu pada sidebar |
    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+

    public function menu_submenu()
    {
        $bite = $this->master->getMenu();
        $data = [
            'title' => 'Master Menu & Sub Menu',
            'menu' => $bite['menu'],
            'sub_menu' => $bite['subMenu'],
        ];
        return view('master/list_master_menu', $data);
    }

    public function add_menu_submenu()
    {
        $stts = $this->request->getVar('stts');
        if ($stts == "menu") {
            $data = [
                'menu' => $this->request->getPost('nama_menu'),
                'app' => "web 1",
                'icon' => "fa-" . $this->request->getPost('code_icon'),
                'stts' => "true",
            ];
            $pesan = $this->master->add_menu_submenu($data, $stts);
        } elseif ($stts == "submenu") {
            $data = [
                'menu_id' => $this->request->getVar('menu_id'),
                'sub_menu' => $this->request->getVar('sub_menu'),
                'url' => $this->request->getVar('url'),
                'stts' => "true",
            ];
            $pesan = $this->master->add_menu_submenu($data, $stts);
        }
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('Master/menu_submenu');
    }

    public function edit_menu_submenu()
    {

        $id = $this->request->getVar('id');
        $stts = $this->request->getVar('data');
        if ($stts == "menu") {
            $data = [
                'menu' => $this->request->getVar('menu'),
                'app' => "web 1",
                'icon' => $this->request->getVar('logo_user'),
                'stts' =>  $this->request->getVar('stts'),
            ];
            $pesan = $this->master->edit_menu_submenu($data, $stts, $id);
        } elseif ($stts == "submenu") {
            $data = [
                'menu_id' => $this->request->getVar('menu_id'),
                'sub_menu' => $this->request->getVar('sub_menu'),
                'url' => $this->request->getVar('url'),
                'stts' => $this->request->getVar('stts'),
            ];
            $pesan = $this->master->edit_menu_submenu($data, $stts, $id);
        }
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('Master/menu_submenu');
    }

    public function hapus_menu_submenu()
    {
        $id = $this->request->getVar('id');
        $stts = $this->request->getVar('stts');

        if ($stts == "menu") {
            $pesan = $this->master->hapus_menu_submenu($id, $stts);
        } elseif ($stts == "submenu") {
            $pesan = $this->master->hapus_menu_submenu($id, $stts);
        }

        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('Master/menu_submenu');
    }

    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------


    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+
    // |   Dibawah ini adalah kumpulan controller untuk mengatur Role dan hak akses pengguna  |
    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+    

    public function PositionUser()
    {
        $data = [
            'title' => 'Master Role',
            'role' => $this->master->getRole(),
            'data_privilage' => $this->master->getdataPrivilege(),
            'data_position' => $this->master->getdataPosition(),
        ];
        return view('master/list_master_role', $data);
    }

    public function roleUser()
    {

        $id = $this->request->getVar('id');
        $bite = $this->master->getMenu();
        $data = [
            'title' => 'User Access Permissions',
            'menu' => $bite['menu'],
            'id' => $id

        ];
        return view('Master/list_master_role_menu', $data);
    }

    public function role_aksi()
    {
        $id = $this->request->getVar('id');
        $stts = $this->request->getVar('stts');
        if ($stts == 'edit') {
            $data = ['privilege_name' => $this->request->getVar('role')];
            $pesan = $this->master->editRole($data, $id);
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('master/roleUser');
        } elseif ($stts == 'delete') {
            $pesan = $this->master->hapusRole($id);
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('master/PositionUser');
        } elseif ($stts == "add") {
            $data = ['privilege_name' => $this->request->getVar('role')];
            $pesan = $this->master->addRole($data);
            session()->setFlashdata('pesan', $pesan);
            return redirect()->to('master/roleUser');
        } elseif ($stts == "roleAjax") {
            $data = [
                'privilege_id' => $this->request->getVar('id_role'),
                'menu_id' => $this->request->getVar('menu_id')
            ];
            $pesan = $this->master->roleAjax($data);

            echo json_encode($pesan);
        }
    }
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
}
