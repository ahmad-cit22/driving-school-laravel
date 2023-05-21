<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $categories = [
            [
                'category_name' => 'Car (Manual)',
                'image' => 'image-1.jpg',
            ],
            [
                'category_name' => 'Car (Auto)',
                'image' => 'image-2.jpg',
            ],
            [
                'category_name' => 'Bike',
                'image' => 'image-3.jpg',
            ],
            [
                'category_name' => 'Scooter',
                'image' => 'image-4.jpg'
            ]
        ];
        foreach ($categories as $category) {
            CourseCategory::create($category);
        }
    }
}
