<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table = "comments";

    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function product(){
        return $this->belongsTo('App\Models\product','product_id','id');
    }
    public function replies(){
        return $this->hasMany('App\Models\comment_replies','comment_id','id');
    }
     
}
