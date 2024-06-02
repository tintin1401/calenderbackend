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
        Course::create(['initials'=>'TM3200','name'=>'Database design','description'=>'This course covers everything from the fundamentals of data modeling to the implementation and optimization of databases in various database management systems.','credits'=>'4','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM4100','name'=>'Interactive Application Development','description'=>'The course is focused on the fundamentals of interactive application development.','credits'=>'4','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM4200','name'=>'Security in Interactive Applications','description'=>'This is designed to provide students with a deep understanding of the essential principles and practices for securing interactive applications against cyber threats.','credits'=>'3','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM4300','name'=>'Oral English for Computer Science','description'=>'This course focuses on technical vocabulary, specific terminology, and communicative situations typical of the technological and IT environment.','credits'=>'3','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM4400','name'=>'Moving Image','description'=>'The course is designed to provide students with a deep understanding of digital design focused on animation and audiovisual content creation.','credits'=>'3','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM4500','name'=>'Graphic Design for Multimedia Technology','description'=>'In this course, students will learn to apply graphic design principles to various multimedia platforms, including websites, mobile applications and videos.','credits'=>'3','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM5100','name'=>'Interactive Application Development II','description'=>'The course focuses on developing interactive applications using an object-oriented programming language.','credits'=>'4','modality'=>'Low virtual']);
        Course::create(['initials'=>'TM5300','name'=>'English Reading for Computer Science','description'=>'This is a practical course of moderate difficulty aimed at providing students with the opportunity to engage with written texts in English.','credits'=>'3','modality'=>'Bimodal']);
        Course::create(['initials'=>'TM5400','name'=>'Interactive Application Engineering"','description'=>'This course will provide students with a comprehensive understanding of the fundamental principles, practices, and tools used in software testing.','credits'=>'3','modality'=>'Virtual']);
        Course::create(['initials'=>'TM5500','name'=>'Web Design','description'=>"Every day, we interact with and use a variety of devices, which is why there's an increasingly digital interaction that people have with various technologies and applications.",'credits'=>'3','modality'=>'Low virtual']);
    }
}
