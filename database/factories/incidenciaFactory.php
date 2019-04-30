<?php

use Faker\Generator as Faker;

$factory->define(App\Incidencia::class, function (Faker $faker) {
  return[

        'titol' => $faker->name,
        'descripcio' => $faker->name,
        'id_prioritat' => 1,
        'id_estat' => 1,
        'id_usuari_reportador' => 3,
        'id_usuari_assignat' => 4,

  ];
});
