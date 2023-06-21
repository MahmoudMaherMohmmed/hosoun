<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use App\BookChildCategory;
use App\BookSubCategory;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use File;
use Image;
use Session;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $books = Book::latest()->get();

        return view('admin.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $bookCategories = BookCategory::active()->latest()->get();

        return view('admin.book.add', compact('bookCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookRequest $request)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        //---------------------Start Upload book image and file---------------------
        $path = '/images/books/';
        if (!file_exists(public_path() . '/' . $path)) {
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }

        if ($file = $request->file('image')) {
            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        if ($file = $request->file('file')) {
            $filename = time() . $file->getClientOriginalName();
            $file->move($path, $filename);

            $input['file'] = $filename;
        }
        //---------------------End Upload book image and file---------------------

        $input['status'] = isset($request->status) ? 1 : 0;

        Book::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('books');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\View\View
     */
    public function edit(Book $book)
    {
        $bookCategories = BookCategory::active()->latest()->get();
        $bookSubCategories = BookSubCategory::active()->latest()->get();
        $bookChildCategories = BookChildCategory::active()->latest()->get();

        return view('admin.book.edit', compact('book', 'bookCategories', 'bookSubCategories', 'bookChildCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        //---------------------Start Upload book image and file---------------------
        $path = '/images/books/';
        if (!file_exists(public_path() . '/' . $path)) {
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }
        if ($file = $request->file('image')) {
            if ($book->image != null) {
                $image = @file_get_contents(public_path() . $path . $book->image);
                if ($image) {
                    unlink(public_path() . $path . $book->image);
                }
            }

            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        if ($file = $request->file('file')) {
            if ($book->file != null) {
                $file = @file_get_contents(public_path() . $path . $book->file);
                if ($file) {
                    unlink(public_path() . $path . $book->file);
                }
            }

            $filename = time() . $file->getClientOriginalName();
            $file->move($path, $filename);

            $input['file'] = $filename;
        }
        //---------------------End Upload book image and file---------------------

        $input['status'] = isset($request->status) ? 1 : 0;

        $book->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }
}