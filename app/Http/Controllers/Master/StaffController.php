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

    public function create()
    {
        $data['title'] = "Tambah Staff";
        $data['position'] = Position::all();
        $data['roles'] = Roles::all();
        $data['departement'] = Departement::all();
        return view('master.staff.create', $data);
    }

    public function store(Request $request)
    {   
        // dd($request->all());
        $request->validate([
            'name'=>'required|max:100',
            'birth'=>'required|date',
            'startdate'=>'required|date',
            'phone'=>'required|max:13',
            'position_id'=>'required',
            'departement_id'=>'required',
            'addres'=>'required',
        ]);
    }


}
