<?php

use Illuminate\Database\Seeder;
use App\Classe;
class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Classe::class, 10)->create();  
    }
}
