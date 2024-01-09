<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ScheduleModel;
use App\Models\NoteModel;
use App\Models\MaintenanceModel;
use CodeIgniter\HTTP\Request;

class Schedule extends BaseController
{
    public function __construct() // Constructor
    {
        date_default_timezone_set('Asia/Jakarta'); // Zona Waktu indonesia
        $this->form  = new ScheduleModel();
        $this->ModelNote = new NoteModel();
        $this->maintenance = new MaintenanceModel();
    }

    public function dashboard() // Tampilan awal masuk MPS app
    {
        $data = ['title' => 'Dashboard EPS'];
        return view('layout/dashboard_planning', $data);
    }

    // +----------------------------------------------------------------------+
    // +----------------------------------------------------------------------+
    // | Dibawah ini adalah kumpulan controller untuk mengatur data" schedule |
    // +----------------------------------------------------------------------+
    // +----------------------------------------------------------------------+

    // +----------------------------------------------------------------------+
    public function viewform() // Tampilan data schedule
    {
        $data = [
            'title' => 'Schedule EPS',
            'schedule_list' => $this->form->getFormSchedule(),
            'data_holiday' => $this->form->getdataHoliday(),
            'mould_sz' => $this->form->getmasterMouldSize(),
            'mould_stts' => $this->form->getmasterMouldStatus(),
            'number_list' => $this->form->getMaster(),
            'mesin' => $this->form->getDataMachine(),
            'data_note' => $this->ModelNote->getNoteAll(),
            'data_fg' => $this->form->getMasFg(),
            'data_maintenance' => $this->maintenance->getMainten()
        ];

        return view('schedule_eps/planner/list_schedule', $data);
    }
    // +----------------------------------------------------------------------+
    public function viewupdate() // Tampilan edit data schedule
    {

        $idform = base64_decode(urldecode($this->request->getVar('id')));
        // dd($idform);
        $idfg   = base64_decode(urldecode($this->request->getVar('fg')));
        $stts   = base64_decode(urldecode($this->request->getVar('sts')));

        $data = [
            'title' => 'Edit Schedule EPS',
            'schedule_list' => $this->form->dataById($idform, $stts),
        ];
        $data['mould_sz'] = $this->form->getmasterMouldSize();
        $data['mould_stts'] = $this->form->getmasterMouldStatus();
        $data['number_list'] = $this->form->getMaster();
        $data['mesin'] = $this->form->getDataMachine();
        $data['data_fg'] = $this->form->getMasFg();
        $data['revno'] = $this->form->getRevno($idfg);

        return view('schedule_eps/planner/list_edit_schedule', $data);
    }
    // +----------------------------------------------------------------------+
    public function addform() // Proses tambah data schedule operasi mesin
    {
        $getCav = $this->request->getVar('cav') ? $this->request->getVar('cav') : 0;
        $nilaiCav = explode(":", $getCav);
        if (!$this->request->getPost('join')) {
            $tglKondisi =  date("d-m-Y h:i:s", strtotime($this->request->getPost('started_time')));
        } else {
            $tglKondisi = 'NO';
        }
        $op_hours = 3600 / $this->request->getPost('actual') * $nilaiCav[0];
        $total_hours_required =  $this->request->getPost('bal_rc_qty') / $nilaiCav[0] * $this->request->getPost('actual') / 3600;
        $data = [
            'idform' => $this->request->getPost('idform'),
            'tgl' => $tglKondisi,
            'gabung' => $this->request->getPost('join') ? $this->request->getPost('join') : 0,
            'urutan' => !$this->request->getPost('started_time') ?  $this->request->getPost('urutan') : 1,
            'idfg' => $this->request->getPost('fg'),
            'mc' => $this->request->getPost('machine'),
            'cav' => $nilaiCav[0],
            'rc_no' => $this->request->getPost('rc_no'),
            'rc_qty' => $this->request->getPost('rc_qty'),
            'bal_rc_qty' => $this->request->getPost('bal_rc_qty'),
            'total_hours' => $total_hours_required < 0 ? abs($total_hours_required) : number_format($total_hours_required, 2, ".", ","),
            'material' => $this->request->getPost('material'),
            'mould_size' => $this->request->getPost('mould_size'),
            'mould_status' => $this->request->getPost('mould_status'),
            'shortage_date' => $this->request->getPost('shortage_date'),
            'act' => $this->request->getPost('actual'),
            'r_c' => $this->request->getPost('rc'),
            'sec_hours' => 3600,
            'op_hours' => $op_hours,
            'change_mould' => 'NO',
            'view_form' => 1,
            'no_rev' => $this->request->getPost('no_rev'),
            'remarks' => $this->request->getPost('remarks'),
            'stts' => 'Job',
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('nik')
        ];
        $pesan = $this->form->AddformscheduleModel($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function addsampel() // Proses tambah sample data schedule operasi mesin
    {
        if (!$this->request->getPost('join')) {
            $tglKondisi =  date("d-m-Y h:i:s", strtotime($this->request->getPost('started_time')));
        } else {
            $tglKondisi = 'NO';
        }

        $op_hours = 3600 / $this->request->getPost('actual') * $this->request->getPost('cav');
        $total_hours_required =  $this->request->getPost('bal_rc_qty') / $this->request->getPost('cav') * $this->request->getPost('actual') / 3600;
        $data = [
            'idform' => $this->request->getPost('idform'),
            'tgl' => $tglKondisi,
            'gabung' => $this->request->getPost('join') ? $this->request->getPost('join') : 0,
            'urutan' => !$this->request->getPost('started_time') ?  $this->request->getPost('urutan') : 1,
            'idfg' => $this->request->getVar('fg_int_code') . ":" . $this->request->getVar('fg_gen_code'),
            'mc' => $this->request->getPost('machine'),
            'cav' => $this->request->getPost('cav'),
            'rc_no' => $this->request->getPost('rc_no'),
            'rc_qty' => $this->request->getPost('rc_qty'),
            'bal_rc_qty' => $this->request->getPost('bal_rc_qty'),
            'act' => $this->request->getPost('actual'),
            'r_c' => $this->request->getPost('rc'),
            'total_hours' => $total_hours_required < 0 ? abs($total_hours_required) : number_format($total_hours_required, 2, ".", ","),
            'material' => $this->request->getPost('material'),
            'mould_size' => $this->request->getPost('mould_size'),
            'mould_status' => $this->request->getPost('mould_status'),
            'shortage_date' => $this->request->getPost('shortage_date'),
            'sec_hours' => 3600,
            'op_hours' => $op_hours,
            'change_mould' => 'NO',
            'view_form' => 1,
            'remarks' => $this->request->getPost('remarks'),
            'stts' => 'Sampel',
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('nik')
        ];
        $pesan = $this->form->AddformscheduleModel($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function updateform() // Proses edit data list schedule operasi mesin
    {
        $total_hours_required =  $this->request->getPost('bal_rc_qty') / $this->request->getPost('cav') * $this->request->getPost('actual') / 3600;
        $op_hours = 3600 / $this->request->getPost('actual') * $this->request->getPost('cav');
        $data = array(
            'idform' => $this->request->getPost('idform'),
            'idfg' => $this->request->getPost('fg') ? $this->request->getPost('fg') :  $this->request->getPost('fg_int_code') . ":" . $this->request->getPost('fg_gen_code'),
            'rc_no' => $this->request->getPost('rc_no'),
            'act' => $this->request->getPost('actual'),
            'r_c' => $this->request->getPost('r_c'),
            'no_rev' => $this->request->getPost('no_rev'),
            'cav' => $this->request->getPost('cav'),
            'mc' => $this->request->getPost('machine'),
            'sec_hours' => 3600,
            'total_hours' => $total_hours_required < 0 ? abs($total_hours_required) : number_format($total_hours_required, 2, ".", ","),
            'op_hours' => $op_hours,
            'rc_qty' => $this->request->getPost('rc_qty'),
            'bal_rc_qty' => $this->request->getPost('bal_rc_qty'),
            'mould_size' => $this->request->getPost('mould_size'),
            'mould_status' => $this->request->getPost('mould_status'),
            'material' => $this->request->getPost('material'),
            'shortage_date' => $this->request->getPost('shortage_date'),
            'remarks' => $this->request->getPost('remarks'),
            'updated_date' => date('Y-m-d H:i:s'),
            'updated_by' => session()->get('nik')
        );
        $pesan = $this->form->UpdateformscheduleModel($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function deleteform() // Proses hapus data list schedule operasi mesin
    {
        $data = base64_decode(urldecode($this->request->getVar(('id'))));
        $pesan = $this->form->DeleteformscheduleModel($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function change_date() // Fitur ganti tgl/waktu master list sesuai route card yg dipilih
    {
        $data_jumlah = $this->request->getPost('banyak_data');
        // $pesan = [];
        for ($i = 1; $i < $data_jumlah; $i++) {
            $data = $this->request->getPost("nomor" . $i);
            if ($data) {
                $getTanggal =  date("d-m-Y h:i:s", strtotime($this->request->getPost('started_time')));
                $pesan = $this->form->getChangeDate($getTanggal, $data);
            }
        }
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function view_data_sub() // Fitur unhide/hide pada sub list data schedule 
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));
        $pesan = $this->form->getSubdata($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function view_master_data() // Fitur unhide/hide pada master list data schedule
    {
        $id = base64_decode(urldecode($this->request->getVar('id')));

        $pesan = $this->form->getMasterdata($id);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function change_list_number() // Fitur ubah urutan pada sub list data schedule yang dipilih
    {
        $dariID = $this->request->getPost('dariID');
        $noAwal = $this->request->getPost('list_awal');
        $keID = $this->request->getPost('keID');
        $pesan = $this->form->change_list($dariID, $noAwal, $keID);

        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function data_master() // Fitur menggantikan sub list data schedule yang dipilih menjadi master list data
    {
        $id = $this->request->getVar('id');
        $master = $this->request->getVar('master');
        // $rc_no = $this->request->getVar('routecardno');
        $convertTgl = date("d-m-Y H:i:s", strtotime($this->request->getPost('time')));
        // $tanggal = [
        //     'tgl' => $convertTgl
        // ];
        // dd($rc_no);

        $pesan = $this->form->setDataMaster($id, $master, $convertTgl);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewform');
    }
    // +----------------------------------------------------------------------+
    public function edit_mold() // Fitur aktifkan change mould
    {
        $id = $this->request->getPost('idform');
        $idmachine = $this->request->getPost('mc');
        $data = $this->form->editMold($id, $idmachine);
        return json_encode($data);
    }
    // +----------------------------------------------------------------------+
    public function runJoin() // Fitur aktifkan run join
    {
        $id = $this->request->getVar('idform');
        $data = $this->form->getRunJoin($id);
        return json_encode($data);
    }
    // +----------------------------------------------------------------------+


    // +------------------------------------------------------------------------+
    // +-----------------------------------------------------------------------+
    // |  Dibawah ini adalah kumpulan controller untuk mengatur tanggal libur  |
    // +-----------------------------------------------------------------------+
    // +-----------------------------------------------------------------------+

    public function viewHoliday() // Tampilan list hari libur 
    {
        $data = [
            'title' => 'Schedule EPS',
            'data_holiday' => $this->form->getdataHoliday(),
        ];

        return view('schedule_eps/planner/list_holiday', $data);
    }
    // +----------------------------------------------------------------------+
    function addlibur() //Tambah data hari libur
    {
        $data = [
            'tgl_libur' => date("d-m-Y", strtotime($this->request->getPost('tgl'))),
            'keterangan' => $this->request->getPost('hari'),
            'created_date' => date('Y-m-d H:i:s'),
            'created_by' => session()->get('nik')
        ];

        $pesan = $this->form->addharilibur($data);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewHoliday');
    }
    // +----------------------------------------------------------------------+
    function deletelibur() //Hapus data hari libur
    {
        $tgl = base64_decode(urldecode($this->request->getVar('tgl')));
        $pesan = $this->form->deleteharilibur($tgl);
        session()->setFlashdata('pesan', $pesan);
        return redirect()->to('schedule/viewHoliday');
    }
    // +----------------------------------------------------------------------+


    // +-----------------------------------------------------------------------------------------------------+
    // +-----------------------------------------------------------------------------------------------------+
    // |       Dibawah ini adalah kumpulan controller untuk data" master pada dropdown menggunakan Ajax      |
    // +-----------------------------------------------------------------------------------------------------+
    // +-----------------------------------------------------------------------------------------------------+
    function MouldSize() // Data Mould Size 
    {
        $data = $this->form->getmasterMouldSize();
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    function MouldStatus() // Data Mould Status
    {
        $data = $this->form->getmasterMouldStatus();
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    function masfg() // Data Finishgood
    {
        $data = $this->form->getMasFg();
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    function masmachine() // Data Machine EPS
    {
        $data = $this->form->getDataMachine();
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    public function cav() // Data BOM (Build Of Material)
    {
        $mas_fg = $this->request->getVar('masfg');
        $data = $this->form->getCAV($mas_fg);
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    public function list_join() // Data Master list pada schedule operasi mesin
    {
        $data = $this->form->listJoinFromMaster();
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    public function list_urutan() // Data urutan pada schedule operasi mesin
    {
        $data = $this->form->getUrutan($this->request->getVar('id'));
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
    public function material() // Data material pada modal add schedule operasi mesin
    {                          // Data ini muncul secara otomatis setelah milih BOM menggunakan Autfill
        $idform = $this->request->getVar('idform');
        $data['material'] = $this->form->getMaterial($idform);
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+


    // +----------------------------------------------------------------------+
    // +----------------------------------------------------------------------+
    // |          Dibawah ini adalah kumpulan controller untuk Ajax           |
    // +----------------------------------------------------------------------+
    // +----------------------------------------------------------------------+

    // Fitur javascript Autofill / Autocomplete 
    function ambilDataRev() // Fitur ini ada saat proses edit berlangsung pada tampilan edit
    {
        $fg = $this->request->getPost('finishgood');
        $data = $this->form->getambilDataRev($fg);
        if ($data) {
            $rev_no = "";
            $rev_no .= '<option value="0" selected>-- Select Rev No --</option>';
            foreach ($data as $d) {
                $rev_no .= '<option value=' . $d["revno"] . '>' . $d["revno"] . '</option>';
            }
        } else {
            $rev_no = "";
            $rev_no .= '<option value="0">-- No revisi tidak ada --</option>';
        }
        echo $rev_no;
    }

    function ambilDatamtr()
    {
        $rev = $this->request->getPost('Norev');
        $fg = $this->request->getPost('idfg');

        $data = $this->form->getambilDatamtr($rev, $fg);
        if ($data) {
            $data = [
                'material_desc' => $data['materialdesc'],
                'bom' => $data['ups']
            ];
        } else {
            $data = [
                'material_desc' => '',
                'bom' => ''
            ];
        }
        echo json_encode($data);
    }

    public function getmachineautoselect()
    {
        $idmachine = $this->request->getVar('machine');
        $data_mesin_select = $this->form->getmachineautoselect($idmachine);
        $data_all = $this->form->getDataMachine();
        if ($data_mesin_select) {
            $mcn = "";
            $mcn .= '<option value="0">-- Select Machine --</option>';
            foreach ($data_mesin_select as $mcn_select) {
                foreach ($data_all as $mcn_all) {
                    if ($mcn_select == $mcn_all) {
                        $mcn .= '<option selected value=' . $mcn_all["idmachine"] . '>' . 'Machine : ' . $mcn_all["idmachine"] . ' || Desc Machine : ' . $mcn_all["machinedesc"] . '</option>';
                    } else {
                        $mcn .= '<option value=' . $mcn_all["idmachine"] . '>' . 'Machine : ' . $mcn_all["idmachine"] . ' || Desc Machine : ' . $mcn_all["machinedesc"] . '</option>';
                    }
                }
                echo ($mcn);
            }
        }
    }
    // +----------------------------------------------------------------------+

    public function getmachinefromMaster() // machine akan terpilih mengikuti machine pada data master list schedule
    {
        $idmachine = $this->request->getVar('id');
        $data_mesin_select = $this->form->datamachinebyID($idmachine);
        $data_all = $this->form->getDataMachine();
        if ($data_all) {
            $mcn = "";
            foreach ($data_mesin_select as $mcn_select) {
                foreach ($data_all as $mcn_all) {
                    if ($mcn_select["mc"] == $mcn_all["idmachine"]) {
                        $mcn .= '<option selected value=' . $mcn_all["idmachine"] . '>' . 'Machine : ' . $mcn_all["idmachine"] . ' |-----| Desc Machine : ' . $mcn_all["machinedesc"] . '</option>';
                    }
                }
                echo ($mcn);
            }
        }
    }
    public function getmachine() // machine akan terpilih mengikuti machine pada data master list schedule
    {
        $data_all = $this->form->getDataMachine();
        $mcn = "";
        $mcn .= '<option value="0">-- Select Machine --</option>';
        foreach ($data_all as $mcn_all) {
            $mcn .= '<option value=' . $mcn_all["idmachine"] . '>' . 'Machine : ' . $mcn_all["idmachine"] . ' |-----| Desc Machine : ' . $mcn_all["machinedesc"] . '</option>';
        }
        echo ($mcn);
    }

    // +----------------------------------------------------------------------+
    public function getmachinefromMaster1() // machine akan terpilih mengikuti machine pada data master list schedule
    {
        $idmachinevalue = $this->request->getVar('id');
        $data_mesin_select = $this->form->datamachinebyID1($idmachinevalue);
        $data =  $data_mesin_select['mc'];
        echo json_encode($data);
    }
    // +----------------------------------------------------------------------+
}
