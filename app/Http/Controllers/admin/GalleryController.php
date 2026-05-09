<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::orderBy('id','DESC')->paginate(12)->appends(request()->query());
        return view('backend.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        if($id != null){
            $gallery = Gallery::find($id);
            return view('backend.gallery.add',compact('gallery'));

        }
        return view('backend.gallery.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->id == 0){
            Gallery::create([
                'type' => $request->type,
                'image' => $request->image,
                'title' => $request->title,
                'description' => $request->description,
                'cover_image' => $request->cover_image,
                'video_link' => $request->video_link,
            ]);
            flash(__('Gallery '.$request->type.' added successfully'))->success();
        }else{
            $data = [
                'type' => $request->type,
                'image' => $request->image,
                'title' => $request->title,
                'description' => $request->description,
                'cover_image' => $request->cover_image,
                'video_link' => $request->video_link,
            ];
            Gallery::where('id',$request->id)->update($data);
            flash(__('Gallery '.$request->type.' edited successfully'))->success();
        }
        return redirect()->route('gallery');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::where('id',$id)->delete();
        flash(__('Gallery Item Deleted Successfully'))->success();
        return redirect()->route('gallery');
    }
}
