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

        factory(App\User::class, 50)->create();

        DB::update('update users set typeUser_id=3 where id = ?', [1]);
        DB::update('update users set typeUser_id=2 where id = ?', [3]);
        DB::update('update users set typeUser_id=2 where id = ?', [4]);
        DB::update('update users set typeUser_id=4 where id = ?', [5]);

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
            'emailProvider' => 'printful@printful.com'
            ]);

        App\Provider::create([
            'nameProvider' => 'JamaProvider',
            'companyProvider'=> 'JamaProvider',
            'descriptionProvider' => 'Jama prooveedor.',
            'emailProvider' => 'jama@jamaaa.me'
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
            'nameProduct' => 'playera playera',
            'description_prod' => 'Playera bien bonita de batman',
            'costo_prod' => 250.00,
            'precio_prod'=> 400.00,
            'category_id' => 1,
            'provider_id' => 2,
        ]);

        App\Product::create([
            'nameProduct' => 'playera batman',
            'description_prod' => 'Playera bien bonita de batman',
            'costo_prod' => 250.00,
            'precio_prod'=> 400.00,
            'category_id' => 1,
            'provider_id' => 1,
        ]);

        App\Product::create([
            'nameProduct' => 'playera Unicornio',
            'description_prod' => 'Playera bien bonita de unicornio',
            'costo_prod' => 250.00,
            'precio_prod'=> 400.00,
            'category_id' => 3,
            'provider_id' => 1,
        ]);

        App\Product::create([
            'nameProduct' => 'playera Spiderman',
            'description_prod' => 'Playera bien bonita de Spiderman',
            'costo_prod' => '250.00',
            'precio_prod'=> '400.00',
            'category_id' => 2,
            'provider_id' => 1,
        ]);


        DB::update('update inventories set eq_s=10, eq_m=10, eq_g=10, ec_s=10, ec_m=10, ec_g=10, eg_s=10, eg_m=10, eg_g=10 where product_id between ? and ?', [1,3]);



        App\ImagesProduct::create([
            'url' => 'products/1.jpg',
            'product_id' => 1
          ]);

        App\ImagesProduct::create([
            'url' => 'products/2.jpg',
            'product_id' => 2
          ]);

        App\ImagesProduct::create([
            'url' => 'products/3.png',
            'product_id' => 3
          ]);

        App\Buy::create([
          'administrator_id' => 1,
          'provider_id' => 1,
          'status_id' => 1
          ]);
        App\Buy::create([
          'administrator_id' => 2,
          'provider_id' => 1,
          'status_id' => 2
        ]);

        App\BuyDetail::create([
          'cantidad_com' => 2,
          'product_id' => 1,
          'buy_id' => 1
        ]);

        App\BuyDetail::create([
          'cantidad_com' => 1,
          'product_id' => 2,
          'buy_id' => 1
        ]);

        App\BuyDetail::create([
          'cantidad_com' => 1,
          'product_id' => 1,
          'buy_id' => 2
        ]);
    }
}
