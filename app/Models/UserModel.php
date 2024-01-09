<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    public function getdataUser($idUser)
    {
        $query = "SELECT tblweb_users.*, tblsysuserposition.*, tblweb_privilege.* FROM tblweb_users 
                    JOIN tblsysuserposition ON tblsysuserposition.iduserposition = tblweb_users.position
                        JOIN tblweb_privilege ON tblweb_privilege.id = tblweb_users.privilege
                            WHERE tblweb_users.nik = '$idUser'";
        return $this->db->query($query)->getResultArray();
    }

    public function geteditUser($data)
    {
        $nik = session()->get('nik');
        $this->db->table('tblweb_users')
            ->where(['nik' => $nik])
            ->update($data);
        $pesan = [
            'stts' => true,
            'msg' => "data berhasil di ubah!",
        ];
        return $pesan;
    }
}
