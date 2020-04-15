<?php

use Illuminate\Database\Seeder;
use App\StudentAttendance;

class StudentAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StudentAttendance::class, 50)->create();
    }
}
