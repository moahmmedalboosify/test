<?php

use App\State_Invoices;
use Illuminate\Database\Seeder;

class state_invoice extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       State_Invoices::create([
            'state' => 'مدفوعة',
            'value' => '1',
        ]);

       State_Invoices::create([
            'state' => 'غير مدفوعة',
            'value' => '2',
        ]);
    }
}
