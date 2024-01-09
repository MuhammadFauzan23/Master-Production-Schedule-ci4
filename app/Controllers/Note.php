<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\NoteModel;

class Note extends BaseController
{
    public function __construct()
    {
        $this->note = new NoteModel();
    }
    public function viewnote()
    {
        $data = [
            'title' => 'Note EPS',
            'note_list' => $this->note->getNoteAll()
        ];
        return view('schedule_eps/planner/list_note', $data);
        return view('schedule_eps/planner/list_release', $data);
    }

    public function addnote()
    {
        $date =  date("d-m-Y", strtotime($this->request->getPost('date')));
        $array = [
            'info' => $this->request->getVar('info') ? $this->request->getVar('info') : "kosong",
        ];
        $data = [
            'message' => $this->request->getVar('msg'),
            'information' => json_encode($array),
            'tgl' => $date,
            'created_date' => date('Y-m-d H:i:s'),
        ];
        $pesan = $this->note->Addnote($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('note/viewnote');
    }

    public function edit_note()
    {
        $id = $this->request->getVar('id');

        $array = [
            'shift_pagi' => $this->request->getVar('shift_pagi') ? $this->request->getVar('shift_pagi') : "kosong",
            'flash_pagi' => $this->request->getVar('flash_pagi') ? $this->request->getVar('flash_pagi') : "kosong",
            'shift_second' => $this->request->getVar('shift_second') ? $this->request->getVar('shift_second') : "kosong",
            'flash_second' => $this->request->getVar('flash_second') ? $this->request->getVar('flash_second') : "kosong",
            'shift_malam' => $this->request->getVar('shift_malam') ? $this->request->getVar('shift_malam') : "kosong",
            'flash_malam' => $this->request->getVar('flash_malam') ? $this->request->getVar('flash_malam') : 'kosong',
        ];
        $data = [
            'message' => $this->request->getVar('msg'),
            'note' => json_encode($array),
            'tgl' => $this->request->getVar('date'),
            'updated_date' => date('Y-m-d H:i:s'),
            'updated_by' => session()->get('nik')
        ];
        $pesan = $this->ModelNote->Updatenote($id, $data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('note/viewnote');
    }

    public function delete_note()
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));
        $pesan = $this->ModelNote->Deletenote($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('note/viewnote');
    }

    public function tampilkan_note()
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));
        $pesan = $this->ModelNote->tampilkannote($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('note/viewnote');
    }
}
