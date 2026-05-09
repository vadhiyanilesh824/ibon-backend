<?php

namespace App\Http\Controllers\api\V1;
use App\Http\Controllers\Controller;
use App\Models\AttributeValue;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Attribute;

class HomeController extends Controller
{
   public function home()
   {    
       $slider=Slider::all();
       $category=Category::where ('parent_id',0)->get();
       $products=Product::where('is_popular',1)->limit(10)->get();
       $attributes = array();
       $count = 0;
       foreach(AttributeValue::where('attribute_id', Attribute::where('name','Size')->first()->id)->get() as $a){
            $product = Product::whereRaw('choice_options like "%'.$a->value.'%"')->inRandomOrder()->first();
            if($product && $count < 10){
                $p = array('name'=>$a->value,'image_url'=>$product->thumbnail_img_url);
                array_push($attributes,$p);
                $count++;
            }
       }
     return response()->json([
       
           'success'=>true,
           'code'=>200,
           'data'=>array(
            'slider'=>$slider,
            'category'=>$category,
            'product'=>$products,
            'sizes'=>$attributes
           )
          
       ]);


       
   }
}
