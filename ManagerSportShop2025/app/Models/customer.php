<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    protected $table = "customer";
    public function bill(){
        return $this->hasMany('App\Models\bill','id_customer','id');
    }
}
