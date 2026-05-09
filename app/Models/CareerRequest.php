<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerRequest extends Model
{
    use HasFactory;
    protected $table = 'career_request';
    protected $guarded = [];
    public function career() {
        return $this->belongsTo(Career::class);
    }
}
