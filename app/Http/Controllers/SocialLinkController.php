<?php

namespace App\Http\Controllers;

use App\SocialLink;
use Illuminate\Http\Request;
use Session;

class SocialLinkController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_links = SocialLink::latest()->get();

        return view("admin.social_link.index",compact("social_links"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_link.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request,[
            'title' => 'sometimes',
            'link' => 'required|url',
            'icon'=>'required',
        ]);

        $input = $request->all();
        $input['status'] = $request->status=='on'  ? 1 : 0;
        SocialLink::create($input);

        Session::flash('success',trans('flash.AddedSuccessfully'));

        return redirect('social_link');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SocialLink  $social_link
     * @return \Illuminate\Http\Response
     */
    public function show(SocialLink $social_link)
    {
        //return view('admin.social_link.update',compact('social_link'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SocialLink  $social_link
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialLink $social_link)
    {
        return view('admin.social_link.update',compact('social_link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SocialLink  $social_link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SocialLink $social_link)
    {
        $data = $this->validate($request,[
            'title' => 'sometimes',
            'link' => 'required|url',
            'icon'=>'required',
        ]);

        $input = $request->all();
        $input['status'] = $request->status=='on'  ? 1 : 0;
        $social_link->update($input);

        Session::flash('success',trans('flash.UpdatedSuccessfully'));

        return redirect('social_link'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SocialLink  $social_link
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialLink $social_link)
    {
        $social_link->delete();
        
        session()->flash('delete',trans('flash.DeletedSuccessfully'));

        return redirect('social_link');
    }
}
