<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Cart;
use Session;
use App\Coupon;
use App\Adsense;
use Redirect;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::all();

        return view('admin.cart.index', compact('carts'));
    }

    public function destroy($id)
    {
        $cart = Cart::findorfail($id);
        $cart->delete();

        return back()->with('delete', trans('flash.CartRemoved'));
    }

    public function addtocart(Request $request)
    {
        $cart = Cart::where('user_id', Auth::User()->id)->where('course_id', $request->course_id)->first();

        if (!empty($cart)) {
            return back()->with('delete', trans('flash.CartAlready'));
        } else {
            DB::table('carts')->insert(
                array(
                    'user_id' => Auth::User()->id,
                    'course_id' => $request->course_id,
                    'category_id' => $request->category_id,
                    'price' => $request->price,
                    'offer_price' => $request->discount_price,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                )
            );


            return back()->with('success', trans('flash.CartAdded'));
        }
    }

    public function removefromcart($id)
    {
        $cart = Cart::findorfail($id);
        $cart->delete();

        return back()->with('delete', trans('flash.CartRemoved'));
    }

    public function cartpage(Request $request)
    {
        if (!Auth::check()) {
            return Redirect::route('login');
        }

        $coupanapplieds = Session::get('coupanapplied');
        if (empty($coupanapplieds) == true) {
            Cart::where('user_id', Auth::user()->id)->update(['distype' => null, 'disamount' => null]);
        }

        $carts = Cart::with('courses', 'user', 'bundle')->where('user_id', Auth::User()->id)->get();
        $currency = Currency::first();
        $ad = Adsense::first();

        $cartitems = Cart::with('courses', 'user', 'bundle')->where('user_id', Auth::User()->id)->first();
        if ($cartitems == null) {
            return view('front.cart', compact('carts', 'currency', 'ad'));
        } else {
            $price_total = 0;
            $offer_total = 0;
            $cpn_discount = 0;

            //cart price after offer
            foreach ($carts as $key => $c) {
                if ($c->offer_price != 0) {
                    $offer_total = $offer_total + $c->offer_price;
                } else {
                    $offer_total = $offer_total + $c->price;
                }
            }

            //for price total
            foreach ($carts as $key => $c) {
                $price_total = $price_total + $c->price;
            }


            //for coupon discount total
            foreach ($carts as $key => $c) {
                $cpn_discount = $cpn_discount + $c->disamount;
            }


            $cart_total = 0;
            foreach ($carts as $key => $c) {
                if ($cpn_discount != 0) {
                    $cart_total = $offer_total - $cpn_discount;
                } else {
                    $cart_total = $offer_total;
                }
            }

            //for offer percent
            foreach ($carts as $key => $c) {
                if ($cpn_discount != 0) {
                    $offer_amount = $price_total - ($offer_total - $cpn_discount);
                    $value = $offer_amount / $price_total;
                    $offer_percent = $value * 100;
                } else {
                    $offer_amount = $price_total - $offer_total;
                    if ($offer_amount && $offer_total) {
                        $value = $offer_amount / $price_total;
                    }
                    $offer_percent = isset($value) && $value != null ? ($value * 100) : 0;
                }
            }
        }

        return view('front.cart', compact('carts', 'currency', 'offer_total', 'price_total', 'offer_percent', 'cart_total', 'cpn_discount', 'ad'));
    }
}