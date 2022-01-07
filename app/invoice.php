<?php

namespace App;

use App\Product;
use App\section;
use App\State_Invoices;
use Illuminate\Database\Eloquent\SoftDeletes;


use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
  use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = [];
     
    public function users()
    {
        return $this->belongsTo(User::class,'user_id');
    } 
    
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function section()
    {
        return $this->belongsTo('App\section','section_id');
    }

    public function state_invoice()
    {
        return $this->belongsTo(State_Invoices::class,'state_id');
    }
}
