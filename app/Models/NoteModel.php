<?php

namespace App\Models;

use CodeIgniter\Model;

class NoteModel extends Model
{
    protected $table = 'tblfile_form_note';
    protected $primarykey = 'idnote';

    public function getNoteAll($data = null)
    {
        if (!$data) {
            return $this->db->table("tblfile_form_note")->get()->getResultArray();
        } else {
            return $this->db->table("tblfile_form_note")->where(['tgl' => $data])->get()->getResultArray();
        }
    }

    public function Addnote($data)
    {
        $this->db->table('tblfile_form_note')->insert($data);
        $pesan = [
            'stts' => true,
            'msg'  => "Data telah ditambahkan....!",
        ];
        return $pesan;
    }

    public  function Updatenote($id, $data)
    {
        $this->db->table('tblfile_form_note')->where(['idnote' => $id])->update($data);

        $pesan = [
            'stts' => true,
            'msg'  => "Data telah diubah...!",
        ];
        return $pesan;
    }

    public function Deletenote($id)
    {
        $this->db->table('tblfile_form_note')->where(['idnote' => $id])->delete();
        $pesan = [
            'stts' => true,
            'msg'  => "Data telah dihapus....!",
        ];
        return $pesan;
    }

    public function tampilkannote($id)
    {
        $data = $this->db->table('tblfile_form_note')->where(['idnote' => $id])->get()->getRowArray();

        if ($data['view_note'] == "1") {
            $this->db->table('tblfile_form_note')->where(['idnote' => $id])->update(['view_note' => 0]);
            $pesan = [
                'stts' => true,
                'msg' => "Data telah disembunyikan dari tampilan....!",
            ];
        } else {
            $this->db->table('tblfile_form_note')->where(['idnote' => $id])->update(['view_note' => 1]);

            $pesan = [
                'stts' => true,
                'msg' => "Data telah ditampilkan kembali....!",
            ];
        }
        return $pesan;
    }
}
