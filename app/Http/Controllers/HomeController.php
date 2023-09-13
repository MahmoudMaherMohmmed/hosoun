<?php

namespace App\Http\Controllers;

use App\ArabicPath;
use App\Book;
use App\BookCategory;
use App\BookChildCategory;
use App\Currency;
use App\Categories;
use App\Slider;
use App\SliderFacts;
use App\Course;
use App\SubjectPath;
use App\Testimonial;
use App\Trusted;
use App\Blog;
use App\QuranPath;
use App\ReligiousPath;
use App\User;
use Illuminate\Http\Request;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware(['auth','verified']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::where('status', 1)->orderBy('position', 'ASC')->get();
        $featured_categories = Categories::where('status', 1)->where('featured', 1)->orderBy('position', 'ASC')->get();
        $facts = SliderFacts::limit(3)->get();
        $recent_courses = Course::with('user')->latest()->limit(10)->get();
        $featured_courses = Course::with('user')->where('featured', 1)->latest()->limit(10)->get();
        $blogs = Blog::with('user')->where('status', '1')->orderBy('updated_at', 'DESC')->get();
        $testi = Testimonial::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $trusted = Trusted::where('status', 1)->orderBy('created_at', 'DESC')->get();
        $currency = Currency::first();
        $instructors = User::where('role', 'instructor')->where('status', 1)->get();
        $book_categories = BookCategory::active()->latest()->get();

        /*
        $category = Categories::orderBy('position', 'ASC')->get();
        $categories = CategorySlider::first();
        $cor = Course::all();
        $meetings = Meeting::where('link_by', null)->get();
        $bigblue = BBL::where('is_ended', '!=', 1)->where('link_by', null)->get();

        if (Schema::hasTable('googlemeets')) {
            $allgooglemeet = Googlemeet::orderBy('id', 'DESC')->get();
        } else {
            $allgooglemeet = null;
        }

        if (Schema::hasTable('jitsimeetings')) {
            $jitsimeeting = JitsiMeeting::orderBy('id', 'DESC')->get();
        } else {
            $jitsimeeting = null;
        }

        if (Schema::hasColumn('bundle_courses', 'is_subscription_enabled')) {
            $bundles = BundleCourse::where('is_subscription_enabled', 0)->get();
            $subscriptionBundles = BundleCourse::where('is_subscription_enabled', 1)->get();
        } else {
            $bundles = null;
            $subscriptionBundles = null;
        }


        if (Schema::hasTable('batch')) {
            $batches = Batch::where('status', '1')->get();
        } else {
            $batches = null;
        }

        if (Schema::hasTable('advertisements')) {
            $advs = Advertisement::where('status', '=', 1)->get();
        } else {
            $advs = null;
        }

        $viewed = session()->get('courses.recently_viewed');
        if (isset($viewed)) {
            $recent_course_id = array_unique($viewed);
        } else {
            $recent_course_id = null;
        }

        $counter = 0;
        $recent_course = null;
        if (Auth::check()) {
            if (isset($recent_course_id)) {
                foreach ($recent_course_id as $item) {
                    $recent_course = Course::where('id', $item)->where('status', '1')->first();
                    if (isset($recent_course)) {
                        $counter++;
                    }
                }
            }
        }
        $total_count=$counter;
        */

        return view('front.home', compact('sliders', 'featured_categories', 'featured_courses', 'facts', 'recent_courses', 'blogs', 'testi', 'trusted', 'currency', 'instructors', 'book_categories'));
    }

    public function beInstructor()
    {
        return view('front.beinstructor');
    }

    public function onlineStore()
    {
        return view('front.online_store');
    }

    public function booksCategories()
    {
        $book_categories = BookCategory::active()->latest()->get();

        return view('front.books.categories', compact('book_categories'));
    }

    public function bookscategorySubCategories($id)
    {
        $book_category = BookCategory::where('id', $id)->active()->latest()->first();

        if ($book_category != null && $book_category->sub_categories != null) {
            $book_sub_categories = $book_category->sub_categories;

            return view('front.books.sub_categories', compact('book_category', 'book_sub_categories'));
        }

        abort(404);
    }

    public function childCategoryBooks($id)
    {
        $book_child_category = BookChildCategory::where('id', $id)->active()->latest()->first();

        if ($book_child_category != null && $book_child_category->books != null) {
            $books = $book_child_category->books;

            return view('front.books.books', compact('book_child_category', 'books'));
        }

        abort(404);
    }

    public function bookPDF($id)
    {
        $book = Book::where('id', $id)->active()->latest()->first();

        if ($book != null) {
            return view('front.books.pdf', compact('book'));
        }

        abort(404);
    }

    public function bookDownload($id)
    {
        $book = Book::where('id', $id)->active()->latest()->first();

        if ($book != null) {
            return view('front.books.download', compact('book'));
        }

        abort(404);
    }

    public function searchBook(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        if (isset($searchTerm)) {
            $books = Book::where('title->ar', 'LIKE', "%$searchTerm%")->active()->latest()->get();

            return view('front.books.books', compact('books'));
        } else {
            return back()->with('delete', trans('flash.NoSearch'));
        }
    }

    public function subjects()
    {
        return view('front.paths.subjects');
    }

    public function saveSubjects(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'mobile' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
            'instructor_gender' => 'required|numeric',
            'class_id' => 'required|numeric',
            'subject_id' => 'required|numeric',
            'start_date' => 'required|date|after:today',
        ]);

        SubjectPath::create($request->all());

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return back();
    }


    
    public function religious()
    {
        return view('front.paths.religious');
    }

    public function saveReligious(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'mobile' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
            'instructor_gender' => 'required|numeric',
            'preferred_book' => 'nullable|string|max:255',
            'subject_id' => 'required|numeric',
            'start_date' => 'required|date|after:today',
        ]);

        ReligiousPath::create($request->all());

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return back();
    }


    public function quran()
    {
        return view('front.paths.quran');
    }

    public function saveQuranPath(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'mobile' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
            'instructor_gender' => 'required|numeric',
            'sub_path' => 'required|numeric',
            'old_memorized' => 'requiredif:sub_path,==,1',
            'telawa_amount' => 'requiredif:sub_path,==,2',
            'required_ejazat' => 'requiredif:sub_path,==,3',
            'required_qeraa' => 'requiredif:sub_path,==,4',
            'start_date' => 'required|date|after:today',
        ],[
            'old_memorized.requiredif' => 'The old memorized field is required when sub path is memorization.',
            'telawa_amount.requiredif' => 'The telawa amount field is required when sub path is telawa.',
            'required_ejazat.requiredif' => 'The required ejazat field is required when sub path is ejazat.',
            'required_qeraa.requiredif' => 'The required qeraa field is required when sub path is qeraa.',
        ]);

        $requestArray = $request->all();
        $requestArray['old_ejazat'] = $request->has('old_ejazat') ? implode(',',$requestArray['old_ejazat']) : 0;
        // dd($requestArray);

        QuranPath::create($requestArray);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return back();
    }

    public function arabic()
    {
        return view('front.paths.arabic');
    }

    public function saveArabicPath(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'mobile' => 'required|numeric',
            'country_id' => 'required|exists:countries,id',
            'instructor_gender' => 'required|numeric',
            'arabic_native' => 'required|numeric',
            'subject_id' => 'requiredif:arabic_native,==,1',
            'preferred' => 'requiredif:arabic_native,==,1',
            'preferred_book' => 'requiredif:preferred,==,1',
            'speak_arabic' => 'requiredif:arabic_native,==,0',
            'spoken_lang' => 'requiredif:arabic_native,==,0',
            'start_date' => 'required|date|after:today',
        ],[
            'subject_id.requiredif' => __('The subject field is required when arabic native is yes.'),
            'preferred.requiredif' => __('The preferred field is required when arabic native is yes.'),
            'preferred_book.requiredif' => __('The preferred book field is required when preferred is yes.'),
            'speak_arabic.requiredif' => __('The speak arabic field is required when arabic native is no.'),
            'spoken_lang.requiredif' => __('The spoken lang field is required when arabic native is no.'),
        ]);

        $requestArray = $request->all();
        
        $requestArray['spoken_lang'] = $request->arabic_native == 1 ? null : $requestArray['spoken_lang'];
        $requestArray['speak_arabic'] = $request->arabic_native == 1 ? null : $requestArray['speak_arabic'];
        $requestArray['subject_id'] = $request->arabic_native == 0 ? null :$requestArray['subject_id'] ;
        $requestArray['preferred_book'] = $request->arabic_native == 0 ? null : $requestArray['preferred_book'];

        // dd($requestArray);

        ArabicPath::create($requestArray);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return back();
    }

}