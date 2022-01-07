<?php

namespace App;

use App\invoice;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    protected $fillable = [
        'section_name',
        'description',
        'create_by',
    ];

    public function products()
    {
         return $this->hasMany('App\Product');
    }



    public function invoice()
    {
      return $this->hasMany(invoice::class);
    }

}
