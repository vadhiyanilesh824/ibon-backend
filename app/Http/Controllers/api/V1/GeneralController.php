<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use Illuminate\Support\Facades\Validator;




class GeneralController extends Controller
{
    public function country()
    {
        $country = Country::get(['id','name','iso2']);
       
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'country' => $country,
            )

        ]);
    }
    
    public function state(Request $request)
    {
        $rules = [
          
            'country_id' => ['required'],
           
        ];
        $validator = Validator::make($request->all(), $rules);   
       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        $state=State::where('country_id','=',$request->country_id)->get(['id','name','iso2']);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                
                'state' => $state,

            )

        ]);
        
    }
    public function city(Request $request)
    {
        $rules = [
          
            'state_id' => ['required'],
           
        ];
        $validator = Validator::make($request->all(), $rules);   
       if ($validator->fails()) {
            return response()->json([
                'code'=>204,
                'success'   => false,
                'message' => $validator->errors()->first(),
                'data'=>array()
            ]);
        }
        $city=City::where('state_id','=',$request->state_id)->get(['id','name',]);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                
                'city' => $city,

            )

        ]);
    }
   public function generalinformation()
    {
        $generalsettings = [];
        $generalsettings['address'] = site_settings('address', false);
        $generalsettings['phone'] = site_settings('phone', false);
        $generalsettings['email'] = site_settings('receive_email', false);
        $generalsettings['website'] = site_settings('website', false);
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'generalsettings' => $generalsettings,

            )

        ]);
    }
}
