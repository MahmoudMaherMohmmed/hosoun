<?php

namespace App\Http\Controllers;

use App\SeoDirectory;
use Illuminate\Http\Request;
use Session;

class SeoDirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Session::has('changed_language')) {
            \App::setLocale(Session::get('changed_language'));
        }

        $directory = SeoDirectory::get();
        return view('admin.directory.index', compact('directory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Session::has('changed_language')) {
            \App::setLocale(Session::get('changed_language'));
        }
        
        return view('admin.directory.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'city' => 'required',
            'detail' => 'required',

        ]);

        $input = $request->all();
        $data = SeoDirectory::create($input);
        $data->save();

        Session::flash('success','Added Successfully !');
        return redirect()->route('directory.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeoDirectory  $seoDirectory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (\Session::has('changed_language')) {
            \App::setLocale(Session::get('changed_language'));
        }
        
        $show = SeoDirectory::where('id', $id)->first();
        return view('admin.directory.edit', compact('show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeoDirectory  $seoDirectory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeoDirectory  $seoDirectory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this -> validate($request,[
        //     'city' => 'required',
        //     'detail' => 'required'
        // ]);

        $data = SeoDirectory::findorfail($id);
        $input = $request->all();

        $input['status'] = isset($request->status)  ? 1 : 0;

        $data->update($input);
      
        Session::flash('success', trans('flash.UpdatedSuccessfully'));
        return redirect()->route('directory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeoDirectory  $seoDirectory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('seo_directory')->where('id',$id)->delete();
        return redirect()->route('directory.index');
    }

    public function view($id)
    {
        if (\Session::has('changed_language')) {
            \App::setLocale(Session::get('changed_language'));
        }
        
        $directory = SeoDirectory::findorfail($id);
        return view('front.directory.show', compact('directory'));
    }
}
