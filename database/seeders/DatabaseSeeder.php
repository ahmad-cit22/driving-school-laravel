<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call([
            RoleSeeder::class,
            SettingSeeder::class,
            BranchSeeder::class,
            UserSeeder::class,
            CourseCategorySeeder::class,
            CourseTypeSeeder::class,
            DaysSeeder::class,
            TheoryClassSeeder::class,
            CourseSeeder::class,
            FrontendSeeder::class
        ]);
    }
}
