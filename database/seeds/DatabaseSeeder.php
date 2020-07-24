<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Usuarios
        factory(App\User::class, 50)->create();
        App\User::create([
            'name' => 'Jama Ideal',
            'ap' => 'Escobedo',
            'am' => 'Olguín',
            'email' => 'jamahcs@outlook.com',
            'password' => bcrypt('acceso.jama'),
            'birthdate' => '2000-03-20',
            'sex_id' => 1,
            'profilePicture' => 'https://api.adorable.io/avatars/285/JamaIdealEscobedoOlguin.png'
        ]);

        App\User::create([
            'name' => 'Apolo Ideal',
            'ap' => 'Escobedo',
            'am' => 'Olguín',
            'email' => 'apolohcs@outlook.com',
            'password' => bcrypt('acceso.jama'),
            'birthdate' => '2000-03-20',
            'sex_id' => 1,
            'profilePicture' => 'https://api.adorable.io/avatars/285/ApoloIdealEscobedoOlguin.png'
        ]);

        App\User::create([
            'name' => 'Verónica ',
            'ap' => 'Lorenzo',
            'am' => 'Alavez',
            'email' => 'veronicalorenzo1999@gmail.com',
            'password' => bcrypt('veronica1999'),
            'birthdate' => '1999-02-03',
            'sex_id' => 2,
            'profilePicture' => 'https://api.adorable.io/avatars/285/VeronicaLorenzoAlavez.png'
        ]);

        App\User::create([
            'name' => 'Victor',
            'ap' => 'Alguilar',
            'am' => 'Sanchez',
            'email' => 'vaguilar@uteq.edu.mx',
            'password' => bcrypt('vic.aguilar'),
            'birthdate' => '1980-10-10',
            'sex_id' => 1,
            'profilePicture' => 'https://api.adorable.io/avatars/285/VictorAguilarSanchez.png'
        ]);

        App\User::create([
            'name' => 'Eliminado',
            'ap' => 'Eliminado',
            'am' => 'Eliminado',
            'email' => 'eliminado@eliminado.com',
            'password' => bcrypt('acceso.jama'),
            'birthdate' => '1980-10-10',
            'sex_id' => 1,
            'profilePicture' => 'https://api.adorable.io/avatars/285/VictorAguilarSanchez.png'
        ]);

        App\Address::create([
        'street' => 'Prol. Francisco Zarco',
        'exteriorNumberAddress' => '15',
        'interiorNumberAddress' => '1',
        'suburb' => 'San José',
        'city' => 'Tula de Allende',
        'estate' => 'Hidalgo',
        'cp' => '42805',
        'user_id' => 1
    ]);

        App\Address::create([
        'street' => 'Prol. Francisco Zarco',
        'exteriorNumberAddress' => '15',
        'interiorNumberAddress' => '1',
        'suburb' => 'San José',
        'city' => 'Tula de Allende',
        'estate' => 'Hidalgo',
        'cp' => '42805',
        'user_id' => 1
    ]);
    }
}
