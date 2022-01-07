<?php


use Illuminate\Database\Seeder;

class section extends Seeder
{
  

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\section::create([
            'section_name'  => 'البنك الاهلي',
            'description'  => 'لايوجد',
            'create_by'  => '1'        
         ]);

         App\section::create([
          'section_name'  => 'البنك العربي',
          'description'  => 'لايوجد',
          'create_by'  => '1'        
       ]);

       App\section::create([
        'section_name'  => 'البنك الصحاري',
        'description'  => 'لايوجد',
        'create_by'  => '1'        
     ]);
    }
}
