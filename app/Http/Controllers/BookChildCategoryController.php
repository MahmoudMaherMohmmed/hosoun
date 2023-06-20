<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\BookChildCategory;
use App\BookSubCategory;
use App\Http\Requests\StoreBookChildCategoryRequest;
use App\Http\Requests\UpdateBookChildCategoryRequest;
use File;
use Image;
use Session;

class BookChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookChildCategories = BookChildCategory::latest()->get();

        return view('admin.book_child_category.index', compact('bookChildCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bookCategories = BookCategory::active()->latest()->get();

        return view('admin.book_child_category.add', compact('bookCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookChildCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookChildCategoryRequest $request)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_child_categories/';
            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }
            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        BookChildCategory::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('book-child-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookChildCategory  $bookChildCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookChildCategory $bookChildCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookChildCategory  $bookChildCategory
     * @return \Illuminate\View\View
     */
    public function edit(BookChildCategory $bookChildCategory)
    {
        $bookCategories = BookCategory::active()->latest()->get();
        $bookSubCategories = BookSubCategory::active()->latest()->get();

        return view('admin.book_child_category.edit', compact('bookChildCategory', 'bookCategories', 'bookSubCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookChildCategoryRequest  $request
     * @param  \App\BookChildCategory  $bookChildCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookChildCategoryRequest $request, BookChildCategory $bookChildCategory)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_child_categories/';

            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }

            if ($bookChildCategory->image != null) {
                $content = @file_get_contents(public_path() . $path . $bookChildCategory->image);
                if ($content) {
                    unlink(public_path() . $path . $bookChildCategory->image);
                }
            }

            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        $bookChildCategory->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('book-child-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookChildCategory  $bookChildCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BookChildCategory $bookChildCategory)
    {
        $bookChildCategory->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }
}