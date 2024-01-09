<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table = 'tblfile_form';
    protected $primaryKey = 'idform';

    public function getFormSchedule()
    {
        $data_form = $this->db->table('tblfile_form')->where(['urutan' => 1])->get()->getResultArray(); // data yang urutan no 1;

        $data = [];
        foreach ($data_form as $data_form) {
            $id = $data_form['idform'];
            $query =    "SELECT tblfile_form.*, 
                            (SELECT if(COUNT(tbltrn_production1.cycletime) >= 1,tbltrn_production1.cycletime,  null) FROM tbltrn_production1 
                                    WHERE tbltrn_production1.routecardno = tblfile_form.rc_no),
                            (SELECT  if(COUNT(tblmas_finishgood.fgcodegen) >= 1, tblmas_finishgood.fgcodegen, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg) AS fgcodegen,
                            (SELECT  if(COUNT(tblmas_finishgood.fgcodeint) >= 1, tblmas_finishgood.fgcodeint, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS fgcodeint,
                            (SELECT  if(COUNT(tblmas_finishgood.int_density) >= 1, tblmas_finishgood.int_density, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS int_density,      
                            (SELECT  if(COUNT(tblmas_finishgood.fgweight) >= 1, tblmas_finishgood.fgweight, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS fgweight,        
                            (SELECT  if(COUNT(tblfile_mould_size.mould_size) >= 1, tblfile_mould_size.mould_size, null) from tblfile_mould_size 
                                    WHERE tblfile_mould_size.id = tblfile_form.mould_size)AS mould_size,        
                            (SELECT  if(COUNT(tblfile_mould_status.mould_name) >= 1, tblfile_mould_status.mould_name, null) from tblfile_mould_status 
                                    WHERE tblfile_mould_status.id = tblfile_form.mould_status)AS mould_status,        
                            (SELECT SUM(tbltrnweb_prodeps1stdtl.totalqty) FROM tbltrnweb_prodeps1stdtl 
                                    WHERE tbltrnweb_prodeps1stdtl.routecardno = tblfile_form.rc_no) AS totalqty
                             
                            FROM tblfile_form WHERE tblfile_form.idform = $id OR tblfile_form.gabung = $id ORDER BY tblfile_form.urutan ASC";

            array_push($data, $this->db->query($query)->getResultArray());
        }
        return $data;
    }

    public function dataById($idform, $stts)
    {
        $data_form = $this->db->table('tblfile_form')->where(['idform' => $idform], ['stts' => $stts])->get()->getResultArray(); // data yang urutan no 1;

        $data = [];
        foreach ($data_form as $data_form) {
            $query =    "SELECT tblfile_form.*, 
                            (SELECT if(COUNT(tbltrn_production1.cycletime) >= 1,tbltrn_production1.cycletime,  null) FROM tbltrn_production1 
                                    WHERE tbltrn_production1.routecardno = tblfile_form.rc_no),
                            (SELECT  if(COUNT(tblmas_finishgood.fgcodegen) >= 1, tblmas_finishgood.fgcodegen, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg) AS fgcodegen,
                            (SELECT  if(COUNT(tblmas_finishgood.fgcodeint) >= 1, tblmas_finishgood.fgcodeint, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS fgcodeint,
                            (SELECT  if(COUNT(tblmas_finishgood.int_density) >= 1, tblmas_finishgood.int_density, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS int_density,      
                            (SELECT  if(COUNT(tblmas_finishgood.fgweight) >= 1, tblmas_finishgood.fgweight, null) from tblmas_finishgood 
                                    WHERE tblmas_finishgood.idfg = tblfile_form.idfg)AS fgweight,        
                            (SELECT SUM(tbltrnweb_prodeps1stdtl.totalqty) FROM tbltrnweb_prodeps1stdtl 
                                    WHERE tbltrnweb_prodeps1stdtl.routecardno = tblfile_form.rc_no) AS totalqty
                             
                            FROM tblfile_form WHERE tblfile_form.idform = $idform";

            array_push($data, $this->db->query($query)->getResultArray());
        }
        return $data;
    }

    public function AddformscheduleModel($data)
    {
        if ($data['urutan'] != 1) {
            $this->db->query("set @count:=" . $data['urutan']);
            $query = "UPDATE tblfile_form SET tblfile_form.urutan = @count:= @count+1 
                        WHERE tblfile_form.gabung = " . $data['gabung'] . " AND tblfile_form.urutan >= " . $data['urutan'] . " ORDER BY tblfile_form.urutan ASC";
            // dd($data);
            $this->db->query($query);
            $this->db->table('tblfile_form')->insert($data);
        } else {
            $this->db->table('tblfile_form')->insert($data);
            // dd($data);
        }

        $pesan = [
            'stts' => true,
            'msg' => "Data berhasil di tambahkan!",
        ];
        return $pesan;
    }

    public function addharilibur($data)
    {
        $this->db->table('tblmas_holiday')->insert($data);
        $pesan = [
            'stts' => true,
            'msg' => "Tanggal libur telah di tambah!",
        ];
        return $pesan;
    }

    public function deleteharilibur($tgl)
    {
        $this->db->table('tblmas_holiday')->where(['tgl_libur' => $tgl])->delete();
        $pesan = [
            'stts' => true,
            'msg' => "Tanggal libur telah di hapus!",
        ];
        return $pesan;
    }

    public function getdataHoliday()
    {
        return $this->db->table('tblmas_holiday')->get()->getResultArray();
    }

    public function UpdateformscheduleModel($data)
    {
        // dd($data);
        $this->db->table('tblfile_form')
            ->where('idform', $data['idform'])
            ->update($data);

        $pesan['stts'] = true;
        $pesan['msg'] = "Data berhasil diubah!";
        return $pesan;
    }

    public function getmasterMouldSize()
    {
        return $this->db->table('tblfile_mould_size')->get()->getResultArray();
    }

    public function getmasterMouldStatus()
    {
        return $this->db->table('tblfile_mould_status')->get()->getResultArray();
    }

    public function getMasFg()
    {
        $query = "SELECT * FROM tblmas_finishgood WHERE deptid = 'EPS' ";
        return $this->db->query($query)->getResultArray();
    }

    public function getRevno($idfg)
    {
        $query = "SELECT * FROM tblmas_bom2 where idfg = '$idfg'";
        return $this->db->query($query)->getResultArray();
    }

    public function getambilDataRev($fg)
    {
        $query = "SELECT tblmas_bom2.*, tblmas_material.* 
                        FROM tblmas_bom2 
                            JOIN tblmas_bom1 on tblmas_bom1.idfg = tblmas_bom2.idfg
                                JOIN tblmas_material on tblmas_material.idmaterial = tblmas_bom2.idmaterial
                                    WHERE tblmas_bom2.idfg = '$fg' AND tblmas_bom1.stsdefault = 1";
        return $this->db->query($query)->getResultArray();
    }

    public function getambilDatamtr($rev, $fg)
    {
        $query = "SELECT tblmas_bom2.*, tblmas_material.* 
                        FROM tblmas_bom2 
                            JOIN tblmas_bom1 on tblmas_bom1.idfg = tblmas_bom2.idfg
                                JOIN tblmas_material on tblmas_material.idmaterial = tblmas_bom2.idmaterial
                                    WHERE tblmas_bom2.revno = $rev AND tblmas_bom2.idfg = '$fg' AND tblmas_bom1.stsdefault = 1";
        return $this->db->query($query)->getRowArray();
    }

    public function getDataMachine()
    {
        $query = "SELECT * FROM `tblfile_machine` WHERE `idmachine` LIKE 'E-%' AND stsactive = 1";
        return $this->db->query($query)->getResultArray();
    }

    public function datamachinebyID($idmachine)
    {
        $data = $this->db->table('tblfile_form')->where(['idform' => $idmachine])->get()->getResultArray(); // data yang urutan no 1;
        return $data;
    }

    public function datamachinebyID1($idmachine)
    {
        return $this->db->table('tblfile_form')->where(['idform' => $idmachine])->get()->getRowArray(); // data yang urutan no 1;
    }

    public function getCAV($mas_fg)
    {
        if ($mas_fg) {
            $query = "SELECT tblmas_bom2.*, tblmas_material.* 
                        FROM tblmas_bom2 
                            JOIN tblmas_bom1 on tblmas_bom1.idfg = tblmas_bom2.idfg
                                JOIN tblmas_material on tblmas_material.idmaterial = tblmas_bom2.idmaterial
                                    WHERE tblmas_bom2.idfg = '$mas_fg' AND tblmas_bom1.stsdefault = 1";
            $data =  $this->db->query($query)->getResultArray();
        }
        return $data;
    }

    public function getmachineautoselect($idmachine)
    {
        if ($idmachine) {
            $query = "SELECT * FROM `tblfile_machine` WHERE `idmachine` LIKE 'E-%' AND stsactive = 1 and idmachine = '$idmachine'";
            $data = $this->db->query($query)->getResultArray();
        }
        return $data;
    }

    public function getMaterial($idform = null)
    {
        if ($idform) {
            $data = $this->db->table("tblmas_material")->where(['idmaterial' => $idform])->get()->getRowArray();
        } else {
            $data = $this->db->table("tblmas_material")->get()->getResultArray();
        }

        return $data;
    }

    public function listJoinFromMaster()
    {
        $query =
            "SELECT tblfile_form.material, tblfile_form.*, 
				(SELECT  if(COUNT(tblmas_finishgood.fgcodegen) >= 1, tblmas_finishgood.fgcodegen,null) 
 					from tblmas_finishgood where tblmas_finishgood.idfg = tblfile_form.idfg)AS fgcodegen,
 
 				(SELECT  if(COUNT(tblmas_finishgood.fgcodeint) >= 1, tblmas_finishgood.fgcodeint,null) 
 					from tblmas_finishgood where tblmas_finishgood.idfg = tblfile_form.idfg)AS fgcodeint,

			    (SELECT tbltrn_production1.cycletime FROM tbltrn_production1 
				 	WHERE tbltrn_production1.routecardno = tblfile_form.rc_no) as rc_no,

			    (SELECT tbltrn_production1.idmaterial FROM tbltrn_production1 
				 	WHERE tbltrn_production1.routecardno = tblfile_form.rc_no) as idmaterial

				FROM tblfile_form WHERE tblfile_form.urutan= 1 ORDER BY tblfile_form.urutan ASC";
        return $this->db->query($query)->getResultArray();
    }

    public function getUrutan($id)
    {
        return $this->db->table('tblfile_form')->select('urutan')->where(['gabung' => $id])->orderBy('urutan', 'ASC')->get()->getResultArray();
    }

    public function getMaster()
    {
        $query = "SELECT * FROM tblfile_form  WHERE urutan = 1";
        return $this->db->query($query)->getResultArray();
    }

    public function getSubdata($id)
    {
        $data = $this->db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();

        if ($data['view_form'] == "1") {
            $this->db->table('tblfile_form')->where(['idform' => $id])->update(['view_form' => 0]);
            $pesan = [
                'stts' => true,
                'msg' => "Sub data disembunyikan...!",
            ];
        } else {
            $this->db->table('tblfile_form')->where(['idform' => $id])->update(['view_form' => 1]);

            $pesan = [
                'stts' => true,
                'msg' => "Sub data di tampilkan kembali!",
            ];
        }
        return $pesan;
    }

    public function getMasterdata($id)
    {
        $data = $this->db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();
        if ($data['view_form'] == "1") {
            $this->db->table('tblfile_form')->where(['idform' => $id])->orwhere(['gabung' => $id])->update(['view_form' => 0]);
            $pesan = [
                'stts' => true,
                'msg' => "Master data disembunyikan...!",
            ];
        } else {
            $this->db->table('tblfile_form')->where(['idform' => $id])->orwhere(['gabung' => $id])->update(['view_form' => 1]);
            $pesan = [
                'stts' => true,
                'msg' => "Data master  ditampilkan kembali!",
            ];
        }
        return $pesan;
    }

    public function DeleteformscheduleModel($data)
    {
        $cek = $this->db->table('tblfile_form')->where(['idform' => $data])->get()->getRowArray();
        $master = $cek['gabung'];
        $this->db->table('tblfile_form')->where(['idform' => $data])->delete();
        $this->db->table('tblfile_form')->where(['gabung' => $data])->delete();
        if ($cek['urutan'] != 1) {
            $this->db->query("set @count:=1");
            $this->db->query("UPDATE tblfile_form SET tblfile_form.urutan=@count:=@count+1 WHERE tblfile_form.gabung = $master ORDER BY tblfile_form.urutan");
        }

        $pesan = [
            'stts' => true,
            'msg' => "Data telah di hapus...!",
        ];

        return $pesan;
    }

    public function editMold($id, $idmachine)
    {
        $form = $this->db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();
        $mould = $this->db->table('tblmas_stdtime')->where(['idmachine' => $idmachine])->get()->getRowArray();

        $hours1 = $form['total_hours'] + $mould['std_time_chgmold'];
        $hours2 = $form['total_hours'] - $mould['std_time_chgmold'];

        if ($form['change_mould'] == 'NO') {
            $this->db->table('tblfile_form')
                ->where(['idform' => $id])
                ->update(['change_mould' => 'YES', 'total_hours' => $hours1]);
            $data = [
                'stts' => true,
                'msg' => "Change Mould diaktifkan!"
            ];
        } else if ($form['change_mould'] == 'YES') {
            $this->db->table('tblfile_form')
                ->where(['idform' => $id])
                ->update(['change_mould' => 'NO', 'total_hours' => $hours2]);
            $data = [
                'stts' => false,
                'msg' => "Change Mould dimatikan!"
            ];
        }
        return $data;
    }

    public function getRunJoin($id)
    {
        $cek = $this->db->table('tblfile_form')->where(['idform' => $id])->get()->getRowArray();
        if ($cek['tgl'] == "NO") {
            $this->db->table('tblfile_form')
                ->where(['idform' => $id])
                ->update(['tgl' => 'YES']);
            $data = [
                'stts' => true,
                'msg' => "Running join diaktifkan!"
            ];
        } else {
            $this->db->table('tblfile_form')
                ->where(['idform' => $id])
                ->update(['tgl' => 'NO']);
            $data = [
                'stts' => true,
                'msg' => "Running join dimatikan!"
            ];
        }
        return $data;
    }

    public function change_list($dariID, $noAwal, $keID)
    {
        $ke = explode(":", $keID);
        $data =  $this->db->table('tblfile_form')->where(['idform' => $dariID])->get()->getRowArray();

        if ($data['urutan'] != 1) {
            $this->db->table('tblfile_form')->where(['idform' => $dariID])->update(['urutan' => $ke[1]]);
            $this->db->table('tblfile_form')->where(['idform' => $ke[0]])->update(['urutan' => $noAwal]);
        }

        $pesan = [
            'stts' => true,
            'msg' => "Urutan data berhasil di ganti!",
        ];
        return $pesan;
    }

    public function getChangeDate($getTanggal, $data)
    {
        $pesan = $this->db->table("tblfile_form")->where(['rc_no' => $data])->update(['tgl' => $getTanggal]);
        $pesan = [
            'stts' => true,
            'msg' => "Tanggal data master berhasil diubah!",
        ];
        return $pesan;
    }

    public function setDataMaster($id, $master, $tanggal)
    {
        $this->db->table('tblfile_form')->where(['idform' => $master])->delete();
        $this->db->table('tblfile_form')->where(['idform' => $id])->update([
            'idform' => $master,
            'tgl' => $tanggal,
            'gabung' => 0,
            'urutan' => 1
        ]);

        $this->db->query("set @count:=1");
        $this->db->query("UPDATE tblfile_form SET tblfile_form.urutan=@count:=@count+1 WHERE tblfile_form.gabung = $master ORDER BY tblfile_form.urutan");

        $pesan = [
            'stts' => true,
            'msg' => "Berhasil dijadikan Data Master!",
        ];

        return $pesan;
    }
}
