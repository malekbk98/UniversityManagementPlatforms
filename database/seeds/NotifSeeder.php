<?php

use Illuminate\Database\Seeder;
use App\Notif;

class NotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Notif::class, 200)->create();

    }
}
