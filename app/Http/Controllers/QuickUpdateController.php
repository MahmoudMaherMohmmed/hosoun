<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookCategory;
use App\BookChildCategory;
use App\BookSubCategory;
use Illuminate\Http\Request;
use App\Course;
use App\User;
use App\Slider;
use App\Categories;
use App\SubCategory;
use App\ChildCategory;
use App\CourseLanguage;
use App\Page;
use App\Testimonial;
use App\WhatLearn;
use App\Question;
use App\CourseChapter;
use App\ReviewRating;
use App\Blog;
use App\FaqStudent;
use App\FaqInstructor;
use App\Order;
use DB;
use App\CourseClass;
use App\Answer;
use App\CareerJob;
use App\CourseInclude;
use App\RelatedCourse;

class QuickUpdateController extends Controller
{
    public function courseQuick($id)
    {
        $course = Course::findorfail($id);

        if ($course->status == 0) {
            DB::table('courses')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('courses')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function includedQuick($id)
    {
        $include = CourseInclude::findorfail($id);

        if ($include->status == 0) {
            DB::table('course_includes')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('course_includes')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function relatedQuick($id)
    {
        $related = RelatedCourse::findorfail($id);

        if ($related->status == 0) {
            DB::table('related_courses')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('related_courses')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }


    public function userQuick($id)
    {
        $users = User::findorfail($id);

        if ($users->status == 0) {
            DB::table('users')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('users')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function sliderQuick($id)
    {
        $sliders = Slider::findorfail($id);

        if ($sliders->status == 0) {
            DB::table('sliders')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('sliders')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }


    public function courseabc($id)
    {
        $course = Course::findorfail($id);

        if ($course->featured == 0) {
            DB::table('courses')->where('id', '=', $id)->update(['featured' => "1"]);
            return back()->with('success', 'Featured changed to YES !');
        } else {
            DB::table('courses')->where('id', '=', $id)->update(['featured' => "0"]);
            return back()->with('delete', 'Featured changed to NO !');
        }
    }

    public function categoryQuick($id)
    {
        $categories = Categories::findorfail($id);

        if ($categories->status == 0) {

            DB::table('categories')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('categories')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function bookCategoriesQuick($id)
    {
        $bookCategory = BookCategory::findorfail($id);

        if ($bookCategory->status == 0) {
            $bookCategory->update(['status' => "1"]);

            return back()->with('success', 'Status changed to active !');
        } else {
            $bookCategory->update(['status' => "0"]);

            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function bookSubCategoriesQuick($id)
    {
        $bookSubCategory = BookSubCategory::findorfail($id);

        if ($bookSubCategory->status == 0) {
            $bookSubCategory->update(['status' => "1"]);

            return back()->with('success', 'Status changed to active !');
        } else {
            $bookSubCategory->update(['status' => "0"]);

            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function bookChildCategoriesQuick($id)
    {
        $bookChildCategory = BookChildCategory::findorfail($id);

        if ($bookChildCategory->status == 0) {
            $bookChildCategory->update(['status' => "1"]);

            return back()->with('success', 'Status changed to active !');
        } else {
            $bookChildCategory->update(['status' => "0"]);

            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function bookQuick($id)
    {
        $book = Book::findorfail($id);

        if ($book->status == 0) {
            $book->update(['status' => "1"]);

            return back()->with('success', 'Status changed to active !');
        } else {
            $book->update(['status' => "0"]);

            return back()->with('delete', 'Status changed to deactive !');
        }
    }
    public function careerJobQuick ($id)
    {
        $careerJob = CareerJob::findorfail($id);

        if ($careerJob->status == 0) {
            $careerJob->update(['status' => "1"]);

            return back()->with('success', 'Status changed to active !');
        } else {
            $careerJob->update(['status' => "0"]);

            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function pageQuick($id)
    {
        $pages = Page::findorfail($id);

        if ($pages->status == 0) {
            DB::table('pages')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('pages')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function whatQuick($id)
    {
        $whatlearns = WhatLearn::findorfail($id);

        if ($whatlearns->status == 0) {

            DB::table('what_learns')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('what_learns')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }
    public function ChapterQuick($id)
    {
        $coursechapters = CourseChapter::findorfail($id);

        if ($coursechapters->status == 0) {
            DB::table('course_chapters')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('course_chapters')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function classQuick($id)
    {
        $courseclass = CourseClass::findorfail($id);

        if ($courseclass->status == 0) {
            DB::table('course_classes')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('course_classes')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function ansrQuick($id)
    {
        $questionanswers = Question::findorfail($id);

        if ($questionanswers->status == 0) {
            DB::table('questions')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('questions')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }
    public function answerQuick($id)
    {
        $questionanswers = Answer::findorfail($id);

        if ($questionanswers->status == 0) {
            DB::table('answers')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('answers')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }
    public function faqQuick($id)
    {
        $faqs = FaqStudent::findorfail($id);

        if ($faqs->status == 0) {
            DB::table('faq_students')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('faq_students')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function faqInstructorQuick($id)
    {
        $faqs = FaqInstructor::findorfail($id);

        if ($faqs->status == 0) {
            DB::table('faq_instructors')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('faq_instructors')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function testimonialQuick($id)
    {
        $testimonials = Testimonial::findorfail($id);

        if ($testimonials->status == 0) {

            DB::table('testimonials')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('testimonials')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function languageQuick($id)
    {
        $languages = CourseLanguage::findorfail($id);

        if ($languages->status == 0) {

            DB::table('course_languages')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('course_languages')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function subcategoryQuick($id)
    {
        $subcategories = SubCategory::findorfail($id);

        if ($subcategories->status == 0) {

            DB::table('sub_categories')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('sub_categories')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }

    public function childcategoryQuick($id)
    {
        $childcategories = ChildCategory::findorfail($id);

        if ($childcategories->status == 0) {
            DB::table('child_categories')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to active !');
        } else {
            DB::table('child_categories')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to deactive !');
        }
    }


    public function categoryfQuick($id)
    {
        $categories = Categories::findorfail($id);

        if ($categories->featured == 0) {
            DB::table('categories')->where('id', '=', $id)->update(['featured' => "1"]);
            return back()->with('success', 'featured changed to active !');
        } else {
            DB::table('categories')->where('id', '=', $id)->update(['featured' => "0"]);
            return back()->with('delete', 'featured changed to deactive !');
        }
    }

    public function blog_statusQuick($id)
    {
        $review = Blog::findorfail($id);

        if ($review->status == 0) {
            DB::table('blogs')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('blogs')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function blog_approvedQuick($id)
    {
        $review = Blog::findorfail($id);

        if ($review->approved == 0) {
            DB::table('blogs')->where('id', '=', $id)->update(['approved' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('blogs')->where('id', '=', $id)->update(['approved' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function reviewstatusQuick($id)
    {
        $review = ReviewRating::findorfail($id);

        if ($review->status == 0) {
            DB::table('review_ratings')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('review_ratings')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function reviewapprovedQuick($id)
    {
        $review = ReviewRating::findorfail($id);

        if ($review->approved == 0) {
            DB::table('review_ratings')->where('id', '=', $id)->update(['approved' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('review_ratings')->where('id', '=', $id)->update(['approved' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function reviewfeaturedQuick($id)
    {
        $review = ReviewRating::findorfail($id);

        if ($review->featured == 0) {
            DB::table('review_ratings')->where('id', '=', $id)->update(['featured' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('review_ratings')->where('id', '=', $id)->update(['featured' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }

    public function orderQuick($id)
    {
        $order = Order::findorfail($id);

        if ($order->status == 0) {
            DB::table('orders')->where('id', '=', $id)->update(['status' => "1"]);
            return back()->with('success', 'Status changed to Active !');
        } else {
            DB::table('orders')->where('id', '=', $id)->update(['status' => "0"]);
            return back()->with('delete', 'Status changed to Deactive !');
        }
    }
}