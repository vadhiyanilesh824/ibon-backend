<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Category;
use App\Services\CategoryUtility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        foreach (Category::where('slug', null)->get() as $category) {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $category->name)) . '-' . Str::random(5);
            $category->save();
        }
        $categories = Category::orderBy('id', 'asc')->get();
        return view('backend.product.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories')
            ->get();

        return view('backend.product.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $category = new Category;
        $category->name = $request->name;
        $category->order_level = 0;
        if ($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->special = $request->special??0;
        $category->featured = $request->featured??0;
        $category->top = $request->top??0;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->specification = $request->specification;
        $category->description = $request->description;
        $category->short_description = $request->short_description;
        $category->meta_keywords = $request->meta_keywords;



        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1;
        }


        $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);
        $category->save();
        $choice_options = array();

        if ($request->has('choice_no')) {
            foreach ($request->choice_no as $key => $no) {
                $str = 'choice_options_' . $no;

                $item['attribute_value'] = $no;

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
        // if (!empty($request->choice_no)) {
        //     $category->attributes = json_encode($request->choice_no);
        // } else {
        //     $category->attributes = json_encode(array());
        // }

        // $category->choice_options = json_encode($choice_options, JSON_UNESCAPED_UNICODE);

        // $category->published = 1;

        $category->save();
        $category->attributes()->detach();
        if (is_array($request->choice_no)) {
            foreach ($request->choice_no as $c) {
                $category->attributes()->attach($c, ['attribute_value' => json_encode($request['choice_options_' . $c])]);
            }
        }


        flash(__('Category has been inserted successfully'))->success();
        //return redirect()->back();
        return redirect()->route('category');
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
        $category = Category::with('attributes')->findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->with('childrenCategories', 'attributes')
            ->whereNotIn('id', CategoryUtility::children_ids($category->id, true))->where('id', '!=', $category->id)
            ->orderBy('name', 'asc')
            ->get();
        // return $category;
        return view('backend.product.category.edit', compact('category', 'categories'));
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
        $category = Category::findOrFail($id);

        $category->name = $request->name;

        if ($request->order_level != null) {
            $category->order_level = $request->order_level;
        }
        $category->digital = $request->digital;
        $category->banner = $request->banner;
        $category->icon = $request->icon;
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->specification = $request->specification;
        $category->description = $request->description;
        $category->short_description = $request->short_description;
        $category->meta_keywords = $request->meta_keywords;


        $category->special = $request->special??0;
        $category->featured = $request->featured??0;
        $category->top = $request->top??0;

        $previous_level = $category->level;

        if ($request->parent_id != "0") {
            $category->parent_id = $request->parent_id;

            $parent = Category::find($request->parent_id);
            $category->level = $parent->level + 1;
        } else {
            $category->parent_id = 0;
            $category->level = 0;
        }

        if ($category->level > $previous_level) {
            CategoryUtility::move_level_down($category->id);
        } elseif ($category->level < $previous_level) {
            CategoryUtility::move_level_up($category->id);
        }

        if ($request->slug != null) {
            $category->slug = strtolower($request->slug);
        } else {
            $category->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->name)) . '-' . Str::random(5);
        }


        // if ($request->commision_rate != null) {
        //     $category->commision_rate = $request->commision_rate;
        // }
        $category->save();
        // $category->attributes()->sync($request->filtering_attributes);

        $category->attributes()->detach();
        if (is_array($request->choice_no)) {
            foreach ($request->choice_no as $c) {
                $category->attributes()->attach($c, ['attribute_value' => json_encode($request['choice_options_' . $c])]);
            }
        }
        $category->save();

        //$category->attributes()->sync($request->filtering_attributes);

        // $category_translation = CategoryTranslation::firstOrNew(['lang' => $request->lang, 'category_id' => $category->id]);
        // $category_translation->name = $request->name;
        // $category_translation->save();

        // Cache::forget('featured_categories');
        flash(__('Category has been updated successfully'))->success();
        return redirect()->route('category');
        //return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Category::with('childrenCategories')->findOrFail($id);
        $get = $this->delete_child($attribute);
        if ($get) {
            Category::destroy($id);
        }
        flash(__('Category has been deleted successfully'))->success();
        return redirect()->route('category');
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
    public function change_section(Request $request)
    {
        if ($request->has('name') && $request->has('status') && $request->has('id')) {
            $product = Category::findOrFail($request->id);
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
