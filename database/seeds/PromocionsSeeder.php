<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str as Str;

class PromocionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      $slug = Str::slug('Promoció Estiu Families');

      
        DB::table('promocions')->insert([
            'titol' => 'Promoció Estiu Families',
            'descripcio' => '
                          <p>
                        Aprofita si vens en familia i fes mostra el DNI o algun carnet identificatiu al comprar els tickets per a beneficiarte d´un 15% de descompte en els tickets dels menors de 16 anys!</p>

                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promociogeneral.jpg',
            'slug' => $slug
        ]);

      $slug = Str::slug('Promoció per a grups');

        DB::table('promocions')->insert([
            'titol' => 'Promoció per a grups',
            'descripcio' => '

                          <p>Si vens en grup de 6 o més persones et regalem una entrada! Pagueu 5 i entreu 6! (Promoció vàlida només durant juny i juliol).
                          </p>
                          ',
            'id_usuari' => 1,
            'path_img' => '/storage/promocions/promocio-2.png',
            'slug' => $slug
        ]);


    }
}
