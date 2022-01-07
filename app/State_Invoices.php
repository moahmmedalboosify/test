<?php

namespace App;

use App\invoice;
use Illuminate\Database\Eloquent\Model;

class State_Invoices extends Model
{
    protected $guarded = [];
    protected $table = 'state_invoices';
    public $timestamps = false;

    public function invoice()
    {
        return $this->hasMany(invoice::class);
    }

}
