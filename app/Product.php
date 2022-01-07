<?php

namespace App;


use App\invoice;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name',
        'description',   
        'section_id',
    ];

    public function sections(){

      return $this->belongsTo('App\section','section_id');
    }




    public function invoices()
    {
        return $this->hasMany(invoice::class);
    }

}
