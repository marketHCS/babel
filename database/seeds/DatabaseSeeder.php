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
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name' => 'Jama Ideal',
            'nameNotAutentication' => 'Hector Arath',
            'ap' => 'Escobedo',
            'am' => 'Olguín',
            'email' => 'jamahcs@outlook.com',
            'password' => bcrypt('acceso.jama'),
            'avatar' => 'jamahcs',
            'typeUser' => 1,
        ]);
        App\User::create([
            'name' => 'Veronica',
            'nameNotAutentication' => 'Veronica',
            'ap' => 'Lorenzo',
            'am' => 'Alavez',
            'email' => 'verohcs@outlook.com',
            'password' => bcrypt('Acceso.117'),
            'avatar' => 'verohcs',
            'typeUser' => 1,
        ]);
    }
}
