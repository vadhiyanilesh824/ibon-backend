<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name', 'last_name', 'mobile_no', 'company_name', 'email', 'country','state','city','password','userId','forget_code','is_verify','user_type'
    ];
    protected $hidden = [
        'password',
        'forget_code',
    ];

    protected $appends = ['image_url'];
   public function getImageUrlAttribute()

    {
        if($this->image==null)
        {
            return null;
        }
        else{
            return url('public/Api_image/profile').'/'.($this->image);

        }

    }
}
