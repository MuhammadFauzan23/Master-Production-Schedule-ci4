<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\MaintenanceModel;

class Maintenance extends BaseController
{
    public function __construct()
    {
        $this->maintenance = new MaintenanceModel();
    }

    public function viewmaintenance()
    {
        $bite = $this->maintenance->getMachine();
        $data = [
            'title' => 'Maintenance Machine',
            'data_maintenance' => $this->maintenance->getMainten(),
            'mesin' => $bite['machine'],
        ];
        return view('schedule_eps/planner/list_maintenance', $data);
    }

    public function add_maintenance()
    {
        $date =  date("d-m-Y", strtotime($this->request->getVar('date')));
        $data = [
            'tgl' => $date,
            'machine' => $this->request->getVar('machine'),
            'view_maintenance' => 1,
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('nik')
        ];

        $pesan = $this->maintenance->AddMain($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('maintenance/viewmaintenance');
    }

    public function edit_maintenance()
    {
        $data = [
            'idmaintenance' => $this->request->getPost('id'),
            'tgl' => $this->request->getPost('date'),
            'machine' => $this->request->getPost('machine'),
            'updated_date' => date('Y-m-d H:i:s'),
            'updated_by' => session()->get('nik')
        ];

        $pesan = $this->maintenance->editMain($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('maintenance/viewmaintenance');
    }

    public function delete_maintenance()
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));
        $pesan = $this->maintenance->DeleteMain($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('maintenance/viewmaintenance');
    }

    public function tampilkan_maintenance()
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));
        $pesan = $this->maintenance->tampilkanmaintenance($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('maintenance/viewmaintenance');
    }


    public function getMain()
    {
        $data = $this->maintenance->getMainten();
        echo json_encode($data);
    }
}
