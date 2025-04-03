<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class typeproduct extends Model
{
    protected $table = "type_products";
    public function product(){
        return $this->hasMany('App\Models\product','id_type','id');
    }
}
