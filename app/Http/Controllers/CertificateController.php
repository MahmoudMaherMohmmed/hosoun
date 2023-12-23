<?php

namespace App\Http\Controllers;
use App\BundleCourse;
use App\Certificate;
use App\Course;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use App\Meeting;
use App\Order;
use App\User;
use Auth;
use Carbon\Carbon;
use Redirect;
use PDF;
use App\CourseProgress;
use Crypt;
use File;
use Image;
use Session;


class CertificateController extends Controller
{
    public function index()
    {
        $certificates = Certificate::orderBy('id','DESC')->get();

        return view('admin.certificates.index', compact('certificates'));
    }

    public function create()
    {
        $users = User::all();
        $courses = Course::all();
        $bundles = BundleCourse::all();
        return view('admin.certificates.create', compact('courses', 'bundles', 'users'));
    }
    public function makeUser($user_id)
    {
        \Log::debug('<==enrollUser');

        if (!isset($user_id)) {
            return redirect('certificates/create');
        }
        $users = User::all();
        $selectedUser = User::findOrFail($user_id);
        \Log::debug('Fetching user course details: ' . $selectedUser);
        $orders = Order::where('user_id', $user_id)->get();
        $certificates = Certificate::where('user_id', $user_id)->get();

        $enrolledCourses = [];
        $enrolledBundles = [];

        $enrolledCourseIds = [];
        $enrolledBundleIds = [];

        foreach ($orders as $order) {
            if ($order->course_id !== null) {
                array_push($enrolledCourseIds, $order->course_id);
                array_push($enrolledCourses, $order->courses);
            } else {
                array_push($enrolledBundleIds, $order->bundle_id);
                array_push($enrolledBundles, $order->bundle);
            }
        }

//        $courses = Course::all()->whereNotIn('id', $enrolledCourseIds);
        $courses = Course::all()->whereIn('id', $enrolledCourseIds);
        $bundles = BundleCourse::all()->whereIn('id', $enrolledBundleIds);

        \Log::debug('==>enrollUser');

        return view('admin.certificates.create', compact('users', 'courses', 'bundles', 'enrolledCourses', 'enrolledBundles', 'selectedUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCertificateRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreCertificateRequest $request)
    {
        $input = $request->all();

        $input['slug'] = str_slug($input['title'], '-');

        //---------------------Start Upload certificate image and file---------------------
        $path = '/images/certificates/';
        if (!file_exists(public_path() . '/' . $path)) {
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }

        if ($file = $request->file('image')) {
            $optimizeImage = Image::make($file);
            $image = time() . $file->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        if ($request->file('file')) {
            $filename = time() . $request->file->getClientOriginalName();
            $request->file->move('images/certificates/', $filename);

            $input['file'] = $filename;
        }
        //---------------------End Upload certificate image and file---------------------

        $input['status'] = isset($request->status) ? 1 : 0;

        Certificate::create($input);

        Session::flash('success', trans('flash.AddedSuccessfully'));

        return redirect('certificates');
    }

    public function show(Certificate $certificate)
    {
        //
    }

    public function edit(Certificate $certificate)
    {
        $users = User::all();
        $courses = Course::all();
        $bundles = BundleCourse::all();
        return view('admin.certificates.edit', compact('certificate', 'courses', 'bundles', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCertificateRequest  $request
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateCertificateRequest $request, Certificate $certificate)
    {
        $input = $request->all();

        //---------------------Start Upload certificate image and file---------------------
        $path = '/images/certificates/';
        if (!file_exists(public_path() . '/' . $path)) {
            File::makeDirectory(public_path() . '/' . $path, 0777, true);
        }
        if ($image = $request->file('image')) {
            if ($certificate->image != null) {
                $image = @file_get_contents(public_path() . $path . $certificate->image);
                if ($image) {
                    unlink(public_path() . $path . $certificate->image);
                }
            }

            $optimizeImage = Image::make($image);
            $image = time() . $image->getClientOriginalName();
            $optimizeImage->save(public_path() . $path . $image, 72);

            $input['image'] = $image;
        }

        if ($request->file('file')) {
            if ($certificate->file != null) {
                $file = @file_get_contents(public_path() . $path . $certificate->file);
                if ($file) {
                    unlink(public_path() . $path . $certificate->file);
                }
            }

            $filename = $request->file->getClientOriginalName();
            $request->file->move('images/certificates/', $filename);

            $input['file'] = $filename;
        }
        //---------------------End Upload certificate image and file---------------------

        $input['status'] = isset($request->status) ? 1 : 0;

        $certificate->update($input);

        Session::flash('success', trans('flash.UpdatedSuccessfully'));

        return redirect('certificates');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $certificate
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Certificate $certificate)
    {
        $certificate->delete();

        return back()->with('delete', trans('flash.DeletedSuccessfully'));
    }

//    User


    public function myCertificates()
    {
        if(Auth::check())
        {
            $certificates = Auth::user()->certificates->where('status',1);
//            dd($certificates);

            return view('front.my_certificates',compact('certificates'));
        }

        return Redirect::route('login')->withInput()->with('delete', trans('flash.PleaseLogin'));
    }



    public function showOldCert($id)
    {
        $order = Order::where('course_id', decrypt($id))->first();
    	$course = Course::where('id', decrypt($id))->first();
	    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
	    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

	    $duration = str_replace($western_arabic, $eastern_arabic, $course['duration']);
	    $date=Meeting::where('course_id',$course->id)->first();
	    $arabicDate='';
	    $enDate='';
	    if (isset($date)){
		    $enDate=Carbon::parse( $date->start_time)->translatedFormat('l j F Y');
	    }
        $progress = CourseProgress::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();
    	return view('front.certificate.certificate', compact('course', 'order', 'progress','duration','arabicDate','enDate'));
    }

    public function pdfdownload(Course $course)
    {
	    $western_arabic = array('0','1','2','3','4','5','6','7','8','9');
	    $eastern_arabic = array('٠','١','٢','٣','٤','٥','٦','٧','٨','٩');

	    $duration = str_replace($western_arabic, $eastern_arabic, $course['duration']);
		$date=Meeting::where('course_id',$course->id)->first();
		$arabicDate='';
		$enDate='';
		if (isset($date)){
			$enDate=Carbon::parse( $date->start_time)->translatedFormat('l j F Y');
		}
        $progress = CourseProgress::where('course_id', $course->id)->where('user_id', Auth::user()->id)->first();
        return view('front.certificate.download',compact('course', 'progress','duration','arabicDate','enDate'));

    }
}
