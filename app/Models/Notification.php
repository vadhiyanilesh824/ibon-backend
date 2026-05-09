<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Upload;

class Notification extends Model
{
    use HasFactory;
     protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $fillable = [
        'type', 'image', 'title', 'description', 'type_id',
    ];
   protected $appends = ['img_url'];    

    public function getImgUrlAttribute(){
            return \App\Services\Helpers::uploaded_asset($this->image);
    }
    public function post()
    {
        return $this->hasOne('App\product');  
    }           
}
