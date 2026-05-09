<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $address = Address::orderByDesc('is_main')->get();
        return view('backend.general_settings.index', compact('address'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $address = array();
        if ($id != null) {
            $address = Address::find($id);
        }
        return view('backend.general_settings.address', compact('address'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upsert(Request $request)
    {
        // return $request;

        if ($request->id == 0) {
            $main = 0;
            if (Address::where('is_main', 1)->count() == 0) {
                $main = 1;
            }
            Address::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => json_encode($request->phone),
                'email' => json_encode($request->email),
                'customer_care' => $request->customer_care,
                'is_main' => $main
            ]);
            flash(__('Address Added Successfully'))->success();
            return redirect()->route('site_settings');
        } else {
            $address = Address::find($request->id);
            if ($address) {
                $address->name = $request->name;
                $address->address = $request->address;
                $address->phone = json_encode($request->phone);
                $address->email = json_encode($request->email);
                $address->customer_care = $request->customer_care;
                $address->save();
            }
            flash(__('Address Updated Successfully'))->success();
            return redirect()->route('site_settings');
        }
        flash(__('Try Again'))->error();
        return redirect()->route('site_settings');
    }

    public function change_main_address($id)
    {
        $address = Address::find($id);
        if ($address) {
            if ($address->is_main == 0) {
                Address::where('id', $id)->update(['is_main' => 1]);
                Address::where('id', '!=', $id)->update(['is_main' => 0]);
            }
        }
        return redirect()->route('site_settings');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->input() as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $j => $k) {
                    if (SiteSetting::where('key', $key)->count() > 0) {
                        SiteSetting::where('key', $key)->update([
                            'key' => $key,
                            'type' => $j,
                            'value' => $k
                        ]);
                    } else {
                        SiteSetting::create([
                            'key' => $key,
                            'type' => $j,
                            'value' => $k
                        ]);
                    }
                }
            } else {
                if (SiteSetting::where('key', $key)->count() > 0) {
                    SiteSetting::where('key', $key)->update([
                        'key' => $key,
                        'type' => 'text',
                        'value' => $value
                    ]);
                } else {
                    SiteSetting::create([
                        'key' => $key,
                        'type' => 'text',
                        'value' => $value
                    ]);
                }
            }
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $address = Address::find($id);
        if ($address && $address->is_main == 0) {
            $address->delete();
            flash(__('Address Deleted'))->success();
            return redirect()->route('site_settings');
        }
        flash(__('Try Again'))->error();
        return redirect()->route('site_settings');
    }
}
