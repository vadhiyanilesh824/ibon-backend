<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Services\CategoryUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('backend.product.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.products.add', compact('categories'));
    }
    public function bulk_create()
    {
        $categories = Category::where('parent_id', 0)
            ->where('digital', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.products.add_bulk', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->previews = $request->previews;
        $product->photos = $request->photos;
        $product->thumbnail_img = $request->thumbnail_img;
        $product->tags = $request->tags;
        $product->pdf = $request->pdf;

        $product->short_description = $request->short_description;
        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        if ($request->has('meta_img')) {
            $product->meta_img = $request->meta_img;
        } else {
            $product->meta_img = $product->thumbnail_img;
        }

        if ($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description);
        }
        if ($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img;
        }
        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name)));

        if (Product::where('slug', $product->slug)->count() > 0) {
            flash(__('Another product exists with same slug. Please change the slug!'))->warning();
            return back();
        }

        if ($request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        $product->published = 1;

        if ($request->has('cash_on_delivery')) {
            $product->cash_on_delivery = 1;
        }
        if ($request->has('featured')) {
            $product->featured = 1;
        }
        if ($request->has('todays_deal')) {
            $product->todays_deal = 1;
        }
        $product->cash_on_delivery = 0;
        //$variations = array();
        if ($request->has('is_featured')) {
            $product->is_featured = 1;
        }
        if ($request->has('is_popular')) {
            $product->is_popular = 1;
        }
        if ($request->has('is_new')) {
            $product->is_new = 1;
        }
        if ($request->has('is_trends')) {
            $product->is_trends = 1;
        }
        $product->save();
        if ($product->meta_title == null) {
            $product->meta_title = $product->name . ' | ' . $product->category->name;
            $product->save();
        }

        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                foreach ($request[$name] as $key => $eachValue) {
                    array_push($data, $eachValue);
                }
                array_push($options, $data);
            }
        }


        $product->save();

        flash(__('Product has been inserted successfully'))->success();
        return redirect()->route('products');
    }

    public function bulk_save(Request $request)
    {
        foreach ($request->name as $key => $name) {
            $product = new Product;
            $product->name = $request->name[$key];
            $product->user_id = Auth::user()->id;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->previews = $request->previews[$key];
            $product->photos = $request->photos[$key];
            $product->thumbnail_img = $request->thumbnail_img[$key];
            $product->tags = $request->tags;
            $product->pdf = $request->pdf;

            $product->short_description = $request->short_description[$key];
            $product->meta_title = null;
            $product->meta_description = null;
            $product->meta_keywords = $request->tags;

            if ($request->has('meta_img')) {
                $product->meta_img = $request->meta_img;
            } else {
                $product->meta_img = $product->thumbnail_img;
            }

            if ($product->meta_description == null) {
                $product->meta_description = strip_tags($product->description);
            }
            if ($product->meta_img == null) {
                $product->meta_img = $product->thumbnail_img;
            }
            $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name[$key])));

            if (Product::where('slug', $product->slug)->count() > 0) {
                flash(__('Another product exists with same slug. Please change the slug!'))->warning();
                return back();
            }

            if ($request->has('colors') && count($request->colors) > 0) {
                $product->colors = json_encode($request->colors);
            } else {
                $colors = array();
                $product->colors = json_encode($colors);
            }

            $choice_options = array();

            if ($request->has('choice_no')) {
                foreach ($request->choice_no as $key => $no) {
                    $str = 'choice_options_' . $no;

                    $item['attribute_id'] = $no;

                    $data = array();
                    // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                    foreach ($request[$str] as $key => $eachValue) {
                        // array_push($data, $eachValue->value);
                        array_push($data, $eachValue);
                    }

                    $item['values'] = $data;
                    array_push($choice_options, $item);
                }
            }

            if (!empty($request->choice_no)) {
                $product->attributes = json_encode($request->choice_no);
            } else {
                $product->attributes = json_encode(array());
            }

            $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

            $product->published = 1;

            if ($request->has('cash_on_delivery')) {
                $product->cash_on_delivery = 1;
            }
            if ($request->has('featured')) {
                $product->featured = 1;
            }
            if ($request->has('todays_deal')) {
                $product->todays_deal = 1;
            }
            $product->cash_on_delivery = 0;
            //$variations = array();
            if ($request->has('is_featured')) {
                $product->is_featured = 1;
            }
            if ($request->has('is_popular')) {
                $product->is_popular = 1;
            }
            if ($request->has('is_new')) {
                $product->is_new = 1;
            }
            if ($request->has('is_trends')) {
                $product->is_trends = 1;
            }
            $product->save();
            if ($product->meta_title == null) {
                $product->meta_title = $product->name . ' | ' . $product->category->name;
                $product->save();
            }

            //combinations start
            $options = array();
            if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
                $colors_active = 1;
                array_push($options, $request->colors);
            }

            if ($request->has('choice_no')) {
                foreach ($request->choice_no as $key => $no) {
                    $name = 'choice_options_' . $no;
                    $data = array();
                    foreach ($request[$name] as $key => $eachValue) {
                        array_push($data, $eachValue);
                    }
                    array_push($options, $data);
                }
            }


            $product->save();
        }


        flash(__('Products has been inserted successfully'))->success();
        return redirect()->route('products');
    }
    public static function makeCombinations($arrays)
    {
        $result = array(array());
        foreach ($arrays as $property => $property_values) {
            $tmp = array();
            foreach ($result as $result_item) {
                foreach ($property_values as $property_value) {
                    $tmp[] = array_merge($result_item, array($property => $property_value));
                }
            }
            $result = $tmp;
        }
        return $result;
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
        $product = Product::findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->orderBy('name', 'asc')
            ->get();

        return view('backend.product.products.edit', compact('product', 'categories'));
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
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->user_id = Auth::user()->id;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->photos = $request->photos;
        $product->thumbnail_img = $request->thumbnail_img;
        $product->pdf = $request->pdf;
        $product->tags = $request->tags;
        $product->previews = $request->previews;

        $product->description = $request->description;
        $product->specification = $request->specification;
        $product->video_provider = $request->video_provider;
        $product->video_link = $request->video_link;
        $product->meta_title = $request->meta_title;
        $product->meta_description = $request->meta_description;
        $product->meta_keywords = $request->meta_keywords;

        if ($request->has('meta_img')) {
            $product->meta_img = $request->meta_img;
        } else {
            $product->meta_img = $product->thumbnail_img;
        }
        if ($product->meta_title == null) {
            $product->meta_title = $product->name;
        }
        if ($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description);
        }
        if ($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img;
        }
        if ($request->slug != null) {
            $product->slug = strtolower($request->slug);
        } else {
            $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);
        }

        if ($request->has('colors') && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            $product->attributes = json_encode($request->choice_no);
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        $product->published = 1;

        if ($request->has('cash_on_delivery')) {
            $product->cash_on_delivery = 1;
        }
        if ($request->has('featured')) {
            $product->featured = 1;
        }
        if ($request->has('todays_deal')) {
            $product->todays_deal = 1;
        }
        $product->cash_on_delivery = 0;
        //$variations = array();
        if ($request->has('is_featured')) {
            $product->is_featured = 1;
        } else {
            $product->is_featured = 0;
        }
        if ($request->has('is_popular')) {
            $product->is_popular = 1;
        } else {
            $product->is_popular = 0;
        }
        if ($request->has('is_new')) {
            $product->is_new = 1;
        } else {
            $product->is_new = 0;
        }
        if ($request->has('is_trends')) {
            $product->is_trends = 1;
        } else {
            $product->is_trends = 0;
        }
        $product->save();


        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $name = 'choice_options_' . $no;
                $data = array();
                foreach ($request[$name] as $key => $eachValue) {
                    array_push($data, $eachValue);
                }
                array_push($options, $data);
            }
        }


        $product->save();

        flash(__('Product has been inserted successfully'))->success();
        return redirect()->route('products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Product::findOrFail($id);
        Product::destroy($id);
        flash(__('Product has been deleted successfully'))->success();
        return redirect()->route('products');
    }

    public function add_more_choice_option(Request $request)
    {
        $all_attribute_values = AttributeValue::with('attribute')->where('attribute_id', $request->attribute_id)->get();

        $html = '';

        foreach ($all_attribute_values as $row) {
            $html .= '<option value="' . $row->value . '">' . $row->value . '</option>';
        }

        echo json_encode($html);
    }

    public function change_section(Request $request)
    {
        if ($request->has('name') && $request->has('status') && $request->has('id')) {
            $product = Product::findOrFail($request->id);
            if ($product) {
                $product[$request->name] = $request->status;
                $product->save();
            }
            flash(__('status change successfully'))->success();
            return response(array('success' => 1));
        }
        return response(array('success' => 0));
    }
}
