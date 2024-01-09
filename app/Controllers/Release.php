<?php

namespace App\Controllers;

use App\Models\ReleaseModel;
use App\Models\ScheduleModel;
use App\Models\NoteModel;
use App\Models\MaintenanceModel;


class Release extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $this->form = new ReleaseModel();
        $this->form1 = new ScheduleModel();
    }

    public function viewrelease()
    {
        $filter = date("d-m-Y", strtotime($this->request->getPost('filter_tgl')));
        $data = [
            'title' => 'Release Schedule EPS',
            'data_release' => $this->form->release($filter),
            'data_holiday' => $this->form1->getdataHoliday(),

        ];
        $data['data_note_release'] = $this->form->release_note($filter);
        $data['data_maintenance_release'] = $this->form->release_maintenance($filter);
        // dd($data);
        return view('schedule_eps/planner/list_release', $data);
    }

    public function release_data() //update tgl buat rilis
    {
        $tgl = date("d-m-Y", strtotime($this->request->getPost('tanggal')));

        $pesan = $this->form->data_release($tgl);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
}
