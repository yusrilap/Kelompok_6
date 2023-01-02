<?php

use Illuminate\Database\Seeder;
use App\Models\Users;
use App\Models\Master\Staff;

class TableUsers extends Seeder
{
    public function run()
    {
        $admin = DB::table('roles')->where('name', 'admin')->get()->first()->id;
        $karyawan = DB::table('roles')->where('name', 'karyawan')->get()->first()->id;

        $user = Users::create([
            'role_id'   => $admin,
            'name'      => 'Administrator',
            'email'     => 'admin@gmail.com',
            'username'  => 'admin',
            'password'  => bcrypt('admin'),
        ]);

        $user2 = Users::create([
            'role_id'   => $karyawan,
            'name'      => 'Karyawan',
            'email'     => 'karyawan@gmail.com',
            'username'  => 'user',
            'password'  => bcrypt('user'),
        ]);
        
        // Staff::create([
        //     'users_id' => $user->id,
        //     'position_id' => 2,
        //     'departement_id' => 1,
        //     'name' => 'Yusril Azhar Permana',
        //     'birth' => date('Y-m-d'),
        //     'startdate' => date('Y-m-d'),
        //     'addres' => 'Cianjur',
        //     'addres' => null,
        // ]);
    }
}
