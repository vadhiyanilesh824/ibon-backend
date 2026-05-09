<?php

namespace App\Http\Controllers\api\V1;

use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeValue;
use DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Product_mainController extends Controller
{
    public function product_main()
    {

       $category = Category::where('parent_id', 0)
        ->with('categories')
        ->get()
        ->map(function($data){
           $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
                $data['specification'] = str_replace('&nbsp;', ' ',strip_tags($data['specification']));
                $data['categories'] = $data->categories->map(function ($data1) {
                    $data1['description'] = str_replace('&nbsp;', ' ',strip_tags($data1['description']));
                    $data1['specification'] = str_replace('&nbsp;', ' ',strip_tags($data1['specification']));
                    return $data1;
            });
            return $data;
        });


        return response()->json([

            'success' => true,
            'Message'=>'successfully got it',
            'code' => 200,
            'data' => array(
                'category' => $category,

            )

        ]);
    }
    public function product(Request $request)
    {
        
        $rules = [
            // 'category_id' => 'required',
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

        $product = Product::query();
        // if ($request->has('category_id')) {
        //     $product = $product->where('products.category_id', $request->category_id);
        // }
        if ($request->has('category_id')) {
            $cat = Category::orderBy('order_level', 'DESC')->with('childrenCategories', 'parentCategory')->where('id', $request->category_id)->first();
            if ($cat) {
                $c_search = "products.category_id = " . $cat->id;
                foreach ($cat->childrenCategories as $child) {
                    $c_search .= ' OR products.category_id = ' . $child->id;
                }
                $product = $product->whereRaw($c_search);
            }
            // $product = $product->where('products.category_id', $request->category_id);
        }
        $product->leftjoin('attribute_category', 'attribute_category.category_id', '=', 'products.category_id');


        if ($request->has('filters')) {
            foreach (json_decode($request->filters) as $val => $filter) {
                $condition = "(";
                foreach ($filter as $key => $f) {
                    if ($key != 0) {
                        $condition .= " OR ";
                    }
                    $condition .= " products.choice_options like '%" . $f . "%' OR attribute_category.attribute_value like '%" . $f . "%'";
                }
                $condition .= ")";

                $product->whereRaw($condition);
            }
        }

        $product = $product->select("products.*")->groupBy('products.id')->get()->map(function($data){
            $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
            $data['specification'] = str_replace('&nbsp;', ' ',strip_tags($data['specification']));

            return $data;
        });




        if ($request->has('category_id')) {

            $filters = Attribute::join('attribute_category', 'attribute_category.attribute_id', 'attributes.id')->where('attribute_category.category_id', $request->category_id)->select('attributes.*')->groupBy('attributes.id')->with('attribute_values')->get();
            if($filters->count() == 0){
                $filters = Attribute::with('attribute_values')->get();
            }
        } else {
            $filters = Attribute::with('attribute_values')->get();
        }

         return response()->json([
            'success' => true,
            'Message'=>'successfully got it',
            'code' => 200,
            'data' => array(
                'product' => $product,
                'filters' => $filters
            )
        ]);
    }
    public function favourite(request $request){
        $rules = [
            'ids' => 'required',
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
        
        $product = Product::whereRaw(' id  IN ('.$request->ids.')')->get()->map(function($data){
            $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
            return $data;
        });
        return response()->json([
            'success' => true,
            'Message'=>'sucessfully got it',
            'code' => 200,
            'data' => array(
                'products' => $product
            )
        ]);
    }
    public function product_detail(request $request)
    {
        $rules = [
            'id' => 'required',
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

        $product = Product::query();
        if ($request->has('id')) {
            $product = $product->where('id', $request->id);
        }
   
        $product = $product->first()->append('information');
        $product->description = str_replace('&nbsp;', ' ', strip_tags($product->description));
        $product->specification = str_replace('&nbsp;', ' ', strip_tags($product->specification));
        if ($product) {
            $related = $product->where('id', '!=', $product->id)->where('category_id', $product->category_id)->inRandomOrder()->limit(5)->get()->map(function($data){
               $data['description'] = str_replace('&nbsp;', ' ', strip_tags($data['description']));
                $data['specification'] = str_replace('&nbsp;', ' ', strip_tags($data['specification']));

                return $data;
            });
        }
        return response()->json([
            'success' => true,
            'Message'=>'sucessfully got it',
            'code' => 200,
            'data' => array(
                'product' => $product,
                'product_related' => $related
            )
        ]);
    }


    public function search(request $request)
    {
         $rules = [
            'name' => 'required',
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
        $search = $request['name'];
        $product = Product::query()->where('name', 'LIKE', "%{$search}%")->get()->map(function($data){
            $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
            $data['specification'] = str_replace('&nbsp;', ' ',strip_tags($data['specification']));

            return $data;
        });
        $category = Category::query()->where('name', 'LIKE', "%{$search}%")->get()->map(function($data){
            $data['description'] = str_replace('&nbsp;', ' ',strip_tags($data['description']));
                $data['specification'] = str_replace('&nbsp;', ' ',strip_tags($data['specification']));

            return $data;
        });

        return response()->json([
            'success' => true,
            'Message'=>'successfully got it',
            'code' => 200,
            'data' => array(
                'product' => $product,
                'category' => $category

            )
        ]);
    }
}
