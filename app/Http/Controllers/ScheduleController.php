<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Master\Staff;
use App\Models\Master\Keterangan;

class ScheduleController extends Controller
{
    public function index()
    {
        $data['schedule'] = Schedule::all();
        $data['count'] = Schedule::count();
        return view('schedule.index', $data);
    }


}
