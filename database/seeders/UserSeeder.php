<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create(['name'=>'Daniel','email'=>'daniel749@gmail.com','password'=>'qwerty','carnet'=>'C24503','user_type_id'=>'3']);
        User::create(['name'=>'Clara','email'=>'clara87@gmail.com','password'=>'q1w2e3r4t5y6','carnet'=>'C12064','user_type_id'=>'3']);
        User::create(['name'=>'Michael','email'=>'michael290@gmail.com','password'=>'qpzm290.','carnet'=>'C15572','user_type_id'=>'3']);
        User::create(['name'=>'Violet','email'=>'vi9220@gmail.com','password'=>'vi0L3t2024','carnet'=>'B90832','user_type_id'=>'3']);
        User::create(['name'=>'Seth','email'=>'noname000@gmail.com','password'=>'zo0dm.2@lSht','carnet'=>'C20888','user_type_id'=>'3']);
    }
}
