<?php

use App\Product;
use Illuminate\Database\Seeder;

class products extends Seeder
{

    public function run()
    {     
        Product::create([
         'product_name' => 'ارباب الاسر',
         'description' => 'لايوجد',
         'section_id' => '2',     
        ]);

        Product::create([
          'product_name' => 'اغراض الشخصية',
          'description' => 'لايوجد',
          'section_id' => '3',     
         ]); 

         Product::create([
          'product_name' => 'الشيك الالكتروني',
          'description' => 'لايوجد',
          'section_id' => '3',     
         ]); 

         Product::create([
          'product_name' => 'فيزا كرت',
          'description' => 'لايوجد',
          'section_id' => '1',     
         ]);
    }
}
