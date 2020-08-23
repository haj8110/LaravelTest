<?php

use Illuminate\Database\Seeder;

class AddProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Bluetooth Headphone',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
            'image' => 'https://resize.indiatvnews.com/en/resize/newbucket/715_-/2020/03/sennhieser-1584602217.jpg',
            'price' => 1000.00
         ]);
  
         DB::table('products')->insert([
             'name' => 'Power Bank',
             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'image' => 'https://images-na.ssl-images-amazon.com/images/I/619AI9CLXTL._SL1500_.jpg',
             'price' => 900.00
         ]);
  
         DB::table('products')->insert([
             'name' => 'Wired Earphone',
             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'image' => 'https://img.gkbcdn.com/s3/p/2019-03-01/jbl-c200si-in-ear-wired-earphones-black-1571978401901.jpg',
             'price' => 800.00
         ]);
  
         DB::table('products')->insert([
             'name' => 'Screen Protector',
             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'image' => 'https://cdn.shopify.com/s/files/1/1166/1584/products/iphone-11-pro-max-tempered-glass_1024x.jpg?v=1578353169',
             'price' => 700.00
         ]);
  
         DB::table('products')->insert([
             'name' => 'OTG Pendrive',
             'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
             'image' => 'https://cdn.shopify.com/s/files/1/1166/1584/products/iphone-11-pro-max-tempered-glass_1024x.jpg?v=1578353169',
             'price' => 500.00
         ]);
  
         
    }
}
