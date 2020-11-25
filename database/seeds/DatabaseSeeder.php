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
            'profilePicture' => 'https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/85125424_4065065830186046_1976842346767056896_o.jpg?_nc_cat=111&_nc_sid=09cbfe&_nc_eui2=AeFVRrxob1UgdrIgkUPKMCaFVNpve6GT8EVU2m97oZPwRUMDRCAD9dTsiBAWAw3G09Ju9c0MEw_KxIUf9cypyeYM&_nc_ohc=iyh3SEWM78UAX_8T06c&_nc_ht=scontent.fmex10-2.fna&oh=7ef1cd539cf0b4275d5ebc4de1f887d4&oe=5F54C4CF'
        ]);

        App\User::create([
            'name' => 'Verónica ',
            'ap' => 'Lorenzo',
            'am' => 'Alavez',
            'email' => 'andreamendoza130@gmail.com',
            'password' => bcrypt('acceso.andrea'),
            'birthdate' => '2000-07-13',
            'sex_id' => 2,
            'profilePicture' => 'https://scontent.fmex10-2.fna.fbcdn.net/v/t1.0-9/66469688_2483078925247166_444180703093981184_o.jpg?_nc_cat=109&ccb=2&_nc_sid=09cbfe&_nc_eui2=AeFDRoegc-HEW5wlELtC0DvCDcD6cP9IWQ4NwPpw_0hZDnm3L1n0gW9Mp9ULEKXScidxU2cfPLuTdRiWpnChCtJf&_nc_ohc=FG5qTgUjfi0AX_2Crmu&_nc_ht=scontent.fmex10-2.fna&oh=41c47015d28adcdbd87ac5722cf296b4&oe=5FDFAB23'
        ]);

        DB::update('update users set typeUser_id=3 where id = ?', [1]);
        DB::update('update users set typeUser_id=3 where id = ?', [2]);

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

        App\Address::create(['user_id' => 2]);

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

        App\Category::create(['nameCategory' => 'Apolo']);
        App\Category::create(['nameCategory' => 'Babel']);
        App\Category::create(['nameCategory' => 'Bojack Horseman']);
        App\Category::create(['nameCategory' => 'Unicornios']);
        App\Category::create(['nameCategory' => 'Art']);
        App\Category::create(['nameCategory' => 'Mex']);
        App\Category::create(['nameCategory' => 'Videojuegos']);
        App\Category::create(['nameCategory' => 'Mr Robot']);

        App\Product::create([
            'nameProduct' => 'Babel',
            'description_prod' => 'Playera bien bonita de la marca',
            'costo_prod' => 300.00,
            'precio_prod'=> 350.00,
            'category_id' => 2,
            'provider_id' => 1,
        ]); // 1 - Babel
        App\Product::create([
            'nameProduct' => 'Apolo Amstrong',
            'description_prod' => 'Playera bien bonita de Apolo cuando fue a la luna',
            'costo_prod' => 300.00,
            'precio_prod'=> 350.00,
            'category_id' => 1,
            'provider_id' => 1,
        ]); // 2 - Apolo Amstrong
        App\Product::create([
            'nameProduct' => 'Horseman',
            'description_prod' => '¿Es el caballo de retozando?',
            'costo_prod' => 300.00,
            'precio_prod'=> 350.00,
            'category_id' => 3,
            'provider_id' => 1,
        ]); // 3 - Horseman
        App\Product::create([
            'nameProduct' => 'Hackerman',
            'description_prod' => '¿Elliot? ¿Qué estás haciendo?',
            'costo_prod' => 300.00,
            'precio_prod'=> 350.00,
            'category_id' => 8,
            'provider_id' => 1,
        ]); // 4 - Hackerman
        App\Product::create([
            'nameProduct' => 'El mirador' ,
            'description_prod' => '¿Bojack? Quiero ser arquitecta.' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 3 ,
            'provider_id' => 1 ,
        ]); // 5 - El mirador
        App\Product::create([
            'nameProduct' => 'Licorne' ,
            'description_prod' => 'Playera de los Toramigos.' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 4 ,
            'provider_id' => 1 ,
        ]); // 6 - Licorne
        App\Product::create([
            'nameProduct' => 'Mar de nubes' ,
            'description_prod' => 'El caminante sobre el mar de nubes' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 5,
            'provider_id' => 1 ,
        ]); // 7 - Mar de nubes
        App\Product::create([
            'nameProduct' => 'Quetza' ,
            'description_prod' => 'Playera diseñada por XSierra, estudiante de la carrera de diseño de videojuegos.' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 6,
            'provider_id' => 1 ,
        ]); // 8 - Quetza
        App\Product::create([
            'nameProduct' => 'YHLQMDLG' ,
            'description_prod' => 'Yo hago lo que me de la gana. ¿Oiste humano?' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 1,
            'provider_id' => 1 ,
        ]); // 9 - YHLQMDLG
        App\Product::create([
            'nameProduct' => 'Halo Guardians' ,
            'description_prod' => 'Playera negra de Halo con estampado blanco' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 7 ,
            'provider_id' => 1 ,
        ]); // 10 - Halo
        App\Product::create([
            'nameProduct' => 'Gears of War' ,
            'description_prod' => 'Payera negra de gears of wars manga corta' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 7 ,
            'provider_id' => 1 ,
        ]); // 11 - Gears of War
        App\Product::create([
            'nameProduct' => 'Guitar Hero' ,
            'description_prod' => 'Playera negra Guitar hero con estampado verde' ,
            'costo_prod' => 300.00 ,
            'precio_prod' => 350.00 ,
            'category_id' => 7 ,
            'provider_id' => 1 ,
        ]); // 12 - Guitar Hero

        DB::update('update inventories set eq_s=100, eq_m=100, eq_g=100, ec_s=100, ec_m=100, ec_g=100, eg_s=100, eg_m=100, eg_g=100 where product_id between ? and ?', [1,9]);

        App\ImagesProduct::create([
            'url' => 'products/5.jpg',
            'product_id' => 12
          ]);
        App\ImagesProduct::create([
            'url' => 'products/7.jpg',
            'product_id' => 10
          ]);
        App\ImagesProduct::create([
            'url' => 'products/8.jpg',
            'product_id' => 11
          ]);
        App\ImagesProduct::create([
            'url' => 'products/apolo-amstrong.png',
            'product_id' => 2
          ]);
        App\ImagesProduct::create([
            'url' => 'products/apolo-amstrong-source.png',
            'product_id' => 2
          ]);
        App\ImagesProduct::create([
            'url' => 'products/babel.png',
            'product_id' => 1
          ]);
        App\ImagesProduct::create([
            'url' => 'products/babel-source.png',
            'product_id' => 1
          ]);
        App\ImagesProduct::create([
            'url' => 'products/bojack-head.png',
            'product_id' => 3
          ]);
        App\ImagesProduct::create([
            'url' => 'products/bojack-head-source.jpg',
            'product_id' => 3
          ]);
        App\ImagesProduct::create([
            'url' => 'products/hackerman.png',
            'product_id' => 4
          ]);
        App\ImagesProduct::create([
            'url' => 'products/hackerman-source.jpg',
            'product_id' => 4
          ]);
        App\ImagesProduct::create([
            'url' => 'products/i-want-to-be-architec.png',
            'product_id' => 5
          ]);
        App\ImagesProduct::create([
            'url' => 'products/i-want-to-be-architec-source.jpg',
            'product_id' => 5
          ]);
        App\ImagesProduct::create([
            'url' => 'products/licorne.png',
            'product_id' => 6
          ]);
        App\ImagesProduct::create([
            'url' => 'products/licorne-source.png',
            'product_id' => 6
          ]);
        App\ImagesProduct::create([
            'url' => 'products/mar-de-nubes.png',
            'product_id' => 7
          ]);
        App\ImagesProduct::create([
            'url' => 'products/mar-de-nubes-source.jpg',
            'product_id' => 7
          ]);
        App\ImagesProduct::create([
            'url' => 'products/quetza.png',
            'product_id' => 8
          ]);
        App\ImagesProduct::create([
            'url' => 'products/quetza-source.png',
            'product_id' => 8
          ]);
        App\ImagesProduct::create([
            'url' => 'products/YHLQMDLG.png',
            'product_id' => 9
          ]);
        App\ImagesProduct::create([
            'url' => 'products/YHLQMDLG-source.png',
            'product_id' => 9
          ]);
    }
}
