<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DealerInquiry extends Model
{
    use HasFactory;
    protected $table = 'dealer_inquiry';
    protected $guarded = [];
    public function getCountryAttribute()
    {
        return (Country::find($this->attributes['country'])->name) ?? '';
    }
    public function getStateAttribute()
    {
        return (State::find($this->attributes['state'])->name) ?? '';
    }
    public function getCityAttribute()
    {
        return (City::find($this->attributes['city'])->name) ?? '';
    }
    protected $appends = ['country_id', 'state_id', 'city_id'];
    public function getCountryIdAttribute()
    {
        return $this->attributes['country'];
    }
    public function getStateIdAttribute()
    {
        return $this->attributes['state'];
    }
    public function getCityIdAttribute()
    {
        return $this->attributes['city'];
    }
}
