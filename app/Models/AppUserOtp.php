<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUserOtp extends Model
{
    use HasFactory;
    protected $table = 'app_user_otp';
    protected $fillable = [
        'user_id',
        'otp',
        'is_expire'
    ];
}
