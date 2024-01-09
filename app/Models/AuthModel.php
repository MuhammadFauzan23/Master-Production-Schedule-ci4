<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'tblweb_users';
    protected $primaryKey = 'nik';

    function login($username, $password, $stts_login_1)
    {
        return $this->db->table('tblweb_users')->where(['username' => $username, 'password' => $password, 'enable_login' => $stts_login_1])
            ->select('tblweb_users.*, tblweb_privilege.privilege_name , tblweb_privilege.id AS privilege_id, ')
            ->join('tblweb_privilege', 'tblweb_privilege.id = tblweb_users.privilege')
            ->join('tblsysuserposition', 'tblsysuserposition.iduserposition = tblweb_users.position')
            ->get()->getRowArray();
    }

    function cek_login($username, $password, $stts_login_2)
    {
        return $this->db->table('tblweb_users')->where(['username' => $username, 'password' => $password, 'enable_login' => $stts_login_2])
            ->select('tblweb_users.*, tblweb_privilege.privilege_name , tblweb_privilege.id AS privilege_id, ')
            ->join('tblweb_privilege', 'tblweb_privilege.id = tblweb_users.privilege')
            ->join('tblsysuserposition', 'tblsysuserposition.iduserposition = tblweb_users.position')
            ->get()->getRowArray();
    }

    function getPrivilegeID()
    {
        return $this->db->table('tblweb_privilege')->get()->getResultArray();
    }

    function getPositionID()
    {
        return $this->db->table('tblsysuserposition')->get()->getResultArray();
    }

    function getDeptID()
    {
        return $this->db->table('tblfile_dept')->get()->getResultArray();
    }
}
