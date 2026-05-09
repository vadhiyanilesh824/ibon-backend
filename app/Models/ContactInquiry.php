<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactInquiry extends Model
{
    use HasFactory;
    protected $table = 'contact_inquiry';   
    protected $guarded = [];  
    public function product() {
        return $this->belongsTo(Product::class,'type_id');
    }
}
