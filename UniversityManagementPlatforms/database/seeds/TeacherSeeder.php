<?php

use Illuminate\Database\Seeder;
use App\Teacher;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Teacher::class, 35)->create();

    }
}
