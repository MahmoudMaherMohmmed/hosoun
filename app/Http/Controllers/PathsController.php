<?php

namespace App\Http\Controllers;

use App\ArabicPath;
use App\QuranPath;
use App\ReligiousPath;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function religious()
    {
        $religious = ReligiousPath::all();

        return view('admin.paths.religious', compact('religious'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function quran()
    {
        $quranPath = QuranPath::all();
        $subPathText = [
            '1' => 'memorize',
            '2' => 'telawa',
            '3' => 'ejazat',
            '4' => 'qeraa',
            '5' => 'tajweed'
        ];

        $ejazatText = [
            '1'=> 'في القرآن الكريم',
            '2'=> 'في التجويد',
            '3'=> 'في القراءات',
            '4'=> 'في اللغة العربية',
            '5'=> 'في العقيدة',
            '6'=> 'في الحديث',
        ];

        $qeraaText = [
            '1' => 'عاصم الكوفي',
            '2' => 'نافع المدني',
            '3' => 'أبو عمرو البصري',
            '4' => 'ابن عامر الشامي',
            '5' => 'ابن كثير المكي',
            '6' => 'حمزة الكوفي',
            '7' => 'الكسائي الكوفي',
            '8' => 'ابو جعفر المدني',
            '9' => 'يعقوب الحضرمي',
            '10' => 'خلف العاشر',

        ];

        return view('admin.paths.quran', compact('quranPath', 'subPathText', 'ejazatText', 'qeraaText'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function arabic()
    {
        $subjectText = [
            '1'=> 'نحو',
            '2'=> 'صرف',
            '3'=> 'بلاغة',
            '4'=> 'عروض',
        ];
        $arabicPath = ArabicPath::all();

        return view('admin.paths.arabic', compact('arabicPath', 'subjectText'));
    }
}