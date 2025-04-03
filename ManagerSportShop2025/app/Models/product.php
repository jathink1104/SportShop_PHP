<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{  
    protected $table = "products";
    public function product_type(){
        return $this ->belongsTo('App\Models\typeproduct','id_type','id');
    }

    public function bill_detail(){
        return $this->hasMany('App\Models\billdetail','id_product','id');
    }

    public function comments(){
        return $this->hasMany('App\Models\comments','product_id','id');
    }
     
}
