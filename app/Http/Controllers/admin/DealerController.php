<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\DealerInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiry = DealerInquiry::where('is_approved','1')->where('type','dealer')->orderBy('id')->get();
        return view('backend.dealer.index', compact('inquiry'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::get(['id','name']);
        return view('backend.dealer.add', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];
        $data['company_name'] = $request->company_name;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['country'] = $request->country;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['zipcode'] = $request->zipcode;
        $data['address'] = $request->address;
        $data['product_type'] = json_encode($request->product_category);
        $data['type'] = 'dealer';
        $data['is_approved'] = '1';
        $inquiry = DealerInquiry::create($data);
        flash(__('Dealer has been inserted successfully'))->success();
        return redirect()->route('dealer');
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
        $countries = Country::get(['id','name']);
        $dealer = DealerInquiry::find($id);
        return view('backend.dealer.edit', compact('dealer','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = Crypt::decryptString($request->id);
        $data = DealerInquiry::findOrFail($id);
        $data->company_name = $request->company_name;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->country = $request->country;
        $data->state = $request->state;
        $data->city = $request->city;
        $data->zipcode = $request->zipcode;
        $data->address = $request->address;
        $data->product_type = json_encode($request->product_category);
        $data->save();
        flash(__('Dealer has been Updated successfully'))->success();
        return redirect()->route('dealer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DealerInquiry::find($id)->delete();
        flash(__('Dealer has been deleted successfully'))->success();
        return redirect()->back();
    }
}
