<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Position;

class PositionController extends Controller
{
    public function __invoke(Request $request)
    {

    }

    public function index()
    {
        return view('master.position.index', ['position'=>Position::all(), 'count'=>Position::count()]);
    }

    public function create()
    {
        return view('master.position.create', ['title'=>'Tambah Position']);
    }
}
