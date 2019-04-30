<?php

use Illuminate\Database\Seeder;
use App\Zona;

class ZonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                factory(Zona::class)->times(10)->create();
    }
}
