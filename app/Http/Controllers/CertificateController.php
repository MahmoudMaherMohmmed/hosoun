<?php

namespace App\Http\Controllers;
use App\Course;
use App\Meeting;
use App\Order;
use Auth;
use Carbon\Carbon;
use Redirect;
use PDF;
use App\CourseProgress;
use Crypt;

class CertificateController extends Controller
{
    public function show($id)
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
