<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = "news";
    const CREATED_AT = 'create_at';
    const UPDATED_AT = 'update_at';
}
