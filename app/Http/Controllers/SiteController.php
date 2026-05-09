<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\Attribute;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Catalogue;
use App\Models\Category;
use App\Models\Color;
use App\Models\ContactInquiry;
use App\Models\DealerInquiry;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use PhpParser\Node\Stmt\Catch_;
use App\Mail\Mail as RMAIL;
use App\Models\Address;
use Illuminate\Support\Facades\Mail as FacadesMail;

class SiteController extends Controller
{
    public function __construct()
    {
        ini_set('memory_limit', '512M');
    }


    public function home()
    {
        $sliders = Slider::where('status', 1)->get();
        $blog = Blog::where('status', 0)->limit(4)->get();
        $categories = Category::orderBy('order_level')->get();
        return view('fontend.pages.home', compact('blog', 'sliders', 'categories'));
    }

    public function gallery()
    {
        $gallery = Gallery::get();
        return view('fontend.pages.gallery', compact('gallery'));
    }


    public function product(Request $request, $slug = null)
    {
        if ($slug == null && !($request->has('search') || $request->has('colors') || $request->has('page') || $request->has('selected_attribute_values'))) {
            return redirect()->route('site.category');
        }
        $breadcrumb = 'PRODUCTS';
        if ($slug != null) {
            $cat = Category::orderBy('order_level', 'DESC')->with('childrenCategories', 'parentCategory')->where('slug', $slug)->first();
            if ($cat) {
                if ($cat->subCategories()->exists()) {
                    return redirect()->route('site.category', $cat->slug);
                }
                $breadcrumb = (isset($cat->parentCategory->name)) ? '<a href="' . route('site.product', $cat->parentCategory->slug) . '">' . $cat->parentCategory->name . '</a> / ' . $cat->name : '<a href="' . route('site.product') . '">PRODUCTS / </a>' . $cat->name;
                $c_search = "category_id = " . $cat->id;
                foreach ($cat->childrenCategories as $child) {
                    $c_search .= ' OR category_id = ' . $child->id;
                }
                $products = Product::whereRaw($c_search);
            } else {
                $products = Product::query();
            }
        } else {
            $products = Product::query();
        }
        $selected_attribute_values = array();
        $selected_colors = array();
        $attributes = Attribute::all();
        $colors = Color::all();
        $products = $products->leftjoin(DB::raw('(SELECT category_id as cat_id,attribute_id as attr_id from attribute_category) as attr_cat'), 'attr_cat.cat_id', '=', 'products.category_id');
        $products = $products->leftjoin(DB::raw('(SELECT value as cat_attr_value,attribute_id as attr_ids from attribute_values) as attr_vals'), 'attr_vals.attr_ids', '=', 'attr_cat.attr_id');

        if ($request->has('search')) {
            $products = $products->whereRaw("(( name LIKE '%" . $request->search . "%' )  OR (name LIKE '%" . $request->description . "%'))");
        }
        if ($request->has('colors')) {
            $selected_colors = $request->colors;
            foreach ($selected_colors as $key => $value) {
                $str = '"' . $value . '"';
                $products = $products->where('colors', 'like', '%' . $str . '%');
            }
        }
        if ($request->has('selected_attribute_values')) {
            $selected_attribute_values = $request->selected_attribute_values;
            foreach ($selected_attribute_values as $key => $values) {
                $condition = '(';
                foreach ($values as $keys => $value) {
                    if ($keys != 0) {
                        $condition .= ' OR ';
                    }
                    $condition .= 'choice_options like "%' . $value . '%" OR cat_attr_value like "%' . $value . '%"';
                }
                $condition .= ')';
                $products = $products->whereRaw($condition);
            }
        }
        $products = $products->select('products.*')->groupBy('id')->orderBy('products.name')->paginate(12);
        $meta = ['meta_title' => $cat->meta_title ?? null, 'meta_description' => $cat->meta_description ?? null, 'meta_keys' => $cat->meta_keywords ?? null];
        $innet_titles = [];
        $innet_titles['title'] = $cat->name ?? "Products";
        $innet_titles['category_desc'] = $cat->short_description ?? NULL;
        $innet_titles['img'] = isset($cat->banner) ? $cat->banner_url : asset('assets/images/img1.jpg');
        $innet_titles['desc'] = $cat->short_description ?? 'BEAUTIFUL COLLECTIONS OF ITEMS';
        return view('fontend.pages.product', compact('breadcrumb',  'colors', 'selected_colors', 'slug', 'selected_attribute_values', 'innet_titles', 'attributes', 'products', 'meta'));
    }


    public function product_detail(Request $request, $slug = null)
    {
        $product = Product::where('slug', $slug)->first();
        if ($product) {
            $related = Product::where('id', '!=', $product->id)
                ->where('category_id', $product->category_id)
                ->inRandomOrder()
                ->limit(4)
                ->get();
            $remaining = 4 - $related->count();
            if ($remaining > 0) {
                $additionalRelated = Product::where('id', '!=', $product->id)
                    ->where('category_id', '<>', $product->category_id)
                    ->inRandomOrder()
                    ->limit($remaining)
                    ->get();

                $related = $related->merge($additionalRelated);
            }
            $meta = ['meta_title' => $product->meta_title, 'meta_description' => $product->meta_description, 'meta_keys' => $product->name, 'meta_image' => $product->meta_img];
            return view('fontend.pages.product_detail', compact('product', 'meta', 'related'));
        }
        return redirect()->back();
    }

    public function home_trends(Request $request, $slug = null)
    {
        $products = Product::where('is_new', 1)->orWhere('is_popular', 1)->get();
        return view('fontend.pages.home_trend', compact('products'));
    }

    public function featured(Request $request, $slug = null)
    {
        $products = Product::where('is_featured', 1)->get();
        return view('fontend.pages.featured', compact('products'));
    }

    public function top_trending(Request $request, $slug = null)
    {
        $products = Product::where('is_trends', 1)->get();
        return view('fontend.pages.top_trending', compact('products'));
    }

    // public function category()
    // {
    //     $parentcategory = Category::orderBy('order_level', 'DESC')->where('level', 0)->get();
    //     $childcategory = Category::orderBy('order_level', 'DESC')->with('parentCategory')->where('level', '!=', 0)->get();
    //     return view('fontend.pages.category', compact('parentcategory', 'childcategory'));
    // }



    public function category($slug = null)
    {
        if ($slug != null) {
            $category = Category::with('childrenCategories')->where('slug', $slug)->first();
            if ($category->childrenCategories->count() == 0) {
                return redirect()->route('site.product', $slug);
            }
            $meta = ['meta_title' => $category->meta_title, 'meta_description' => $category->meta_description, 'meta_keys' => $category->meta_keywords];
            $data = ['title' => $category->name, 'subtitle' => $category->short_description, 'image' => $category->banner_url??asset('assets/images/image/product-1.png')];
            $main_parentcategory = $category->childrenCategories;
            return view('fontend.pages.category', compact('main_parentcategory', 'data', 'meta'));
        } else {
            $main_parentcategory = Category::where('level', 0)->get();
            $data = ['title' => 'Our Collection', 'subtitle' => 'Design that speaks about your style', 'image' => asset('assets/images/image/product-1.png')];
            return view('fontend.pages.category', compact('main_parentcategory', 'data'));
        }



        $main_parentcategory = Category::where('level', 0)->get();
        if ($slug == null) {
            $data = ['title' => 'Our Products', 'subtitle' => 'Tiles &amp; Bathware products collections.', 'image' => asset('fontend/images/product-header.png')];
            $catalogue = Catalogue::limit(3)->orderBy('is_home', 'DESC')->get();
            return view('fontend.pages.category', compact('main_parentcategory', 'data', 'catalogue'));
        }
        $category = Category::with('childrenCategories')->where('slug', $slug)->first();
        if ($category->childrenCategories->count() == 0) {
            return redirect()->route('site.product', $slug);
        }
        $meta = ['meta_title' => $category->meta_title, 'meta_description' => $category->meta_description, 'meta_keys' => $category->meta_keywords];
        $data = ['title' => 'Our Products (' . $category->name . ')', 'subtitle' => $category->short_description, 'image' => asset('fontend/images/product-header.png')];
        $parentcategory = $category->childrenCategories;
        $catalogue = Catalogue::limit(3)->orderByRaw('CASE WHEN category_id = ' . $category->id . ' AND is_home = 1 THEN 1 
                                                            WHEN category_id = ' . $category->id . ' THEN 2 
                                                            WHEN parentcategory_id = ' . $category->id . ' AND is_home = 1 THEN 3 
                                                            WHEN parentcategory_id = ' . $category->id . ' THEN 4  
                                                            WHEN is_home = 1 THEN 5 
                                                            ELSE 6 END')->get();
        return view('fontend.pages.category', compact('parentcategory', 'main_parentcategory', 'catalogue', 'category', 'meta', 'data'));
    }

    public function about()
    {
        return view('fontend.pages.about');
    }

    public function cdm_message()
    {
        return view('fontend.pages.cdm_message');
    }

    public function news(Request $request)
    {
        $blog = Blog::where('slug', $request->slug)->orWhere('id', $request->id)->first();
        $related = Blog::where('id', '!=', $request->id)->where('category_id', $request->category_id)->inRandomOrder()->limit(3)->get();

        if (!($related->count() > 0)) {
            $related = Blog::where('id', '!=', $request->id)->inRandomOrder()->limit(3)->get();
        }
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(6);
        $blog_category = BlogCategory::orderBy('order_level', 'DESC')->get();
        return view('fontend.pages.blogs', compact('blog', 'related', 'blogs', 'blog_category'));
    }

    public function catalogue_detail($id)
    {
        $catalogue_d = Catalogue::where('id', $id)->first();
        $category = Category::where('id', $catalogue_d->category_id)->first();
        // $parentcategory=Category::where('id',$category->parent_id)->first();

        // return $category;
        return view('fontend.pages.catalogue_detail', compact('catalogue_d', 'category'));
    }
    public function blog_detail($slug)
    {
        $blog = Blog::where('slug', $slug)->orWhere('id', $slug)->first();
        $related = Blog::where('id', '!=', $blog->id)->where('category_id', $blog->category_id)->inRandomOrder()->limit(3)->get();
        if (!($related->count() > 0)) {
            $related = Blog::where('id', '!=', $blog->id)->inRandomOrder()->limit(3)->get();
        }
        $latest = Blog::orderBy('created_at', 'DESC')->whereNotIn('id', $related->pluck('id'))->limit(5)->get();
        $blog_category = BlogCategory::orderBy('order_level', 'DESC')->get();
        $meta = ['meta_title' => $blog->meta_title, 'meta_description' => $blog->meta_description, 'meta_keys' => $blog->meta_keywords, 'meta_image' => $blog->meta_img];
        return view('fontend.pages.blog_detail', compact('meta', 'blog_category', 'blog', 'latest', 'related'));
    }
    public function calculator()
    {
        return view('fontend.pages.calculator');
    }
    public function packings_specifications()
    {
        $category = Category::where('specification', '!=', null)->where('parent_id', 0)->get();
        return view('fontend.pages.specification', compact('category'));
    }
    public function catalogue(Request $request)
    {
        // $catalogue_category = Catalogue::with('category')->groupBy('parentcategory_id')->get();
        $catalogue = Catalogue::leftjoin('categories as c0', 'c0.id', '=', 'catalogues.category_id');
        $max = Category::max('order_level');
        $select = ",CONCAT('-',IFNULL(c0.id,0)";
        for ($i = 1; $i <= $max; $i++) {
            $catalogue->leftjoin('categories as c' . $i, 'c' . $i . '.id', '=', 'c' . ($i - 1) . '.parent_id');
            $select .= ",'-'," . 'IFNULL(c' . $i . ".id,0)";
        }
        $select .= ",'-') as cat_ids";
        $catalogue = $catalogue->selectRaw('catalogues.*' . $select)->get();
        // return $catalogue;
        // if(isset($request->sc) &&  !empty($request->sc)){
        //     $catalogue = Catalogue::where('category_id',$request->sc)->get();            
        // }else{
        //     $catalogue = [];
        // }
        return view('fontend.pages.catalogue', compact('catalogue', 'request'));
    }
    public function contact(Request $request)
    {
        return view('fontend.pages.contact', $request);
    }

    public function quotation_form_submit(Request $request)
    {
        $data = [];
        $data['name'] = $request->quotation_rname;
        $data['email'] = $request->quotation_emailaddress;
        $data['phone'] = $request->quotation_telephone;
        $data['subject'] = '-';
        $data['message'] = $request->quotation_message;
        $data['quantity'] = $request->quotation_quantity;

        $data['type'] = 'quotation';
        $data['type_id'] = $request->quotation_category ?? 0;

        $inquiry = ContactInquiry::create($data);
        if ($inquiry) {
            try {
                $details = $data;
                $html = view('backend.email_templates.contact_inquiry2', compact('details'))->render();
                FacadesMail::to(site_settings('receive_email', true))->send(new RMail($html));
                echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
            } catch (\Exception $e) {
                echo '<div class="alert notification alert-success">Message has been sent successfully!.</div>';
            }
        } else {
            echo '<div class="alert notification alert-error">Message not sent - server error occured!</div>';
        }
    }

    public function product_form_submit(Request $request)
    {
        $data = [];
        $data['name'] = $request->complete_name;
        $data['email'] = $request->email_address;
        $data['phone'] = $request->phone_no;
        $data['subject'] = $request->product_grade;
        $data['message'] = $request->message;
        $data['qty'] = $request->area;
        $data['type'] = $request->size ?? "PRODUCT";
        $data['type_id'] = 0;
        $inquiry = ContactInquiry::create($data);
        if ($inquiry) {
            // try {
            $details = $data;
            // $html = view('backend.email_templates.contact_inquiry2', compact('details'))->render();
            Mail::to(site_settings('receive_email', true))->send(new RMail($details));
            echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
            // } catch (\Exception $e) {
            //     echo '<div class="alert notification alert-success">Message has been sent successfully!.</div>';
            // }
        } else {
            echo '<div class="alert notification alert-error">Message not sent - server error occured!</div>';
        }
        return '';
    }

    public function contact_form_submit(Request $request)
    {
        $data = [];
        $data['name'] = $request->sendername;
        $data['email'] = $request->emailaddress;
        $data['phone'] = $request->telephone ?? "-";
        $data['subject'] = $request->sendersubject ?? "Contact Inquiry";
        $data['message'] = $request->sendermessage;
        if (isset($request->type) && $request->type == 'product') {
            $data['type'] = $request->type;
            $data['type_id'] = $request->type_id;
        }
        $inquiry = ContactInquiry::create($data);

        if ($inquiry) {
            $details = $data;
            try {
                $data['template'] = 'backend.email_templates.contact_inquiry_thankyou';
                // Mail::to($data['email'])->send(new SendMail($data));
                $data['template'] = 'backend.email_templates.contact_inquiry';
                $html = view('backend.email_templates.contact_inquiry', compact('details'))->render();

                // Mail::to('jaygadhiya2682@gmail.com' ?? site_settings('receive_email', true))->send(new SendMail($data));
                // $details = $data;
                // $html = view('backend.email_templates.contact_inquiry', compact('details'))->render();
                // FacadesMail::to(site_settings('receive_email', true))->send(new RMail($html));
                echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
            } catch (\Exception $e) {
                echo '<div class="alert notification alert-success">Message has been sent successfully!.</div>';
            }
            // echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
        } else {
            echo '<div class="alert notification alert-error">Message not sent - server error occured!</div>';
        }
        return '';
    }
    public function vendor_form_submit(Request $request)
    {
        $data = [];
        $data['company_name'] = $request->companyname;
        $data['name'] = $request->sendername;
        $data['email'] = $request->emailaddress;
        $data['phone'] = $request->telephone;
        $data['country'] = $request->country;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['zipcode'] = $request->zip;
        $data['address'] = $request->address;
        $data['subject'] = $request->sendersubject;
        $data['message'] = $request->sendermessage;
        $data['product_type'] = json_encode($request->product_category);
        $data['type'] = 'vendor';
        $inquiry = DealerInquiry::create($data);
        if ($inquiry) {
            $data['template'] = 'backend.email_templates.contact_inquiry_thankyou';
            Mail::to($data['email'])->send(new SendMail($data));
            $data['template'] = 'backend.email_templates.dealer_inquiry';
            Mail::to(config('app.receved_mail_address'))->send(new SendMail($data));
            echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
        } else {
            echo '<div class="alert notification alert-error">Message not sent - server error occured!</div>';
        }
    }
    public function dealer_form_submit(Request $request)
    {
        $data = [];
        $data['company_name'] = $request->companyname;
        $data['name'] = $request->sendername;
        $data['email'] = $request->emailaddress;
        $data['phone'] = $request->telephone;
        $data['country'] = $request->country;
        $data['state'] = $request->state;
        $data['city'] = $request->city;
        $data['zipcode'] = $request->zip;
        $data['address'] = $request->address;
        $data['subject'] = $request->sendersubject;
        $data['message'] = $request->sendermessage;
        $data['product_type'] = json_encode($request->product_category);
        $data['type'] = $request->type;
        $inquiry = DealerInquiry::create($data);
        if ($inquiry) {
            echo '<div class="alert notification alert-success">Message has been sent successfully!</div>';
        } else {
            echo '<div class="alert notification alert-error">Message not sent - server error occured!</div>';
        }
    }
    public function dealer()
    {
        return view('fontend.pages.dealer');
    }
    public function certification()
    {
        return view('fontend.pages.certification');
    }
    public function dealer_locater()
    {
        $dealers = DealerInquiry::where('is_approved', '1')->where('type', 'dealer')->orderBy('id')->get();
        return view('fontend.pages.dealer_locater', compact('dealers'));
    }
    public function dealer_locater_data(Request $request)
    {
        $dealers = DealerInquiry::where('is_approved', '1')->where('type', 'dealer')->orderBy('id');
        if ($request->has('keyword')) {
            $dealers->whereRaw("((company_name LIKE '%" . $request->keyword . "%') OR (name LIKE '%" . $request->keyword . "%') OR (phone LIKE '%" . $request->keyword . "%'))");
        }
        if ($request->has('country') && $request->country != 0) {
            $dealers->where('country', $request->country);
        }
        if ($request->has('state') && $request->state != 0) {
            $dealers->where('state', $request->state);
        }
        if ($request->has('city') && $request->city != 0) {
            $dealers->where('city', $request->city);
        }
        $dealers = $dealers->get();
        return response(view('fontend.pages.dealer_locater_data', compact('dealers'))->render());
    }
    public function export()
    {
        return view('fontend.pages.export');
    }

    public function product_information()
    {
        return view('fontend.pages.product_information');
    }

    public function product_quality()
    {
        return view('fontend.pages.Product_quality');
    }

    public function technical_specification()
    {
        return view('fontend.pages.technical_specification');
    }

    public function dealers()
    {
        return view('fontend.pages.dealer');
    }

    public function laying_guide()
    {
        return view('fontend.pages.laying_guide');
    }
    public function collaborator()
    {
        return view('fontend.pages.collaborator');
    }
    public function captcha_process(Request $request)
    {
        if (isset($request->captcha)) {
            if (strtoupper($request->captcha) == session()->get('gfm_captcha')) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else if (isset($request->quotation_captcha)) {
            if (strtoupper($request->quotation_captcha) == session()->get('quotation_gfm_captcha')) {
                echo 'true';
            } else {
                echo session()->get('quotation_gfm_captcha');
            }
        } else if (isset($request->product_captcha)) {
            if (strtoupper($request->product_captcha) == session()->get('product_gfm_captcha')) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'false';
        }
    }
    public function captcha($type = null)
    {
        if ($type == 'product') {
            if (!isset($_SESSION['product_gfm_captcha']))
                $capt_string = 'ERROR!';
            else
                $capt_string = session()->get('product_gfm_captcha');

            $rand_char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));
            $capt_string = rand(1, 7) . rand(1, 7) . $rand_char;
            session()->put('product_gfm_captcha', $capt_string);
        } else if ($type == 'quotation') {
            if (!isset($_SESSION['quotation_gfm_captcha']))
                $capt_string = 'ERROR!';
            else
                $capt_string = session()->get('quotation_gfm_captcha');

            $rand_char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));
            $capt_string = rand(1, 7) . rand(1, 7) . $rand_char;
            session()->put('quotation_gfm_captcha', $capt_string);
        } else {
            if (!isset($_SESSION['gfm_captcha']))
                $capt_string = 'ERROR!';
            else
                $capt_string = session()->get('gfm_captcha');

            $rand_char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));
            $capt_string = rand(1, 7) . rand(1, 7) . $rand_char;
            session()->put('gfm_captcha', $capt_string);
        }

        header('Cache-control: no-cache');
        //Set the font 
        $font  = public_path('php/captcha/fonts/zxxnoise.otf');
        // Set the image settings
        $image = imagecreatetruecolor(118, 15);
        $black = imagecolorallocate($image, 0, 0, 0);
        $color = imagecolorallocate($image, 36, 49, 64);
        $white = imagecolorallocate($image, 187, 187, 187);
        imagefilledrectangle($image, 0, 0, 399, 99, $white);
        // Draw the image
        imagettftext($image, 15, 0, 15, 15, $color, $font, $capt_string);
        // Output image
        header('Content-type: image/png');
        imagepng($image);
        imagedestroy($image);
    }
}
