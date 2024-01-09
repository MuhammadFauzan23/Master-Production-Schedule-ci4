<?php
function cek_mold($id)
{
    $db = \Config\Database::connect();

    $data = $db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();
    if ($data['change_mould'] == "NO") {
        echo "";
    } else {
        echo "checked";
    }
}

function cek_view($id)
{
    $db = \Config\Database::connect();
    $result = $db->table('tblfile_form_release')->where(['idform_release' => $id])->get()->getRowArray();
    if ($result) {
        return "<i class='fas fa-eye'></i>";
    } else {
        return "<i class='fas fa-eye-slash'></i>";
    }
}

function cek_data_list($aktif)
{
    if ($aktif == 1) {
        return "<i class='fas fa-eye'></i>";
    } else {
        return "<i class='fas fa-eye-slash'></i>";
    }
}

function cek_tampil($aktif)
{
    if ($aktif == 1) {
        return "<i class='fas fa-eye'></i>";
    } else {
        return "<i class='fas fa-eye-slash'></i>";
    }
}

function get_list($id)
{
    $db = \Config\Database::connect();
    $data = $db->table('tblfile_form')->where(['gabung' => $id])->get()->getResultArray();
    if ($data) {
        return $data;
    } else {
        return '';
    }
}

function  run_join($id)
{

    $db = \Config\Database::connect();

    $data = $db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();
    if ($data['tgl'] != "YES") {
        echo "";
    } else {
        echo "checked";
    }
}

function cek_akses($role_id, $menu_id)
{
    $db = \Config\Database::connect();

    $result = $db->table('tblweb_aksesmenu')->where(['privilege_id ' => $role_id, 'menu_id' => $menu_id])->get()->getRowArray();
    if ($result != null) {
        return "checked='checked'";
    }
}
