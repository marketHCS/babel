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


        DB::update('update users set typeUser_id=3 where id = ?', [51]);
        DB::update('update users set typeUser_id=2 where id = ?', [53]);
        DB::update('update users set typeUser_id=2 where id = ?', [54]);
        DB::update('update users set typeUser_id=4 where id = ?', [55]);

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

        App\Provider::create([
            'nameProvider' => 'Printful',
            'companyProvider'=> 'Printful',
            'descriptionProvider' => 'Proveedor de dropshiping ropa.',
            ]);

        App\Category::create([
            'nameCategory' => 'DC'
        ]);

        App\Category::create([
            'nameCategory' => 'Marvel'
        ]);

        App\Category::create([
            'nameCategory' => 'Unicornios'
        ]);

        App\Product::create([
            'nameProduct' => 'playera batman',
            'description_prod' => 'Playera bien bonita de batman',
            'costo_prod' => '250.00',
            'precio_prod'=> '400.00',
            'category_id' => 1,
            'provider_id' => 1,
            'size_id' => 2
        ]);

        App\Product::create([
            'nameProduct' => 'playera batman',
            'description_prod' => 'Playera bien bonita de batman',
            'costo_prod' => 250.00,
            'precio_prod'=> 400.00,
            'category_id' => 1,
            'provider_id' => 1,
            'size_id' => 3
        ]);

        App\Product::create([
            'nameProduct' => 'playera batman',
            'description_prod' => 'Playera bien bonita de batman',
            'costo_prod' => 250.00,
            'precio_prod'=> 400.00,
            'category_id' => 1,
            'provider_id' => 1,
            'size_id' => 4
        ]);

        DB::update('update inventories set exist_inv=10 where product_id between ? and ?', [1,9]);

        factory(App\Product::class, 50)->create();
    }
}
