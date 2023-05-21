<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use App\Models\CourseType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        $categories = CourseCategory::all();
        $types = CourseType::all();
        $courses = [];

        // foreach ($categories as $key => $category) {
        //     foreach ($types as $i => $type) {
        //         array_push($courses, [
        //             'category_id' => $category->category_name,
        //             'type_id' => $type->type_name,
        //             'image' => 'course-2.jpg',
        //             'price' => 
        //             'discount' => 
        //             'after_discount' => 
        //             'priority' => 
        //         ])
        //     }
        // }

           $courses[0] = [
                    'category_id' => $categories[0]->category_name,
                    'type_id' => $types[0]->type_name,
                    'image' => 'course-1.jpg',
                    'price' => 
                    'discount' => 
                    'after_discount' => 
                    'priority' => 
           ];
        }
    }
}
