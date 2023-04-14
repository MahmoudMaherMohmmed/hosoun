<?php
use App\ReviewRating;

class CourseRateHelper
{
    public static function rate($course)
    {
        $learn = 0;
        $price = 0;
        $value = 0;
        $sub_total = 0;

        $reviews = ReviewRating::where('course_id', $course->id)->where('status', '1')->get();
        foreach ($reviews as $review) {
            $learn = $review->learn * 5;
            $price = $review->price * 5;
            $value = $review->value * 5;
            $sub_total = $sub_total + $learn + $price + $value;
        }

        $count = ReviewRating::where('course_id', $course->id)->where('status', '1')->count();
        $count = ($count * 3) * 5;
        $rat = $sub_total / $count;

        return ['percentage' => (($rat * 100) / 5), 'rate' => ((5 * ($rat * 100) / 5) / 100)];
    }
}