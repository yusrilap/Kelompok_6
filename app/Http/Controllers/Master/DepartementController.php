<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Departement;

class DepartementController extends Controller
{
    public function __invoke(Request $request)
    {
        //
    }

    public function index()
    {
        $data['departement'] = Departement::all();
        $data['count'] = Departement::count();
        return view('master.departement.index', $data);
    }
    public function create()
    {
        return view('master.departement.create', ['title'=>'Tambah Departement']);
    }

}
