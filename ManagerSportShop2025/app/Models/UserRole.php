<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles'; 
    protected $primaryKey = ['user_id', 'role_id']; // Định nghĩa khóa chính kép
    public $incrementing = false; // Vì đây là khóa chính tự đặt, không phải số tự động tăng
    public $timestamps = false; 

    protected $fillable = ['user_id', 'role_id']; 

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
