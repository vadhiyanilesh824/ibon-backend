<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $hidden = [
        'created_at', 'updated_at',
    ];
    protected $guarded = [];
    protected $appends = ['banner_url', 'icon_url'];
    public function getBannerUrlAttribute()
    {
        return \App\Services\Helpers::uploaded_asset($this->banner);
    }
    public function getIconUrlAttribute()
    {
        return \App\Services\Helpers::uploaded_asset($this->icon);
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function catalogues()
    {
        return $this->hasMany(Catalogue::class, 'category_id');
    }

    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }
    public function subCategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('categories');
    }
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function attributes()
    {
        return $this->BelongsToMany(Attribute::class)->withPivot('attribute_value');
    }
}
