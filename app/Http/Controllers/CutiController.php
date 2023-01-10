<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuti;
use App\Models\Master\Staff;
use Auth;

class CutiController extends Controller
{
    public function index()
    {

        if(Auth::user()->hasRole('admin'))
        {
            $data['cuti'] = Cuti::orderby('created_at', 'desc')->get();
            $data['count'] = Cuti::count();
            return view('cuti.index', $data);

        }
        else
        {
            $data['cuti'] = Cuti::where('staff_id', Auth::user()->staff->id)->get();
            $data['count'] = 1;
            return view('cuti.index', $data);
        }
    }
}
