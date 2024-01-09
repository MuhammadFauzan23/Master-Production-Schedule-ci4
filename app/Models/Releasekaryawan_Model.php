<?php

namespace App\Models;

use CodeIgniter\Model;


class Releasekaryawan_Model extends Model
{
    public function release_karyawan($filter)
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
                     (SELECT if(COUNT(tblmas_finishgood.fgweight)    >= 1, tblmas_finishgood.fgweight, null) FROM tblmas_finishgood WHERE tblmas_finishgood.idfg = tblfile_form_release.idfg_release) AS fgweight_release,
                     (SELECT if(COUNT(tblfile_mould_size.mould_size) >= 1, tblfile_mould_size.mould_size, null) from tblfile_mould_size WHERE tblfile_mould_size.id = tblfile_form_release.mould_size_release)AS mould_size_release,        
                     (SELECT  if(COUNT(tblfile_mould_status.mould_name) >= 1, tblfile_mould_status.mould_name, null) from tblfile_mould_status WHERE tblfile_mould_status.id = tblfile_form_release.mould_status_release)AS mould_status_release   	 
					 FROM tblfile_form_release WHERE tblfile_form_release.tgl_rilis = '$filter' and tblfile_form_release.idform_release = $id or tblfile_form_release.tgl_rilis = '$filter' and tblfile_form_release.gabung_release = $id";
            array_push($data, $this->db->query($query)->getResultArray());
        }
        return $data;
    }

    public function release_note_karyawan($filter)
    {
        if ($filter) {
            $note = "SELECT * FROM tblfile_form_note_release WHERE tgl_rilis = '$filter'";
            $data = $this->db->query($note)->getResultArray();

            return $data;
        }
    }

    public function release_maintenance_karyawan($filter)
    {
        if ($filter) {
            $mtn = "SELECT * FROM tblfile_form_maintenance_release WHERE tgl_rilis = '$filter'";
            $data = $this->db->query($mtn)->getResultArray();

            return $data;
        }
    }
}
