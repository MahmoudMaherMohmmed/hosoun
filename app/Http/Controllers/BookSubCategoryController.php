<?php

namespace App\Http\Controllers;

use App\BookCategory;
use App\BookChildCategory;
use App\BookSubCategory;
use App\Http\Requests\StoreBookSubCategoryRequest;
use App\Http\Requests\UpdateBookSubCategoryRequest;
use File;
use Illuminate\Http\Request;
use Image;
use Session;

class BookSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bookSubCategories = BookSubCategory::latest()->get();

        return view('admin.book_sub_category.index', compact('bookSubCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bookCategories = BookCategory::active()->latest()->get();

        return view('admin.book_sub_category.add', compact('bookCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookSubCategoryRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookSubCategoryRequest $request)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_sub_categories/';
            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }
            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        BookSubCategory::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('book-sub-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookSubCategory  $bookSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BookSubCategory $bookSubCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookSubCategory  $bookSubCategory
     * @return \Illuminate\View\View
     */
    public function edit(BookSubCategory $bookSubCategory)
    {
        $bookCategories = BookCategory::active()->latest()->get();

        return view('admin.book_sub_category.edit', compact('bookSubCategory', 'bookCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookSubCategoryRequest  $request
     * @param  \App\BookSubCategory  $bookSubCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookSubCategoryRequest $request, BookSubCategory $bookSubCategory)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        if ($file = $request->file('image')) {
            $path = '/images/book_sub_categories/';

            if (!file_exists(public_path() . '/' . $path)) {
                File::makeDirectory(public_path() . '/' . $path, 0777, true);
            }

            if ($bookSubCategory->image != null) {
                $content = @file_get_contents(public_path() . $path . $bookSubCategory->image);
                if ($content) {
                    unlink(public_path() . $path . $bookSubCategory->image);
                }
            }

            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        $input['status'] = isset($request->status) ? 1 : 0;

        $bookSubCategory->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('book-sub-categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookSubCategory  $bookSubCategory
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BookSubCategory $bookSubCategory)
    {
        $bookSubCategory->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }

    public function childCategories(Request $request)
    {
        $book_child_categories = BookChildCategory::where('book_sub_category_id', $request->book_sub_category_id)->pluck('title', 'id')->all();

        return response()->json($book_child_categories);
    }
}