<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catalogue;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CatalogueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catalogue = Catalogue::orderBy('id', 'asc')->get();
        $categories = Category::where('parent_id', 0)
            ->get();
        return view('backend.catalogue.index', compact('categories','catalogue'));
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
        // return $request->category_id;
        $categories = Category::where('id',$request->category_id)->first();
        $parent_id = $this->get_parent_cat($categories);
        // return $categories;
        $catalogue = new Catalogue();
        $catalogue->title = $request->title;
        $catalogue->image = $request->image;
        $catalogue->pdf = $request->pdf;
        $catalogue->pdf_url = $request->pdf_url??null;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->parentcategory_id = $parent_id;
        $catalogue->save();
        flash(__('Catalogue has been inserted successfully'))->success();
        return redirect()->route('catalogues');
    }
    public function get_parent_cat($category){
        if($category->parent_id == 0){
            return $category->id;
        }else{
            $cat = Category::where('id',$category->parent_id)->first();
            return $this->get_parent_cat($cat);
        }
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
        $catalogue  = Catalogue::findOrFail($id);
        $categories = Category::where('parent_id', 0)
            ->get();
        return view('backend.catalogue.edit', compact('categories','catalogue'));
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
        $catalogue = Catalogue::findOrFail($id);
        $catalogue->title = $request->title;
        $catalogue->image = $request->image;
        $catalogue->pdf_url = $request->pdf_url??null;
        $catalogue->pdf = $request->pdf;
        $catalogue->description = $request->description;
        $catalogue->category_id = $request->category_id;
        $catalogue->save();
        flash( __('catalogue has been updated successfully'))->success();
        return redirect()->route('catalogues');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Catalogue::findOrFail($id);
        Catalogue::destroy($id);
        flash( __('catalogue has been deleted successfully'))->success();
        return redirect()->route('catalogues');
    }
    public function change_section(Request $request)
    {
        if ($request->has('name') && $request->has('status') && $request->has('id')) {
            $catelogue = Catalogue::findOrFail($request->id);
            if ($catelogue) {
                $catelogue[$request->name] = $request->status;
                $catelogue->save();
            }
            flash(__('status change successfully'))->success();
            return response(array('success' => 1));
        }
        return response(array('success' => 0));
    }
}
