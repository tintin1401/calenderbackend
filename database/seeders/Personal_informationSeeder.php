<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Personal_information;

class Personal_informationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Personal_Information::create(['gender'=>'Male','physical_activity'=>'Yes','sleep_hours'=>'6 to 8 hours.','diseases'=>'No','users_id'=>'1']);
        Personal_Information::create(['gender'=>'Female','physical_activity'=>'Yes','sleep_hours'=>'6 to 8 hours.','diseases'=>'No','users_id'=>'2']);
        Personal_Information::create(['gender'=>'Male','physical_activity'=>'No','sleep_hours'=>'Less than 4 hours.','diseases'=>'Yes','users_id'=>'3']);
        Personal_Information::create(['gender'=>'Female','physical_activity'=>'No','sleep_hours'=>'4 to 6 hours.','diseases'=>'No','users_id'=>'4']);
        Personal_Information::create(['gender'=>'Male','physical_activity'=>'Yes','sleep_hours'=>'More than 8 hours.','diseases'=>'No','users_id'=>'5']);
    }
}
