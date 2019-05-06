<?php

use Illuminate\Database\Seeder;

class DadesEmpleatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '3456436543',
            'num_nomina' => 'N123465789',
            'IBAN' => '65436456534',
            'especialitat' => 'IT',
            'carrec' => 'Administrador',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '3456346543',
            'num_nomina' => 'N345436452',
            'IBAN' => '345634653456',
            'especialitat' => 'IZ',
            'carrec' => 'General',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '86538546488',
            'num_nomina' => 'N34543645',
            'IBAN' => '654565685',
            'especialitat' => 'IZ',
            'carrec' => 'Manteniment',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '86548355658',
            'num_nomina' => 'N7657373',
            'IBAN' => '3568356835863',
            'especialitat' => 'IZ',
            'carrec' => 'Neteja',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);
        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '865386538635',
            'num_nomina' => 'N7543624',
            'IBAN' => '356856835638',
            'especialitat' => 'IZ',
            'carrec' => 'show',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);
        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '568356835683',
            'num_nomina' => 'N76537653',
            'IBAN' => '356835685683',
            'especialitat' => 'IZ',
            'carrec' => 'seguretat',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);
        DB::table('dades_empleats')->insert([
            'codi_seg_social' => '8768658356835',
            'num_nomina' => 'N6542524',
            'IBAN' => '8653838353',
            'especialitat' => 'IZ',
            'carrec' => 'Atencio_al_client',
            'data_inici_contracte' => '2019-09-06',
            'data_fi_contracte' => '2020-09-06',
            'id_horari' => 1,
        ]);

    }
}
