<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Category;
use App\Models\Catalogue;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactInquiry;
use App\Models\DealerInquiry;
use App\Models\Slider;
use App\Models\Upload;
use App\Models\AppUser;
use App\Models\Appointment;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


class ProductController extends Controller
{
    public function dashboard(Request $request){
        $data = array(
            'products' => Product::count(),
            'users' => AppUser::count(),
            'product_inquiry' => ContactInquiry::where('type','product')->count(),
            'contact_inquiry' => Appointment::count(),
            'dealer_inquiry' => DealerInquiry::where('is_approved','0')
        ->where('type','dealer')->count(),
            'vendor_inquiry' => DealerInquiry::where('is_approved','0')
        ->where('type','vendor')->count(),
            );
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => $data
        ]);
    }
    
    public function brand_list(Request $request){
        $brand = Brand::select('id','name','logo','meta_title','meta_description')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'brands' => $brand,
            )

        ]);
    }
    
    public function slider_list(Request $request){
        $brand = Slider::select('id','title','image')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'sliders' => $brand,
            )

        ]);
    }
    
    public function catalogue_list(Request $request){
        
        $search = "1";
        $order = 'id desc';
        if(isset($request->search) && $request->search != "" && $request->search != null){
            $search .= " AND LOWER(title) LIKE '%".strtolower($request->search)."%'";
            $order = " CASE WHEN LOWER(title) LIKE '".strtolower($request->search)."' THEN 1 WHEN LOWER(title) LIKE '".strtolower($request->search)."%' THEN 2 END";
        }
         $brand = Catalogue::whereRaw($search)
        ->orderByRaw($order)->paginate(10);
        
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'catalogues' => $brand,
            )

        ]);
    }

    public function category_list(Request $request){
        if(isset($request->parent)){
            $category = Category::where('parent_id',0)->with('subCategories')->get()->toArray();
        }else{
$category = Category::where('parent_id',0)->paginate(10)->through(function($data){
            
            $data['parent_name'] = $this->get_parent_name($data->parent_id);
            $data['parent_id'] = ($data->parent_id == 0)?null:$data->parent_id;
            $data['sub_categories'] = $this->get_childs($data->id);
            $data['product_count'] = Product::where('category_id',$data->id)->count();
            $data['choice_options'] = json_encode(\DB::table('attribute_category')->where('category_id',$data->id)->select('attribute_id','attribute_value as value')->get());
            return $data;
        })->toArray();        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'category' => $category,
            )

        ]);
    }
    public function new_category_list(Request $request){
        if(isset($request->parent)){
            $category = Category::select('id','name','icon','banner')->where('parent_id',0)->with('childrenCategories')->get()->toArray();
        }else{
        $category = Category::select('id','name','icon','banner')->where('parent_id',0)->paginate(10)->through(function($data){
            $data['sub_categories'] = $this->get_childs($data->id);
            $data['product_count'] = Product::where('category_id',$data->id)->count();
            return $data;
        })->toArray();
        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'category' => $category,
            )

        ]);
    }
    public function get_parent_name($id){
        return Category::where('id',$id)->first()->name??null;
    }
    public function get_childs($id){
        $cat = Category::select('id','name','icon','banner')->where('parent_id',$id)->get()->map(function($data){
            
            $data['parent_name'] = $this->get_parent_name($data->parent_id);
            $data['parent_id'] = ($data->parent_id == 0)?null:$data->parent_id;
            $data['sub_categories'] = $this->get_childs($data->id);
            $data['product_count'] = Product::where('category_id',$data->id)->count();
            $data['choice_options'] = json_encode(\DB::table('attribute_category')->where('category_id',$data->id)->select('attribute_id','attribute_value as value')->get());
            return $data;
        })->toArray();
        return $cat;
    }
    public function product_list(Request $request){
        $search = "1";
        $order = 'products.id desc';
        if(isset($request->search) && $request->search != "" && $request->search != null){
            $search .= " AND LOWER(products.name) LIKE '%".strtolower($request->search)."%'";
            $order = "CASE WHEN LOWER(products.name) LIKE '".strtolower($request->search)."' THEN 1 WHEN LOWER(products.name) LIKE '".strtolower($request->search)."%' THEN 2 END";
        }
        $product = Product::leftjoin('brands','brands.id','=','products.brand_id')
        ->leftjoin('categories','categories.id','=','products.category_id')
        ->whereRaw($search)
        ->select('products.id','products.name','categories.name as category_name','brands.name as brand_name','products.thumbnail_img','products.photos','products.pdf','products.is_new','products.is_featured','products.is_trends','products.is_popular','products.*')
        ->orderByRaw($order)
        ->paginate(10)->through(function($data){
            $data['photos_array'] = explode(',',$data->photos);
            return $data;
        });
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'product' => $product,
            )

        ]);
    }
    
    public function uploaded_files_list(Request $request){
        $rules = [
            'type' => 'in:image,document',
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
        
        
        if(isset($request->type)){
            $upload = Upload::where('type',$request->type)->orderBy('id','DESC')->paginate(10);
        }else{
            $upload = Upload::orderBy('id','DESC')->paginate(10);
        }
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'files' => $upload,
            )

        ]);
    }
    
    public function destroy_uploaded_files(Request $request)
    {
        $rules = [
            'id' => 'required|exists:uploads,id',
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
        $id = $request->id;
        $upload = Upload::findOrFail($id);
        
        // if(auth()->user()->user_type == 'seller' && $upload->user_id != auth()->user()->id){
        //     //flash(translate("You don't have permission for deleting this!"))->error();
        //     return back();
        // }
        try{
            if(env('FILESYSTEM_DRIVER') == 's3'){
                Storage::disk('s3')->delete($upload->file_name);
                if (file_exists(public_path().'/'.$upload->file_name)) {
                    unlink(public_path().'/'.$upload->file_name);
                }
            }
            else{
                unlink(public_path().'/'.$upload->file_name);
            }
            $upload->delete();
            //flash(translate('File deleted successfully'))->success();
        }
        catch(\Exception $e){
            $upload->delete();
            //flash(translate('File deleted successfully'))->success();
        }
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully deleted',
            'data' => array(
            )

        ]);
    }
    public function change_product_section(Request $request)
    {
        $rules = [
            'id' => 'required|exists:products,id',
            'type' => 'required|in:is_new,is_featured,is_trends,is_popular',
            'status' => 'required|in:0,1'
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
        if ($request->has('type') && $request->has('status') && $request->has('id')) {
            $product = Product::findOrFail($request->id);
            if ($product) {
                $product[$request->type] = $request->status;
                $product->save();
            }
             $products = Product::leftjoin('brands','brands.id','=','products.brand_id')
                ->leftjoin('categories','categories.id','=','products.category_id')
                ->select('products.id','products.name','categories.name as category_name','brands.name as brand_name','products.thumbnail_img','products.photos','products.pdf','products.is_new','products.is_featured','products.is_trends','products.is_popular')
                ->where('products.id',$request->id)->first();
          
            return response()->json([
             'success' => true,
            'code' => 200,
            'message' => 'Status Changed Successfully',
            'data' => array(
                'product' => $products,
            )

        ]);
        }
        return response()->json([
                'success' => false,
                'code' => 204,
                'message' => 'product not found',
                'data' => array(
                
                )
            ]);
    }
    public function all_colors(Request $request){
        $brand = Color::select('id','name','code')->get();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'colors' => $brand,
            )

        ]);
    }
    
    public function color_list(Request $request){
        $brand = Color::select('id','name','code')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'colors' => $brand,
            )

        ]);
    }
    
    public function attribute_list(Request $request){
        $brand = Attribute::select('id','name')->paginate(10)->through(function($data){
            $data['values'] = AttributeValue::where('attribute_id',$data->id)->pluck('value');
            return $data;
        });
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'attribute' => $brand,
            )

        ]);
    }
    
    public function attribute_values(Request $request){
        $brand = Attribute::where('id',$request->id)->select('id','name')->first();
            $brand['values'] = AttributeValue::where('attribute_id',$request->id)->pluck('value');
            
        
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'attribute' => $brand,
            )

        ]);
    }
    
    public function contact_inquiry(Request $request)
    {
        // $inquiry = ContactInquiry::
        //     where('type','contact')
        //     ->orderBy('id', 'desc')->paginate(10);
        $inquiry = Appointment::orderBy('id', 'desc')->paginate(10);
        return response()->json([   

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'contact_inquiry' => $inquiry,
            )

        ]);
    }
    public function product_inquiry(Request $request)
    {
        $inquiry = ContactInquiry::where('type','product')->with('product')->orderBy('id', 'desc')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'product_inquiry' => $inquiry,
            )

        ]);
    }
    public function dealer_inquiry(Request $request)
    {
        $inquiry = DealerInquiry::where('is_approved','0')
        // ->where('type','dealer')
        ->orderBy('id', 'desc')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'dealer_inquiry' => $inquiry,
            )

        ]);
    }
    
    public function vendor_inquiry(Request $request)
    {
        $inquiry = DealerInquiry::where('is_approved',0)
        // ->where('type','vendor')
        ->orderBy('id', 'desc')->paginate(10);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully got it',
            'data' => array(
                'vendor_inquiry' => $inquiry,
            )

        ]);
    }
    
    public function dealer_inquiry_approve(Request $request)
    {
        $d = DealerInquiry::find($request->id);
        if($d){
            $d->is_approved = '1';
            $d->save();
        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully approve it',
            'data' => array(
            )
        ]);
    }
    public function contact_inquiry_approve(Request $request)
    {
        $d = ContactInquiry::find($request->id);
        if($d){
            $d->is_approved = '1';
            $d->save();
        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully approve it',
            'data' => array(
            )
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function color_store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'code' => 'required|string'
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
        $color = new Color;
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store color',
            'data' => array(
            )
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function attribute_store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
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
        $attribute = Attribute::create(['name'=>$request->name]);
        if(isset($request->values) && $attribute){
            $values = json_decode($request->values);
            if(is_array($values)){
                foreach($values as $v){
                    AttributeValue::create(['value'=>$v,'attribute_id'=>$attribute->id]);
                }
            }
        }

        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store attribute',
            'data' => array(
            )
        ]);
    }
    
    public function brand_store(Request $request){
        $rules = [
            'name' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'logo' => 'required|integer'
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
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $brand->slug = str_replace(' ', '-', $request->slug);
        }
        else {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }

        $brand->logo = $request->logo;
        $brand->save();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store brand',
            'data' => array(
            )
        ]);
    }
    
    public function slider_store(Request $request){
        $rules = [
            'title' => 'required|string',
            'image' => 'required|string',
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
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->slider_text = $request->slider_texts??null;
        $slider->save();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store slider',
            'data' => array(
            )
        ]);
    }
    
    public function slider_update(Request $request){
        $rules = [
            'id' => 'required|exists:sliders,id',
            'title' => 'required|string',
            'image' => 'required|string',
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
        $slider = Slider::find($request->id);
        $slider->title = $request->title;
        $slider->image = $request->image;
        $slider->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully store slider',
            'data' => array()
        ]);
    }
    
    public function category_store(Request $request){
        $rules = [
            'name' => 'required|string',
            'order_level' => 'string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'icon' => 'required|integer',
            'banner' => 'required',
            'parent_id' => 'string'
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
        $category = new Category;
        $category->name = $request->name??null;
        $category->order_level = 0;
        if (isset($request->order_level) && $request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = 1;
        $category->banner = $request->banner??null;
        $category->icon = $request->icon??null;
        $category->meta_title = $request->meta_title??null;
        $category->meta_description = $request->meta_description??null;
        $category->specification = $request->specification??null;
        $category->short_description = $request->description??null;
        $category->description = $request->description??null;


        if (isset($request->parent_id) && $request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level??0 + 1;
        }else{
            $category->level = 0;
            $category->parent_id = 0;
        }

        if (isset($request->slug) && $request->slug != null) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        } else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);
        }
        $category->save();
        $choice_options = array();

        if ($request->has('choice_no') && $request->choice_no!= '' && $request->choice_no != null) {
            if(!(is_array($request->choice_no))){
            $request->choice_no = json_decode($request->choice_no);}
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_value'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                if(isset($request[$str]) && $request[$str] != '' && $request[$str] != null){
                    if(!(is_array($request[$str]))){
                    $request[$str] = json_decode($request[$str]);}
                    // $dvd = json_decode($request[$str]);
                    foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                        array_push($data, $eachValue);
                    }
                }
                

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }
        
        $category->save();
        // $category->attributes()->detach();
        if ($request['Notification']){
                $data=[];
                $data['type']="category";
                $data['image']=$category->icon;
                $data['title']=$category->meta_title;
                $data['description']=strip_tags($category->description);
                $data['type_id']=$category->id;
               $Notification= \App\Models\Notification::create($data);
            }
        foreach($request->choice_no as $c){
        $category->attributes()->attach($c,['attribute_value'=>json_encode($request['choice_options_'.$c])]);

        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store category',
            'data' => array(
            )
        ]);
    }
    public function category_update(Request $request){
        $rules = [
            'id'=>'required|exists:categories,id',
            'name' => 'required|string',
            'order_level' => 'string',
            'icon' => 'required|integer',
            'banner' => 'required',
            
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
        $category = Category::find($request->id);
        $category->name = $request->name??null;
        $category->order_level = $category->order_level;
        if (isset($request->order_level) && $request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = 1;
        $category->banner = $request->banner??null;
        $category->icon = $request->icon??null;
        $category->meta_title = $request->meta_title??null;
        $category->meta_description = $request->meta_description??null;
        $category->specification = $request->specification??null;
        $category->description = $request->description??null;
        $category->short_description = $request->description??null;


        if (isset($request->parent_id) && $request->parent_id != "0" && $request->parent_id != null && $request->parent_id != "null") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level??0 + 1;
        }else{
            $category->level = 0;
            $category->parent_id = 0;
        }

        $category->save();
        $choice_options = array();

        if ($request->has('choice_no') && $request->choice_no!= '' && $request->choice_no != null) {
            if(!(is_array($request->choice_no))){
            $request->choice_no = json_decode($request->choice_no);}
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_value'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                if(isset($request[$str]) && $request[$str] != '' && $request[$str] != null){
                    if(!(is_array($request[$str]))){
                    $request[$str] = json_decode($request[$str]);}
                    // $dvd = json_decode($request[$str]);
                    foreach ($request[$str] as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                        array_push($data, $eachValue);
                    }
                }
                

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }
        
        $category->save();
        // $category->attributes()->detach();
        
        foreach($request->choice_no as $c){
        $category->attributes()->attach($c,['attribute_value'=>json_encode($request['choice_options_'.$c])]);

        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully updated category',
            'data' => array(
            )
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_store(Request $request)
    {
        $rules = [
            'name' => 'required|string',
            'parent_id' => 'string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'photos' => 'required|string',
            'thumbnail_img' => 'required|integer',
            'pdf' => 'required|integer',
            
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
        $product = new Product;
        $product->name = $request->name??null;
        $product->user_id = 1;
        $product->category_id = $request->category_id??null;
        $product->brand_id = $request->brand_id??null;
        $product->photos = $request->photos??null;
        $product->thumbnail_img = $request->thumbnail_img??null;
        $product->tags = $request->tags??null;
        $product->pdf = $request->pdf??null;

        $product->description = $request->description??null;
        $product->specification = $request->specification??null;
        $product->video_provider = $request->video_provider??null;
        $product->video_link = $request->video_link??null;
        $product->meta_title = $request->meta_title??null;
        $product->meta_description = $request->meta_description??null;
        if ($request->has('meta_img')) {
            $product->meta_img = $request->meta_img??null;
        } else {
            $product->meta_img = $product->thumbnail_img??null;
        }
        if ($product->meta_title == null) {
            $product->meta_title = $product->name??null;
        }
        if ($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description??null);
        }
        if ($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img??null;
        }

        // if (Product::where('slug', $product->slug)->count() > 0) {
        //     flash(__('Another product exists with same slug. Please change the slug!'))->warning();
        //     return back();
        // }

        if ($request->has('colors') && is_array($request->colors) && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            $colors = array();
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        if ($request->has('choice_no')  && is_array($request->choice_no) && count($request->choice_no) > 0) {
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
        $product->id;
        if ($request['Notification']){
            $data=[];
            $data['type']="product";
            $data['image']=$product->photos;
            $data['title']=$product->meta_title;
            $data['description']=strip_tags($product->description);
            $data['type_id']=$product->id;
           $Notification= Notification::create($data);
        }
        


        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no') && is_array($request->choice_no) && count($request->choice_no) > 0) {
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

        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store product',
            'data' => array(
            )
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function product_update(Request $request)
    {
        $rules = [
            'id'=>'required|exists:products,id',
            'name' => 'required|string',
            'parent_id' => 'string',
            'category_id' => 'required|integer',
            'brand_id' => 'required|integer',
            'photos' => 'required|string',
            'thumbnail_img' => 'required|integer',

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
        $product = Product::find($request->id);
        $product->name = $request->name??null;
        $product->user_id = 1;
        $product->category_id = $request->category_id??null;
        $product->brand_id = $request->brand_id??null;
        $product->photos = $request->photos??null;
        $product->thumbnail_img = $request->thumbnail_img??null;
        $product->tags = $request->tags??null;
        $product->pdf = $request->pdf??null;

        $product->description = $request->description??null;
        $product->specification = $request->specification??null;
        $product->video_provider = $request->video_provider??null;
        $product->video_link = $request->video_link??null;
        $product->meta_title = $request->meta_title??null;
        $product->meta_description = $request->meta_description??null;
        if ($request->has('meta_img')) {
            $product->meta_img = $request->meta_img??null;
        } else {
            $product->meta_img = $product->thumbnail_img??null;
        }
        if ($product->meta_title == null) {
            $product->meta_title = $product->name??null;
        }
        if ($product->meta_description == null) {
            $product->meta_description = strip_tags($product->description??null);
        }
        if ($product->meta_img == null) {
            $product->meta_img = $product->thumbnail_img??null;
        }
        $product->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', strtolower($request->name))). '-' . Str::random(5);

        // if (Product::where('slug', $product->slug)->count() > 0) {
        //     flash(__('Another product exists with same slug. Please change the slug!'))->warning();
        //     return back();
        // }

        if ($request->has('colors') && is_array($request->colors) && count($request->colors) > 0) {
            $product->colors = json_encode($request->colors);
        } else {
            if($request->has('colors') && is_array(json_decode($request->colors)) && count(json_decode($request->colors)) > 0){
                
                $colors = json_decode($request->colors);
            }else{
            $colors = array();
                
            }
            $product->colors = json_encode($colors);
        }

        $choice_options = array();

        // if ($request->has('choice_no')  && is_array($request->choice_no) && count($request->choice_no) > 0) {
        //     foreach ($request->choice_no as $key => $no) {
        //         $str = 'choice_options_' . $no;

        //         $item['attribute_id'] = $no;

        //         $data = array();
        //         // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
        //         foreach ($request[$str] as $key => $eachValue) {
        //             // array_push($data, $eachValue->value);
        //             array_push($data, $eachValue);
        //         }

        //         $item['values'] = $data;
        //         array_push($choice_options, $item);
        //     }
        // }else
        if($request->has('choice_no')){
            if( is_array(json_decode($request->choice_no)) && count(json_decode($request->choice_no)) > 0){
                $c = json_decode($request->choice_no);
            }else if(is_array($request->choice_no) && count($request->choice_no) > 0){
                $c = $request->choice_no;
            }else{
                $c = array();
            }
            foreach (json_decode($request->choice_no) as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_id'] = $no;

                $data = array();
                // foreach (json_decode($request[$str][0]) as $key => $eachValue) {
                if( is_array(json_decode($request[$str])) && count(json_decode($request[$str])) > 0){
                $e = json_decode($request[$str]);
            }else if(is_array($request[$str]) && count($request[$str]) > 0){
                $e = $request[$str];
            }else{
                $e = array();
            }
                foreach ($e as $key => $eachValue) {
                    // array_push($data, $eachValue->value);
                    array_push($data, $eachValue);
                }

                $item['values'] = $data;
                array_push($choice_options, $item);
            }
        }

        if (!empty($request->choice_no)) {
            if(is_array($request->choice_no)){
            $product->attributes = json_encode($request->choice_no);
            }else{
                $product->attributes = $request->choice_no;
            }
                
        } else {
            $product->attributes = json_encode(array());
        }

        $product->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        $product->published = 1;

        if ($request->has('cash_on_delivery')) {
            $product->cash_on_delivery = 1;
        }else{
            $product->cash_on_delivery = 0;
        }
        if ($request->has('featured')) {
            $product->featured = 1;
        }else{
            $product->featured = 0;
        }
        if ($request->has('todays_deal')) {
            $product->todays_deal = 1;
        }else{
            $product->todays_deal = 0;
        }
        // $product->cash_on_delivery = 0;
        //$variations = array();
        if ($request->has('is_featured')) {
            $product->is_featured = 1;
        }else{
            $product->is_featured = 0;
        }
        if ($request->has('is_popular')) {
            $product->is_popular = 1;
        }else{
            $product->is_popular = 0;
        }
        if ($request->has('is_new')) {
            $product->is_new = 1;
        }else{
            $product->is_new = 0;
        }
        if ($request->has('is_trends')) {
            $product->is_trends = 1;
        }else{
            $product->is_trends = 0;
        }

        $product->save();
        
        


        //combinations start
        $options = array();
        if ($request->has('colors_active') && $request->has('colors') && count($request->colors) > 0) {
            $colors_active = 1;
            array_push($options, $request->colors);
        }

        if ($request->has('choice_no') && is_array($request->choice_no) && count($request->choice_no) > 0) {
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

        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store product',
            'data' => array(
            )
        ]);
    }
    public function color_delete(Request $request){
        $rules = [
            'id' => 'required|exists:colors,id'
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
        $id = $request->id;
        $attribute = Color::findOrFail($id);
        Color::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Color deleted successfully',
            'data' => array(
            )
        ]);
    }
    
    public function brand_delete(Request $request){
        $rules = [
            'id' => 'required|exists:brands,id'
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
        $id = $request->id;
        $attribute = Brand::findOrFail($id);
        Brand::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Brand deleted successfully',
            'data' => array(
            )
        ]);
    }
     public function slider_delete(Request $request){
        $rules = [
            'id' => 'required|exists:sliders,id'
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
        $id = $request->id;
        Slider::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Slider deleted successfully',
            'data' => array(
            )
        ]);
    }
    public function attribute_delete(Request $request){
        $rules = [
            'id' => 'required|exists:attributes,id'
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
        $id = $request->id;
        $attribute = Attribute::findOrFail($id);
        Attribute::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Attribute deleted successfully',
            'data' => array(
            )
        ]);
    }
    
    public function product_delete(Request $request){
        $rules = [
            'id' => 'required|exists:products,id'
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
        $id = $request->id;
        $attribute = Product::findOrFail($id);
        Product::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Product deleted successfully',
            'data' => array(
            )
        ]);
    }
    
    public function category_delete(Request $request){
        $rules = [
            'id' => 'required|exists:categories,id'
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
        $id = $request->id;
        $attribute = Category::with('childrenCategories')->findOrFail($id);
        $get = $this->delete_child($attribute);
        if ($get) {
            Category::destroy($id);
        }
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Category deleted successfully',
            'data' => array(
            )
        ]);
    }
    public function delete_child($array)
    {
        $attribute = Category::with('childrenCategories')->findOrFail($array->id);
        if ($attribute->childrenCategories) {
            foreach ($attribute->childrenCategories as $cat) {
                $attribute = Category::with('childrenCategories')->findOrFail($cat->id);
                $get = $this->delete_child($attribute);
                if ($get) {
                    $attribute->delete();
                }
            }
        }
        return true;
    }
    
    public function color_edit(Request $request){
        $rules = [
            'id' => 'required|exists:colors,id'
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
        $id = $request->id;
        $attribute = Color::findOrFail($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Color get successfully',
            'data' => $attribute
        ]);
    }
    
    public function color_update(Request $request){
        $rules = [
            'id' => 'required|exists:colors,id',
            'code' => 'required',
            'name' => 'required'
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
        $id = $request->id;
        $color = Color::findOrFail($id);
        $color->name = $request->name;
        $color->code = $request->code;
        $color->save();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Color updated successfully',
            'data' => $color
        ]);
    }
    public function attribute_update(Request $request){
        $rules = [
            'name' => 'required|string',
            'id' => 'required|exists:attributes,id'
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
        $attribute = Attribute::where('id',$request->id)->update(['name'=>$request->name]);
        $attribute = Attribute::find($request->id);
        if(isset($request->values) && $attribute){
            $values = json_decode($request->values);
            
            if(is_array($values)){
                AttributeValue::whereNotIn('value',$values)->where('attribute_id',$attribute->id)->delete();
                foreach($values as $v){
                    if(AttributeValue::where(['value'=>$v,'attribute_id'=>$attribute->id])->count() > 0){
                    }else{
                        AttributeValue::create(['value'=>$v,'attribute_id'=>$attribute->id]);
                    }
                }
            }
        }

        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully store attribute',
            'data' => array(
            )
        ]);
    }
    public function brand_update(Request $request){
        $rules = [
            'name' => 'required|string',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'logo' => 'required|integer',
            'id' => 'required|exists:brands,id'
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
        $id = $request->id;
        $brand = Brand::findOrFail($id);
        //if($request->lang == env("DEFAULT_LANGUAGE")){
            $brand->name = $request->name;
        //}
        $brand->meta_title = $request->meta_title;
        $brand->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $brand->slug = strtolower($request->slug);
        }
        else {
            $brand->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)).'-'.Str::random(5);
        }
        $brand->logo = $request->logo;
        $brand->save();
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'successfully update brand',
            'data' => array(
            )
        ]);
    }
    
    public function catalogue_store(Request $request){
        $rules = [
            'title' => 'required|string',
            'image' => 'required|string',
            'pdf' => 'required|string',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
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
        
        $categories = Category::where('id',$request->category_id)->first();
        $parent_id = $this->get_parent_cat($categories);
        $catalogue = new Catalogue();
        $catalogue->title = $request->title;
        $catalogue->image = $request->image;
        $catalogue->pdf = $request->pdf;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->parentcategory_id = $parent_id;
        $catalogue->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully store catalogue',
            'data' => array(
            )
        ]);
    }
    
     public function catalogue_update(Request $request){
        $rules = [
            'id' => 'required|exists:catalogues,id',
            'title' => 'required|string',
            'image' => 'required|string',
            'pdf' => 'required|string',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id'
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
        
        $categories = Category::where('id',$request->category_id)->first();
        $parent_id = $this->get_parent_cat($categories);
        $catalogue = Catalogue::find($request->id);
        $catalogue->title = $request->title;
        $catalogue->image = $request->image;
        $catalogue->pdf = $request->pdf;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->parentcategory_id = $parent_id;
        $catalogue->save();
        return response()->json([
            'success' => true,
            'code' => 200,
            'message' => 'successfully updated catalogue',
            'data' => array(
            )
        ]);
    }
    
    public function catalogue_delete(Request $request){
        $rules = [
            'id' => 'required|exists:catalogues,id'
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
        $id = $request->id;
        $attribute = Catalogue::findOrFail($id);
        Catalogue::destroy($id);
        return response()->json([

            'success' => true,
            'code' => 200,
            'message' => 'Catalogue deleted successfully',
            'data' => array(
            )
        ]);
    }
    
    public function get_parent_cat($category){
        if($category->parent_id == 0){
            return $category->id;
        }else{
            $cat = Category::where('id',$category->parent_id)->first();
            return $this->get_parent_cat($cat);
        }
    }
}
