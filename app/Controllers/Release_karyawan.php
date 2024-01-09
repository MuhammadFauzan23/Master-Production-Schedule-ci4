<?php

namespace App\Controllers;

use App\Models\Releasekaryawan_Model;
use App\Models\ScheduleModel;

class Release_karyawan extends BaseController
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $this->form1 = new ScheduleModel();
        $this->form = new Releasekaryawan_Model();
    }

    public function viewreleasekaryawan()
    {
        $filter = date("d-m-Y", strtotime($this->request->getPost('filter_tgl')));
        // dd($filter);
        if ($filter) {
            $data = [
                'title' => 'Release for Employee',
                'data_release' => $this->form->release_karyawan($filter),
                'data_holiday' => $this->form1->getdataHoliday(),
            ];
            $data['data_note_release'] = $this->form->release_note_karyawan($filter);
            $data['data_maintenance_release'] = $this->form->release_maintenance_karyawan($filter);
            return view('schedule_eps/planner/list_release_karyawan', $data);
        }
    }
}
