<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class incidencies extends TestCase
{
  use RefreshDatabase;

  /** @setUp for database seeding */
      public function setUp(): void
      {
          parent::setUp();
          $this->artisan('migrate:fresh');
          $this->seed('RolsTableSeeder');
          $this->seed('HorarisTableSeeder');
          $this->seed('DadesEmpleatSeeder');
          $this->seed('UsersTableSeeder');
      }
  /**Test*/
    public function testExample()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

      $this->actingAs($user)
        ->get('gestio/incidencies')
        ->assertStatus(200);
    }

    public function crear_incidencia()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

    	$zona = $factory(\App\Zona::class)->create([
        'nom' => 'suicidi',
      ]);

    	$this->actingAs($user)
        ->get('gestio/incidencies')
        ->assertSee('suicidi')
    		->assertStatus(200);
    }


    public function llistar_noExisteZona()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();


    	$this->actingAs($user)
        ->get('gestio/incidencies/999999/edit')
    		->assertStatus(404);
    }

    public function zones_buides()
    {
      $user = \App\User::where('email', 'pacoramon@univeylandia-parc.cat')->first();

      DB::table('incidencies')->truncate();

      $this->actingAs($user)
        ->get('gestio/incidencies')
        ->assertStatus(404);
    }

}
