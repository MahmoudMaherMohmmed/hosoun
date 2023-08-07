<?php

namespace App\Http\Controllers;

use App\SubjectPath;

class PathsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function subjects()
    {
        $subjects = SubjectPath::all();

        return view('admin.paths.subjects', compact('subjects'));
    }
}