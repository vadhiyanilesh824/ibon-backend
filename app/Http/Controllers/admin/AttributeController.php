<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CoreComponentRepository::instantiateShopRepository();
        // CoreComponentRepository::initializeCache();
        $attributes = Attribute::orderBy('created_at', 'desc')->get();
        return view('backend.product.attributes.index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attribute = new Attribute;
        $attribute->name = $request->name;
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash( __('Attribute has been inserted successfully'))->success();
        return redirect()->route('attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['attribute'] = Attribute::findOrFail($id);
        $data['all_attribute_values'] = AttributeValue::with('attribute')->where('attribute_id', $id)->get();
        return view("backend.product.attributes.attribute_value.index", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        return view('backend.product.attributes.edit', compact('attribute'));
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
        $attribute = Attribute::findOrFail($id);
        $attribute->name = $request->name;        
        $attribute->save();

        // $attribute_translation = AttributeTranslation::firstOrNew(['lang' => $request->lang, 'attribute_id' => $attribute->id]);
        // $attribute_translation->name = $request->name;
        // $attribute_translation->save();

        flash( __('Attribute has been updated successfully'))->success();
        //return back();
        return redirect()->route('attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);

        // foreach ($attribute->attribute_translations as $key => $attribute_translation) {
        //     $attribute_translation->delete();
        // }

        Attribute::destroy($id);
        flash( __('Attribute has been deleted successfully'))->success();
        return redirect()->route('attributes');
    }

    public function store_attribute_value(Request $request)
    {
        $attribute_value = new AttributeValue;
        $attribute_value->attribute_id = $request->attribute_id;
        $attribute_value->value = ucfirst($request->value);
        $attribute_value->save();

        flash( __('Attribute value has been inserted successfully'))->success();
        return redirect()->route('attributes.show', $request->attribute_id);
    }

    public function edit_attribute_value(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        return view("backend.product.attributes.attribute_value.edit", compact('attribute_value'));
    }

    public function update_attribute_value(Request $request, $id)
    {
        $attribute_value = AttributeValue::findOrFail($id);
        
        $attribute_value->attribute_id = $request->attribute_id;
        $attribute_value->value = ucfirst($request->value);
        
        $attribute_value->save();

        flash( __('Attribute value has been updated successfully'))->success();
        //return back();
        return redirect()->route('attributes.show', $request->attribute_id);
    }

    public function destroy_attribute_value($id)
    {
        $attribute_values = AttributeValue::findOrFail($id);
        AttributeValue::destroy($id);
        
        flash( __('Attribute value has been deleted successfully'))->success();
        return redirect()->route('attributes.show', $attribute_values->attribute_id);

    }

    public function change_show_in_list_status(Request $request)
    {
        if ($request->has('id')) {
            $attribute = Attribute::findOrFail($request->id);
            if ($attribute) {
                if($attribute->is_show_in_list == 1){
                    $attribute->is_show_in_list = 0;
                }else{
                    $attribute->is_show_in_list = 1;
                }
                $attribute->save();
                Attribute::where('id','!=',$attribute->id)->update(['is_show_in_list'=>0]);
            }
            flash(__('Status change successfully'))->success();
            return response(array('success' => 1));
        }
        return response(array('success' => 0));
    }
}
