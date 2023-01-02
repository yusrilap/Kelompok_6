<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Staff;
use App\Models\Master\Position;
use App\Models\Master\Departement;
use App\Models\Roles;
use App\Models\Users;

class StaffController extends Controller
{
    public function index()
    {
        $data['staff'] = Staff::all();
        $data['count'] = Staff::count();
        return view('master.staff.index', $data);
    }

}
