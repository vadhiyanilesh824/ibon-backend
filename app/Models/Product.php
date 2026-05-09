<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;

class Product extends Model {

    protected $fillable = [
        'name', 'added_by', 'user_id', 'category_id', 'brand_id', 'video_provider', 'video_link', 'unit_price','previews',
        'purchase_price', 'unit', 'slug', 'colors', 'choice_options', 'variations', 'thumbnail_img', 'meta_title', 'meta_description'
    ];


    public function category() {
        return $this->belongsTo(Category::class)->with('parentCategory');
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
