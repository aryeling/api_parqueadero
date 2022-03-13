<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('propietarios')->insert([
        	[
	        	'cedula' => 'V12345678',
                'nombre' => 'Mathias',
	        	'apellido' => 'Sanchez',
                'sexo' => 'Masculino',
                'fecha_nac' => '1986-03-12',
                'correo' => 'ms@email.com',
                'telefono' => '04144445566',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        	],
            [
	        	'cedula' => 'V13579246',
                'nombre' => 'Laura',
	        	'apellido' => 'Andrade',
                'sexo' => 'Femenino',
                'fecha_nac' => '1977-11-29',
                'correo' => 'la@email.com',
                'telefono' => '04122234477',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
        	]

        ]);
    }
}
