<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\Http\Requests\StoreBookCategoryRequest;
use App\Http\Requests\UpdateBookCategoryRequest;
use File;
use Image;
use Session;

class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookCategories = BookCategory::latest()->get();

        return view('admin.book_category.index', compact('bookCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.book_category.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookCategoryRequest $request)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_categories/';
            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }
            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        BookCategory::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('book-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookCategory  $bookCategory
     * @return \Illuminate\View\View
     */
    public function show(BookCategory $bookCategory)
    {
        return view('admin.book_category.update', compact('bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookCategory  $bookCategory
     * @return \Illuminate\View\View
     */
    public function edit(BookCategory $bookCategory)
    {
        return view('admin.book_category.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookCategoryRequest  $request
     * @param  \App\BookCategory  $bookCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookCategoryRequest $request, BookCategory $bookCategory)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_categories/';

            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }

            if ($bookCategory->cat_image != null) {
                $content = @file_get_contents(public_path() . $path . $bookCategory->cat_image);
                if ($content) {
                    unlink(public_path() . $path . $bookCategory->cat_image);
                }
            }

            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        $bookCategory->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('book-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookCategory  $bookCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BookCategory $bookCategory)
    {
        $bookCategory->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }
}