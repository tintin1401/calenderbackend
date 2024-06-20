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
        Activity::create(['name'=>'Task 01','description'=>'Create an entity-relationship diagram based on the statement seen in class.','image'=>'imagen1.jpg','date'=>'2024-06-29','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'1','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Research #1','description'=>'Conduct a brief investigation about the following topics.','image'=>'imagen2.jpg','date'=>'2024-07-09','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'1','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 01','description'=>'Develop the landing page attached in the file using HTML and CSS.','image'=>'imagen3.jpg','date'=>'2024-08-05','hour'=>'23:00:00','labels_id'=>'2','courses_id'=>'2','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 02','description'=>'Replicate the login section of the website attached in the file.','image'=>'imagen4.jpg','date'=>'2024-07-15','hour'=>'23:00:00','labels_id'=>'2','courses_id'=>'2','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Lab 01','description'=>'Complete the proposed questions based on the material covered in class on SQL Injection attacks.','image'=>'imagen5.jpg','date'=>'2024-09-11','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'3','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 02','description'=>'Provide a summary about the XSS attack.','image'=>'imagen6.jpg','date'=>'2024-07-18','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'3','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Forum #1','description'=>'Add a brief description about yourself, your name, your age, where you live, and your hobbies.','image'=>'imagen7.jpg','date'=>'2024-08-05','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'4','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task #1','description'=>'Complete the practice provided about verb tenses.','image'=>'imagen8.jpg','date'=>'2024-08-07','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'4','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 03','description'=>'Complete the exercise proposed below in After Effects.','image'=>'imagen9.jpg','date'=>'2024-09-15','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'5','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 04','description'=>'Apply one of the animation concepts seen in class to a video.','image'=>'imagen10.jpg','date'=>'2024-07-20','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'5','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Forum 01','description'=>'Define in your own words what graphic design is.','image'=>'imagen7.jpg','date'=>'2024-08-12','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'6','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Task 05','description'=>'Create a poster about the ExpoMedia.','image'=>'imagen12.jpg','date'=>'2024-09-25','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'6','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Challenge #1','description'=>'Add the necessary Tailwind classes for the attached design. Use the template image as a reference.','image'=>'imagen17.jpg','date'=>'2024-08-13','hour'=>'11:59:00','labels_id'=>'2','courses_id'=>'7','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Lab #1','description'=>"Use the visual guide image 'guia-componentes-ui.jpg' as a reference and implement the necessary code (HTML, CSS, and JS) to display the components shown there.",'image'=>'imagen14.jpg','date'=>'2024-09-09','hour'=>'08:00:00','labels_id'=>'2','courses_id'=>'7','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Typographical Clues Practice','description'=>'Watch a video about a recipe like this one. Follow this link: https://www.allrecipes.com/video/623/basic-crepes/. Then answer the following questions.','image'=>'imagen15.jpg','date'=>'2024-07-4','hour'=>'18:00:00','labels_id'=>'2','courses_id'=>'8','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'I Project Advance 2,5%','description'=>'students in the course have to choose one of the following options for the completion of the group project.','image'=>'imagen16.jpg','date'=>'2024-08-09','hour'=>'17:00:00','labels_id'=>'2','courses_id'=>'8','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Lab 08','description'=>'Carefully watch the following video about the Test Review Process based on the ISTQB Foundation certification.','image'=>'imagen17.jpg','date'=>'2024-10-05','hour'=>'23:50:00','labels_id'=>'2','courses_id'=>'9','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Lab 09','description'=>'Carefully watch the following video about the White Box Testing Process based on the ISTQB Foundation certification.','image'=>'imagen18.jpg','date'=>'2024-10-10','hour'=>'23:50:00','labels_id'=>'2','courses_id'=>'9','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Write an essay.','description'=>'Write an essay establishing the differences between web design and web programming.','image'=>'imagen19.jpg','date'=>'2024-11-04','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'10','categories_id'=>'2','status_activities_id'=>'1']);
        Activity::create(['name'=>'Activity 1: Create a design system.','description'=>'Create a user profile or profiles and develop a concept.','image'=>'imagen20.jpg','date'=>'2024-10-06','hour'=>'23:59:00','labels_id'=>'2','courses_id'=>'10','categories_id'=>'2','status_activities_id'=>'1']);

    }
}
