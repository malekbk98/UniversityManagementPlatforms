<?php

use Illuminate\Database\Seeder;
use App\Departement;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Departement::class, 5)->create();
    }
}
