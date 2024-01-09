<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function viewform()
    {
        return view('schedule_eps/planner/list_form');
    }

    public function MasterUser()
    {
        return view('master/list_master_user');
    }

    public function note()
    {
        return view('schedule_eps/planner/list_note');
    }

    public function Machinejob()
    {
        return view('schedule_eps/planner/maintenance');
    }

    public function edit_profile()
    {
        return view('schedule_eps/planner/edit_profile');
    }
}
