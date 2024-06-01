<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::create(['initials'=>'TM5100','name'=>'Desarrollo de Aplicaciones Interactivas II','description'=>'El  curso está orientado al desarrollo de aplicaciones interactivas mediante el uso de un lenguaje de programación orientado a objetos.','credits'=>'4','modality'=>'Bajo Virtual']);
        Course::create(['initials'=>'TM5300','name'=>'Lectura en Inglés para Informática','description'=>'Este es un curso de naturaleza práctica, de dificultad media que pretende brindar a los y las estudiantes la oportunidad de acercarse a textos escritos en Inglés.','credits'=>'3','modality'=>'Bimodal']);
        Course::create(['initials'=>'TM5400','name'=>'Ingeniería de Aplicaciones Interactivas','description'=>'Este curso proporcionará a los estudiantes una comprensión integral de los principios fundamentales, prácticas y herramientas utilizadas en las pruebas de software.','credits'=>'3','modality'=>'Virtual']);
        Course::create(['initials'=>'TM5500','name'=>'Diseño de Sitios Web','description'=>'A diario se manipulan y se convive con una variedad de dispositivos, por ello, se refiere a una interacción cada vez más digital que las personas tienen con diversas tecnologías y aplicaciones.','credits'=>'3','modality'=>'Bajo Virtual']);
    }
}
