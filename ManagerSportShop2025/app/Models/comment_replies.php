<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_replies extends Model
{
    protected $table = "comment_replies";

    
    public function comments(){
        return $this->belongsTo('App\Models\comments','comment_id','id');
    }


    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
}

