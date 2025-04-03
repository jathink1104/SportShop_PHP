<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billdetail extends Model
{
    protected $table = "bill_detail";

    public function product(){
        return $this->belongsTo('App\Models\product','id_product','id');
    }

    public function bill(){
        return $this->belongsTo('App\Models\bills','id_bill','id');
    }
}
