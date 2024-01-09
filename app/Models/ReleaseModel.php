<?php

namespace App\Models;

use CodeIgniter\Model;


class ReleaseModel extends Model
{
    public function release($filter)
    {
        $rilis_form = $this->db->query("SELECT * FROM tblfile_form_release WHERE urutan_release = 1 AND tgl_rilis = '$filter'")->getResultArray();
        $data = [];
        foreach ($rilis_form as $rilis_form) {
            $id = $rilis_form['idform_release'];
            $query = "SELECT tblfile_form_release.*,
                     (SELECT if(COUNT(tbltrn_production1.cycletime)  >= 1, tbltrn_production1.cycletime,  null) FROM tbltrn_production1 WHERE tbltrn_production1.routecardno = tblfile_form_release.rc_no_release),
                     (SELECT if(COUNT(tblmas_finishgood.fgcodegen)   >= 1, tblmas_finishgood.fgcodegen, null) FROM tblmas_finishgood WHERE tblmas_finishgood.idfg = tblfile_form_release.idfg_release) AS fgcodegen_release,
                     (SELECT if(COUNT(tblmas_finishgood.fgcodeint)   >= 1, tblmas_finishgood.fgcodeint, null) FROM tblmas_finishgood WHERE tblmas_finishgood.idfg = tblfile_form_release.idfg_release) AS fgcodeint_release,
                     (SELECT if(COUNT(tblmas_finishgood.int_density) >= 1, tblmas_finishgood.int_density, null) FROM tblmas_finishgood WHERE tblmas_finishgood.idfg = tblfile_form_release.idfg_release) AS int_density_release,      
                     (SELECT if(COUNT(tblmas_finishgood.fgweight)    >= 1, tblmas_finishgood.fgweight, null) FROM tblmas_finishgood WHERE tblmas_finishgood.idfg = tblfile_form_release.idfg_release) AS fgweight_release 	 
					 FROM tblfile_form_release WHERE tblfile_form_release.tgl_rilis = '$filter' and tblfile_form_release.idform_release = $id or tblfile_form_release.tgl_rilis = '$filter' and tblfile_form_release.gabung_release = $id";
            array_push($data, $this->db->query($query)->getResultArray());
        }
        return $data;
    }

    public function release_note($filter)
    {
        if ($filter) {
            $note = "SELECT * FROM tblfile_form_note_release WHERE tgl_rilis = '$filter'";
            $data = $this->db->query($note)->getResultArray();
            return $data;
        }
    }

    public function release_maintenance($filter)
    {
        if ($filter) {
            $mtn = "SELECT * FROM tblfile_form_maintenance_release WHERE tgl_rilis = '$filter'";
            $data = $this->db->query($mtn)->getResultArray();
            return $data;
        }
    }


    //---------------------------------------------------------------------------------------------------------------------------------------------------------

    public function data_release($tgl)
    {
        $data_rilis = $this->db->table('tblfile_form_release')->where(['tgl_rilis' => $tgl])->countAllResults();
        if ($data_rilis >= 1) {
            $this->db->table('tblfile_form_release')->where(['tgl_rilis' => $tgl])->delete();
            $form_rilis = "INSERT INTO tblfile_form_release(
                idform_release, tgl_release, gabung_release, urutan_release, idfg_release, 
                mc_release, cav_release, rc_no_release, rc_qty_release, bal_rc_qty_release, 
                act_release, r_c_release, total_hours_release, material_release, mould_size_release, 
                mould_status_release, shortage_date_release, sec_hours_release, op_hours_release, 
                change_mould_release, remarks_release, stts_release, tgl_rilis, release_by)

                SELECT  idform, tgl, gabung, urutan, idfg, mc, cav, rc_no, rc_qty, bal_rc_qty, 
                act, r_c, total_hours, material, mould_size, mould_status, shortage_date, sec_hours, 
                op_hours, change_mould, remarks, stts, '" . $tgl . "', '" . session()->get('nik') . "'
                FROM tblfile_form WHERE view_form = 1";
            $this->db->query($form_rilis);
        } else {
            $form_rilis = "INSERT INTO tblfile_form_release(
                idform_release, tgl_release, gabung_release, urutan_release, idfg_release, 
                mc_release, cav_release, rc_no_release, rc_qty_release, bal_rc_qty_release, 
                act_release, r_c_release, total_hours_release, material_release, mould_size_release, 
                mould_status_release, shortage_date_release, sec_hours_release, op_hours_release, 
                change_mould_release, remarks_release, stts_release, tgl_rilis, release_by)

                SELECT  idform, tgl, gabung, urutan, idfg, mc, cav, rc_no, rc_qty, bal_rc_qty, 
                act, r_c, total_hours, material, mould_size, mould_status, shortage_date, sec_hours, 
                op_hours, change_mould, remarks, stts, '" . $tgl . "', '" . session()->get('nik') . "'
                FROM tblfile_form WHERE view_form = 1";
            $this->db->query($form_rilis);
        }

        $data_note_rilis = $this->db->table('tblfile_form_note_release')->where(['tgl_rilis' => $tgl])->countAllResults();
        if ($data_note_rilis >= 1) {
            $this->db->table('tblfile_form_note_release')->where(['tgl_rilis' => $tgl])->delete();
            $form_note = "INSERT INTO tblfile_form_note_release(idnote_release, message_release, note_release, tgl_release, tgl_rilis, release_by) 
                        SELECT idnote, message, note, tgl, '" . $tgl . "', '" . session()->get('nik') . "' FROM tblfile_form_note WHERE view_note = 1";
            $this->db->query($form_note);
        } else {
            $form_note = "INSERT INTO tblfile_form_note_release(idnote_release, message_release, note_release, tgl_release, tgl_rilis, release_by) 
                        SELECT idnote, message, note, tgl, '" . $tgl . "', '" . session()->get('nik') . "' FROM tblfile_form_note WHERE view_note = 1";
            $this->db->query($form_note);
        }

        $data_maintenance_rilis = $this->db->table('tblfile_form_maintenance_release')->where(['tgl_rilis' => $tgl])->countAllResults();
        if ($data_maintenance_rilis >= 1) {
            $this->db->table('tblfile_form_maintenance_release')->where(['tgl_rilis' => $tgl])->delete();
            $form_mtn = "INSERT INTO tblfile_form_maintenance_release(idmaintenance_release, machine_release, tgl_release, tgl_rilis, release_by) 
                        SELECT idmaintenance, machine, tgl, '" . $tgl . "', '" . session()->get('nik') . "' FROM tblfile_form_maintenance WHERE view_maintenance = 1";
            $this->db->query($form_mtn);
        } else {
            $form_mtn = "INSERT INTO tblfile_form_maintenance_release(idmaintenance_release, machine_release,tgl_release, tgl_rilis, release_by) 
                        SELECT idmaintenance, machine, tgl, '" . $tgl . "', '" . session()->get('nik') . "' FROM tblfile_form_maintenance WHERE view_maintenance = 1";
            $this->db->query($form_mtn);
        }

        $pesan = [
            'stts' => true,
            'msg' => "Data berhasil dirilis....!",
        ];
        return $pesan;
    }
}
