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
      DB::table('zones')->insert([
          'nom' => 'Parking'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Restaurants'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Entrada'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Infantilandia'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Aqualandia'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Mexic'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Asia'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Oceania'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Antartida'
      ]);
      DB::table('zones')->insert([
          'nom' => 'Africa'
      ]);
    }
}
