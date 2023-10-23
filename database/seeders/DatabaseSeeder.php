<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Student::factory()->times(5)->create();

        Subject::factory()
            ->times(5)
            ->hasAttached(Student::factory()->count(2))
            ->create()
            ->each(function ($subject) {
                $subject->teachers()->associate(Teacher::factory()->create());
            });
    }
}
