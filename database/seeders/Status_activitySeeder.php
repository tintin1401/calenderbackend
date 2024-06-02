<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Status_activity;

class Status_activitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Status_activity::create(['status'=>'Pending']);
        Status_activity::create(['status'=>'Completed']);
    }
}
