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

    public function create()
    {
        $data['title'] = "Buat cuti";
        $data['staff'] = Staff::all();
        return view('cuti.create', $data);
    }

    public function store(Request $request)
    {   
        $msg = [
            'staff_id.unique' => 'Staff ini sudah cuti, jika ingin melakukan cuti hapus data cuti lama.',
        ];
        $request->validate([
            'staff_id'=>'required|unique:tb_cuti',
            'estimasi'=>'required',
            'keterangan'=>'required',
        ], $msg);

        $estimasi = explode(" ", $request->estimasi);
        $started_at = date('Y-m-d', strtotime($estimasi[0]));
        $finished_at = date('Y-m-d', strtotime($estimasi[2]));

        $startTimeStamp = strtotime($started_at);
        $endTimeStamp = strtotime($finished_at);
        $timeDiff = abs($endTimeStamp - $startTimeStamp);
        $numberDays = $timeDiff/86400;  // 86400 hitungan per hari
        // konversi ke bilangan
        $numberDays = intval($numberDays);

        $request->request->add([
            'tgl_mulai' => $started_at,
            'tgl_selesai' => $finished_at,
            'jumlah_cuti' => $numberDays
        ]);

        if($numberDays > 30)
        {
            $message = [
                'alert-type'=>'error',
                'message'=> 'Permohonan cuti ('.$numberDays.' hari) melebihi durasi yang dizinkan. Durasi cuti maksimal 30 hari'
            ];  
        }
        else
        {
            Cuti::create($request->all());

            $message = [
                'alert-type'=>'success',
                'message'=> 'Permohonan cuti created successfully'
            ];  
        }

        
        return redirect()->route('cuti.index')->with($message);
    }
}
