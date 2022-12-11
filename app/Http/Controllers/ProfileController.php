<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master\Staff;
use App\Models\Master\Position;
use App\Models\Roles;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $data['staff'] = Staff::findOrFail(Auth::user()->staff->id ?? '');
        return view('profile.index', $data);
    }

}
