<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Activity;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Activity::create(['name'=>'Challenge #1','description'=>'Agregue las clases necesarias de Tailwind para el diseño adjunto. Utilice como referencia la imagen de la plantilla.','image'=>'placeholder.jpg','date'=>'2024-06-13','hour'=>'11:59:00','status_activities_id'=>'1','labels_id'=>'2','categories_id'=>'2']);
        Activity::create(['name'=>'Laboratorio 09','description'=>'Observe con atención el siguiente video a cerca del Proceso de Pruebas de Caja Blanca basado en la certificación ISTQB Foundation.','image'=>'placeholder.jpg','date'=>'2024-06-10','hour'=>'23:50:00','status_activities_id'=>'1','labels_id'=>'2','categories_id'=>'2']);
    }
}
