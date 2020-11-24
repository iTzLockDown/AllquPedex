<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' 				=>	'wilhelm',
            'email'				=>	'wilhelm@gmail.com',
            'password'			=>	Hash::make('qweqwe123'),
            'apellidos'         => 'Ruiz Taype',
            'dni'               => '47418895',
            'telefono'          => '930248341',
            'direccion'         => 'Av Brasil #140',
            'permiso'           => 1,
            'estado'            => 1,
        ]);
        DB::table('users')->insert([
            'name' 				=>	'administrador',
            'email'				=>	'administrador@gmail.com',
            'password'			=>	Hash::make('administrador'),
            'apellidos'         => 'administrador',
            'dni'               => '47418896',
            'telefono'          => '930248342',
            'direccion'         => 'Av Brasil #140',
            'permiso'           => 1,
            'estado'            => 1,
        ]);
    }
}






