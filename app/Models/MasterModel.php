<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
    // +------------------------------------------------------------------+
    // +------------------------------------------------------------------+
    // |    Dibawah ini adalah kumpulan Model untuk mengatur data" user   |
    // +------------------------------------------------------------------+
    // +------------------------------------------------------------------+

    public function getdataMasterUser()
    {
        return  $this->db->table('tblweb_users')
            ->join('tblsysuserposition', 'tblsysuserposition.iduserposition = tblweb_users.position')
            ->join('tblweb_privilege', 'tblweb_privilege.id = tblweb_users.privilege')
            ->get()->getResultArray();
    }

    public function getdataPrivilege()
    {
        return $this->db->table('tblweb_privilege')->get()->getResultArray();
    }

    public function getdataPosition()
    {
        return $this->db->table('tblsysuserposition')->get()->getResultArray();
    }

    public function getMenu()
    {
        $data = [
            'stts' => true,
            'smg' => "Data menu...!",
            'menu' => $this->db->table('tblweb_menu')->get()->getResultArray(),
            'subMenu' => $this->db->table('tblweb_submenu')
                ->select('tblweb_submenu.*,tblweb_menu.menu')
                ->join('tblweb_menu', 'tblweb_menu.id =tblweb_submenu.menu_id')
                ->get()->getResultArray(),
        ];
        return $data;
    }

    public function getaddUser($data)
    {
        $this->db->table('tblweb_users')->insert($data);
        $pesan = [
            'stts' => true,
            'msg' => "Data berhasil ditambahkan!"
        ];
        return $pesan;
    }

    public function geteditUser($data, $nik)
    {
        $this->db->table('tblweb_users')->where(['nik' => $nik])->update($data);
        $pesan = [
            'stts' => true,
            'msg' => "Data berhasil diubah!"
        ];
        return $pesan;
    }

    public function deleteUser($iduser)
    {
        $this->db->table('tblweb_users')->where(['nik' => $iduser])->delete();
        $pesan = [
            'stts' => true,
            'msg' => 'Data berhasil dihapus'
        ];
        return $pesan;
    }

    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------

    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+
    // |    Dibawah ini adalah kumpulan Model untuk mengatur Menu dan Sub Menu pada sidebar   |
    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+     

    public function add_menu_submenu($data, $stts)
    {
        if ($stts == "menu") {
            $this->db->table('tblweb_menu')->insert($data);
            $pesan = [
                'stts' => true,
                'msg' => "Data menu di tambahkan!",
            ];
        } elseif ($stts == "submenu") {
            $this->db->table('tblweb_submenu')->insert($data);
            $pesan = [
                'stts' => true,
                'msg' => "Data sub menu di tambahkan!",
            ];
        }
        return $pesan;
    }

    public function edit_menu_submenu($data, $stts, $id)
    {
        if ($stts == "menu") {
            $this->db->table('tblweb_menu')->where(['id' => $id])->update($data);
            $pesan = [
                'stts' => true,
                'msg' => "Data menu di update!",
            ];
        } elseif ($stts == "submenu") {
            $this->db->table('tblweb_submenu')->where(['id' => $id])->update($data);
            $pesan = [
                'stts' => true,
                'msg' => "Data sub menu di update!",
            ];
        }
        return $pesan;
    }

    public function hapus_menu_submenu($id, $stts)
    {

        if ($stts == "menu") {
            $this->db->table('tblweb_menu')->where(['id' => $id])->delete();
            $this->db->table('tblweb_submenu')->where(['menu_id' => $id])->delete();
            $pesan = [
                'stts' => true,
                'msg' => "Data menu dan sub menu yang berhubungan di hapus!",
            ];
        } elseif ($stts == "submenu") {
            $this->db->table('tblweb_submenu')->where(['id' => $id])->delete();
            $pesan = [
                'stts' => true,
                'msg' => "Data sub menu di hapus!",
            ];
        }

        return $pesan;
    }
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------


    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+
    // |     Dibawah ini adalah kumpulan Model untuk mengatur Role dan hak akses pengguna     |
    // +--------------------------------------------------------------------------------------+
    // +--------------------------------------------------------------------------------------+    

    public function getRole()
    {
        return $this->db->table('tblweb_privilege')->get()->getResultArray();
    }

    public function editRole($data, $id)
    {
        $this->db->table('tblweb_privilege')->where(['id' => $id])->update($data);
        $pesan = [
            'stts' => true,
            'msg' => "data telah di update...!",
        ];
        return $pesan;
    }

    public function addRole($data)
    {
        $this->db->table('tblweb_privilege')->insert($data);
        $pesan = [
            'stts' => true,
            'msg' => "data telah di tambah...!",
        ];
        return $pesan;
    }

    public function hapusRole($id)
    {
        $this->db->table('tblweb_privilege')->where(['id' => $id])->delete();
        $pesan = [
            'stts' => true,
            'msg' => "data telah di hapus...!",
        ];
        return $pesan;
    }

    public function roleAjax($data)
    {
        $result = $this->db->table('tblweb_aksesmenu')->where(['privilege_id ' => $data['privilege_id'], 'menu_id' => $data['menu_id']])->get()->getRowArray();
        if ($result) {
            $this->db->table('tblweb_aksesmenu')->where($data)->delete();
            $pesan = ['stts' => true, 'msg' => 'data di tambahkan'];
        } else {
            $this->db->table('tblweb_aksesmenu')->insert($data);
            $pesan = ['stts' => true, 'msg' => 'data di hapuskan'];
        }
        return $pesan;
    }

    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------
}
