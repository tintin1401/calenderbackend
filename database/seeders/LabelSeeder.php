<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Label::create(['name'=>'Evento']);
        Label::create(['name'=>'Tarea']);
        Label::create(['name'=>'Comunicado']);
    }
}
