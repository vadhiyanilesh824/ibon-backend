<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class SliderControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'asc')->get();
        // return $sliders;
        return view('backend.slider.index', compact('sliders'));
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
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->slider_text = $request->slider_texts;
        $slider->save();
        flash(__('Brand has been inserted successfully'))->success();
        return redirect()->route('slider');
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
        $slider  = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('slider'));
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
        $slider = Slider::findOrFail($id);
        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->slider_text = $request->slider_texts;
        $slider->save();
        flash(__('Slider has been updated successfully'))->success();
        return redirect()->route('slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Slider::findOrFail($id);
        Slider::destroy($id);
        flash(__('Slide has been deleted successfully'))->success();
        return redirect()->route('slider');
    }

    public function get_type_data(Request $request)
    {
        $type = $request->type;
        $html = '';
        if ($type == 'product') {
            $products = Product::join('categories', 'categories.id', '=', 'products.category_id')->select('products.id', 'products.name', 'categories.name as cat_name')->get();
            $html .= '<div class="form-group"><label class="col-from-label">Select Product</label><select name="type" id="type" class="form-control select2"><option value="" disabled selected>Select Product</option>';
            foreach ($products as $p) {
                $html .= '<option value="' . $p->id . '">' . $p->name . ' ( ' . $p->cat_name . ' )</option>';
            }
            $html .= '</select></div>';
        } else if ($type == 'category') {
            $category = Category::select('id', 'name')->get();
            $html .= '<div class="form-group"><label class="col-from-label">Select Category</label><select name="type" id="type" class="form-control select2"><option value="" disabled selected>Select Category</option>';
            foreach ($category as $c) {
                $html .= view('backend.product.category.child_category', ['child_category' => $c]);
            }
            $html .= '</select></div>';
        } else if ($type == 'filter') {
            $html .=  '<div class="form-group"><label class="col-from-label">' . __('Choose Attributes') . '</label>
            <select class="form-control select2" name="choice_attributes" id="choice_attributes" multiple>';
            foreach (\App\Models\Attribute::all() as $key => $attribute) {
                $html .= '<option value="' . $attribute->id . '">' . $attribute->name . '</option>';
            }
            $html .=  '</select>
                        </div>';
        }
        return json_encode($html);
    }
}
