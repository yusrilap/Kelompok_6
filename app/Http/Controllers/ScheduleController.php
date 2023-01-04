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

        if ($request->has('makeUserAccount')) {
            $msg = [
                'username.min' => 'Username harus terdiri dari minimal 6 karakter.',
                'username.unique' => 'Username sudah digunakan.'
            ];
            $request->validate([
                'username' => 'required|string|min:6|max:255|unique:users',
                'role_id' => 'required|integer',
            ], $msg);

            $user = Users::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->username),
                'role_id' => $request->role_id
            ]);
            $request->request->add(['users_id' => $user->id]);
        }

        Staff::create($request->all());

        $message = [
            'alert-type'=>'success',
            'message'=> 'Data staff created successfully'
        ];
        return redirect()->route('master.staff.index')->with($message);
    }
}
