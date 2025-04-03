<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bills extends Model
{
    protected $table = "bills";
    public function bill_detail(){
        return $this->hasMany('App\Models\billdetail','id_bill','id');
    }

    public function bill(){
        return $this->belongsTo('App\Models\customer','id_customer','id');
    }
}
