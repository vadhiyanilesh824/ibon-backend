<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\Country;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $career = Career::orderBy('id','DESC')->get();
        return view('backend.career.index',compact('career'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.career.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'title'=>$request->title,
            'banner'=>$request->banner,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'attachments'=>$request->attachments,
            'is_active'=>($request->has('is_active'))?'1':'0',
        ];
        Career::create($data);
        flash(__('career post created successfully'))->success();
        return redirect()->route('career');
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
        $career = Career::find($id);
        return view('backend.career.edit',compact('career'));
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
        $career = Career::find($request->id);
        $career->title=$request->title;
        $career->banner=$request->banner;
        $career->short_description=$request->short_description;
        $career->long_description=$request->long_description;
        $career->attachments=$request->attachments;
        $career->is_active=($request->has('is_active'))?'1':'0';
        $career->save();
        flash(__('career post updated successfully'))->success();
        return redirect()->route('career');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Career::where('id',$id)->delete();
        flash(__('Career Post Deleted Successfully'))->success();
        return redirect()->route('career');
    }
    public function change_status($id)
    {
        $career  = Career::find($id);
        $career->is_active = ($career->is_active == 1)?'0':'1';
        $career->save();
        flash(__('Career Post Status Changed Successfully'))->success();
        return redirect()->route('career');
    }
}
