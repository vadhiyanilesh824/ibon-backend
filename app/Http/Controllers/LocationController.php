<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function states_by_country_id(Request $request){
        $states = State::where('country_id',$request->country_id)->select('id','name')->get();
        return response($states);
    }
    public function cities_by_state_id(Request $request){
        $cities = City::where('state_id',$request->state_id)->select('id','name')->get();
        return response($cities);
    }
}
