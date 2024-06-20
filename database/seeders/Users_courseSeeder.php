<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\UsersCourse;

class Users_courseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UsersCourse::create(['courses_id' => 1, 'users_id' => 1]);
        UsersCourse::create(['courses_id' => 2, 'users_id' => 1]);
        
        UsersCourse::create(['courses_id' => 3, 'users_id' => 2]);
        UsersCourse::create(['courses_id' => 4, 'users_id' => 2]);
        
        UsersCourse::create(['courses_id' => 5, 'users_id' => 3]);
        UsersCourse::create(['courses_id' => 6, 'users_id' => 3]);
        
        UsersCourse::create(['courses_id' => 7, 'users_id' => 4]);
        UsersCourse::create(['courses_id' => 8, 'users_id' => 4]);
        
        UsersCourse::create(['courses_id' => 9, 'users_id' => 5]);
        UsersCourse::create(['courses_id' => 10, 'users_id' => 5]);        

    }
}
