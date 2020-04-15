<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DepartementSeeder::class);
        $this->call(ClasseSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(TeacherAttendanceSeeder::class);

        $this->call(StudentAttendanceSeeder::class);


    }
}
