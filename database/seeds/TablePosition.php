<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Position;

class TablePosition extends Seeder
{
    public function run()
    {
        $position = [
            ['name'=>'Operator', 'status'=>'Staff', 'salary'=>3000000],
            ['name'=>'WD', 'status'=>'Staff', 'salary'=>5000000],
            ['name'=>'Dosen', 'status'=>'Staff', 'salary'=>3500000],
        ];
        foreach($position as $row)
        {
            Position::create($row);
        }
    }
}
