<?php

namespace App\Exports;

use App\invoice;
use Maatwebsite\Excel\Concerns\FromCollection;

class invoiceExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return invoice::all();
    }
}
