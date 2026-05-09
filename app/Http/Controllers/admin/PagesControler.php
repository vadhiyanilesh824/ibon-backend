<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class PagesControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Page::orderBy('id', 'asc')->get();
        return view('backend.pages.index', compact('pages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function menus()
    {
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        $routes = array();
        foreach ($routeCollection as $value) {
            if (str_contains($value->getName(), 'site.')) {
                array_push($routes, $value->getName());
            }
        }
        return view('backend.pages.menus', compact('routes'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        $routes = array();
        foreach ($routeCollection as $value) {
            if (str_contains($value->getName(), 'site.')) {
                if (!(Page::where('page_route', $value->getName())->count() > 0)) {
                    array_push($routes, $value->getName());
                }
            }
        }
        return view('backend.pages.add', compact('routes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        if ($request->slug != null) {
            $page->slug = str_replace(' ', '-', $request->slug);
        } else {
            $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->meta_title)) . '-' . Str::random(5);
        }
        $page->meta_image = $request->meta_image;
        $page->meta_keys = $request->meta_keys;
        $page->meta_tages = $request->meta_tages;
        $page->page_route = $request->page_route;
        $page->save();
        flash(__('Page has been inserted successfully'))->success();
        return redirect()->route('pages');
    }

    public function menus_update(Request $request)
    {
        $menus = $request->data;
        $this->menu_update($menus, 0);
        return 1;
    }

    public function menu_update($data, $parent)
    {
        foreach ($data as $key => $d) {
            if ($d['new'] == 1) {
                $m = Menu::create([
                    'parent' => $parent,
                    'order_level' => $key,
                    'title' => $d['name'],
                    'slug' => $d['slug'],
                    'url' => $d['url'],
                    'meta_title' => $d['metatitle'],
                    'image' => $d['image'],
                    'dropdown_type' => $d['dropdown_type'],
                    'meta_description' => $d['metadescription'],
                ]);
                if (isset($d['children'])) {
                    $this->menu_update($d['children'], $m->id);
                }
            } else if ($d['deleted'] == 1) {
                Menu::where('id', $d['id'])->orWhere('parent', $d['id'])->delete();
            } else {
                $m = Menu::where('id', $d['id'])->update([
                    'parent' => $parent,
                    'order_level' => $key,
                    'title' => $d['name'],
                    'slug' => $d['slug'],
                    'url' => $d['url'],
                    'image' => $d['image'],
                    'dropdown_type' => $d['dropdown_type'],
                    'meta_title' => $d['metatitle'],
                    'meta_description' => $d['metadescription'],
                ]);
                if (isset($d['children'])) {
                    $this->menu_update($d['children'], $d['id']);
                }
            }
        }
        return 1;
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

        $page  = Page::findOrFail($id);
        $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        $routes = array();
        foreach ($routeCollection as $value) {
            if (str_contains($value->getName(), 'site.')) {
                if (!(Page::where('page_route', $value->getName())->count() > 0) || $page->page_route == $value->getName()) {
                    array_push($routes, $value->getName());
                }
            }
        }
        return view('backend.pages.edit', compact('page', 'routes'));
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
        $page = Page::findOrFail($id);
        $page->title = $request->title;
        $page->meta_title = $request->meta_title;
        $page->meta_description = $request->meta_description;
        $page->meta_image = $request->meta_image;
        $page->meta_keys = $request->meta_keys;
        $page->meta_tages = $request->meta_tages;
        $page->page_route = $request->page_route;
        if ($request->slug != null) {
            $page->slug = strtolower($request->slug);
        } else {
            $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->meta_title)) . '-' . Str::random(5);
        }
        $page->save();
        flash(__('page has been updated successfully'))->success();
        return redirect()->route('pages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Page::findOrFail($id);
        Page::destroy($id);
        flash(__('Page has been deleted successfully'))->success();
        return redirect()->route('pages');
    }
}
