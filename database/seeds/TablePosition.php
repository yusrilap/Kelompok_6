<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Position;

class TablePosition extends Seeder
{
    public function run()
    {
        $position = [
            ['name'=>'Ketua Prodi', 'status'=>'Staff', 'salary'=>3000000],
            ['name'=>'Sekretaris Prodi', 'status'=>'Staff', 'salary'=>5000000],
            ['name'=>'Koordinator TA', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Koordinator KP', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Koordinator LAB', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Dosen Tetap', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Dosen Tidak Tetap', 'status'=>'Staff', 'salary'=>3500000],
            ['name'=>'Staf Prodi', 'status'=>'Staff', 'salary'=>3500000],

        ];
        foreach($position as $row)
        {
            Position::create($row);
        }
    }
}
