<?php

namespace App\Models;

use CodeIgniter\Model;

class MaintenanceModel extends Model
{
    protected $table = 'tblfile_form_maintenance';
    protected $primarykey = 'idmaintenance';

    public function getMachine()
    {
        $query = "SELECT * FROM tblfile_machine WHERE idmachine LIKE 'E-%' ";
        $pesan = [
            'stts' => false,
            'msg' => "anda tidak memiliki akses untuk ini...!",
            'machine' => $this->db->query($query)->getResultArray(),
            'fg' => $this->db->table('tblmas_finishgood')->where(['stsactive' => '1'])->limit(1000)->get()->getResultArray(),
        ];

        return $pesan;
    }

    public function getMainten()
    {
        return $this->db->table("tblfile_form_maintenance")->get()->getResultArray();
    }

    public function getMaintenRelease() //rilis data
    {
        if ($data_form['view_maintenance'] = 1) {
            $rilis = $this->db->table('tblfile_form_release')->get()->getResultArray();
            foreach ($rilis as $rilis) {
                $idmenten = $rilis['id_maintenance'];
                $query = "SELECT * FROM tblfile_form_maintenance JOIN tblfile_form_release ON tblfile_form_release.id_maintenance = tblfile_form_maintenance.idmaintenance WHERE tblfile_form_maintenance.view_maintenance = 1";

                return $this->db->query($query)->getResultArray();
            }
        }
    }


    public function Addmain($data)
    {
        $this->db->table('tblfile_form_maintenance')->insert($data);

        $pesan = [
            'stts' => true,
            'msg'  => 'data telah ditambahkan....!',
        ];
        return $pesan;
    }

    public function Deletemain($id)
    {
        $this->db->table('tblfile_form_maintenance')->where(['idmaintenance' => $id])->delete();
        $pesan = [
            'stts' => true,
            'msg'  => 'data telah dihapus....!',
        ];
        return $pesan;
    }

    public function editMain($data)
    {
        $this->db->table('tblfile_form_maintenance')
            ->where(['idmaintenance' => $data['idmaintenance']])
            ->update($data);

        $pesan = [
            'stts' => true,
            'msg'  => 'data telah diubah....!',
        ];
        return $pesan;
    }



    public function tampilkanmaintenance($id)
    {
        $data = $this->db->table('tblfile_form_maintenance')->where(['idmaintenance' => $id])->get()->getRowArray();

        if ($data['view_maintenance'] == "1") {
            $this->db->table('tblfile_form_maintenance')->where(['idmaintenance' => $id])->update(['view_maintenance' => 0]);
            $pesan = [
                'stts' => true,
                'msg' => "Data telah disembunyikan dari tampilan....!",
            ];
        } else {
            $this->db->table('tblfile_form_maintenance')->where(['idmaintenance' => $id])->update(['view_maintenance' => 1]);

            $pesan = [
                'stts' => true,
                'msg' => "Data telah ditampilkan kembali....!",
            ];
        }
        return $pesan;
    }
}
