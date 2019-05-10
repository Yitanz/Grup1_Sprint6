<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Incidencia;
use App\User;

class incidenciaTest extends DuskTestCase
{

    
    /**
     * A Dusk test example.
     * @test
     * @return void
     */

    public function test_usuari_envia_incidencia()
    {

        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->click('button[type="submit"]')
                ->visit('/gestio/incidencies/create')
                ->assertSee('Crear')
                ->type('input[name="title"]', 'Lavabos trencats')
                ->type('textarea[name="description"]', 'Hi ha una fuga als lavabos collons')
                ->select('select[name="priority"]', 'Botiga')
                ->press('button[type="submit"]')
                ->visit('/')
                ->clickLink('Paco Ramon')
                ->clickLink('Logout');

        });
    }
    /**
     * A Dusk test example.
     * @test
     * @return void
    */
    public function test_usuari_envia_incidencia_falla()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->clickLink('Login')
                ->assertSee('Iniciar sessió')
                ->value('input[name="email"]', 'pacoramon@univeylandia-parc.cat')
                ->value('input[name="password"]', 'Alumne123')
                ->click('button[type="submit"]')
                ->visit('/gestio/incidencies/create')
                ->assertSee('Crear')
                ->type('textarea[name="description"]', 'Hi ha una fuga als lavabos collons')
                ->select('select[name="priority"]', 'Botiga')
                ->press('button[type="submit"]');
        });
    }
}
