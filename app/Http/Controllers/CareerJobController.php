<?php

namespace App\Http\Controllers;

use App\CareerJob;
use App\CareerJobCategory;
use App\CareerJobChildCategory;
use App\CareerJobSubCategory;
use App\Http\Requests\StoreCareerJobRequest;
use App\Http\Requests\UpdateCareerJobRequest;
use File;
use Image;
use Session;

class CareerJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $careerJobs = CareerJob::latest()->get();

        return view('admin.career_jobs.index', compact('careerJobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.career_jobs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCareerJobRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCareerJobRequest $request)
    {

        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        $input['status'] = isset($request->status) ? 1 : 0;

        $input['tags'] = implode(',', $request->tags);

        CareerJob::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('career-jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CareerJob  $careerJob
     * @return \Illuminate\Http\Response
     */
    public function show(CareerJob $careerJob)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CareerJob  $careerJob
     * @return \Illuminate\View\View
     */
    public function edit(CareerJob $careerJob)
    {
     

        return view('admin.career_jobs.edit', compact('careerJob'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCareerJobRequest  $request
     * @param  \App\CareerJob  $careerJob
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCareerJobRequest $request, CareerJob $careerJob)
    {
        $input = $request->all();
        
        $input['slug'] = str_slug($input['title'], '-');

       
        $input['status'] = isset($request->status) ? 1 : 0;
        $input['tags'] = implode(',', $request->tags);

        $careerJob->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('career-jobs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CareerJob  $careerJob
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(CareerJob $careerJob)
    {
        $careerJob->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }
}