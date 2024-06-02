<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User_type;

class User_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User_Type::create(['name'=>'Administrative']);
        User_Type::create(['name'=>'Teacher']);
        User_Type::create(['name'=>'Student']);
    }
}
