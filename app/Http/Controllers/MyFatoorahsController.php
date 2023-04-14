<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Currency;
use App\InstructorSetting;
use App\MyFatoorah;
use App\Order;
use App\PendingPayout;
use App\Setting;
use App\User;
use App\Wishlist;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use MyFatoorah\Library\PaymentMyfatoorahApiV2;

class MyFatoorahsController extends Controller
{

	public $mfObj;
	public $rand;
	public $ordersIds;
//-----------------------------------------------------------------------------------------------------------------------------------------

	/**
	 * create MyFatoorah object
	 */
	public function __construct()
	{
		$this->middleware('auth');

		$this->rand = random_int(1111111, 9999999);
		$this->mfObj = new PaymentMyfatoorahApiV2(
			config('myfatoorah.api_key'),
			config('myfatoorah.country_iso'),
			config('myfatoorah.test_mode')
		);
	}

//-----------------------------------------------------------------------------------------------------------------------------------------

	/**
	 * Create MyFatoorah invoice
	 *
	 * @return Application|RedirectResponse|Redirector
	 */
	public function index(Request $request)
	{
		try {
			$paymentMethodId = 0; // 0 for MyFatoorah invoice or 1 for Knet in test mode

			$createdOrders = $this->createOrders($request);
			if ($createdOrders) {
				//-get ids of orders from create orders
				$ordersId = implode(',', $this->ordersIds);
				//-get total amount
				$totalAmount = $request->mainpay;
				$curlData = $this->getPayLoadData($totalAmount, $this->rand);
				//-create link to myfatorah
				$data = $this->mfObj->getInvoiceURL($curlData, $paymentMethodId);
				//-save myfatorah to auth user with ids of orders and total amount
				auth()->user()->myfatoorahs()->create(
					[
						'invoiceStatus' => 'true',
						'invoiceId' => $data['invoiceId'],
						'ordersIds' => $ordersId,
						'customerReference' => $this->rand
					]
				);
				return redirect($data['invoiceURL']);
			}
			return redirect()->back()->with('delete', 'عملية غير ناجحة');
		} catch (\Exception $e) {
			Log::error($e);
			return redirect()->back()->with('delete', 'عملية غير ناجحة');
		}
	}

//-----------------------------------------------------------------------------------------------------------------------------------------

	/**
	 *
	 * @param  int|string  $orderId
	 * @return array
	 */
	private function getPayLoadData($amount, $orderId = null)
	{
		$callbackURL = route('myfatoorah.callback');

		$customer_name = auth()->user()->fname.' '.auth()->user()->lname ?? 'no name';
		$customer_email = auth()->user()->email ?? 'no email';
		$customer_mobile = auth()->user()->mobile ?? 'no mobile';

		return [
			'CustomerName' => $customer_name,
			'InvoiceValue' => $amount,
//			'DisplayCurrencyIso' => 'KWD',
			'DisplayCurrencyIso' => 'SAR',
			'CustomerEmail' => $customer_email,
			'CallBackUrl' => $callbackURL,
			'ErrorUrl' => $callbackURL,
//			'MobileCountryCode' => '+965',
			'MobileCountryCode' => '+966',
			'CustomerMobile' =>   Str::substr($customer_mobile,0, 10),
			'Language' => 'ar',
			'CustomerReference' => $orderId,
			'SourceInfo' => config('app.name').' | '.config('app.url')
		];
	}

//-----------------------------------------------------------------------------------------------------------------------------------------

	/**
	 * Get MyFatoorah payment information
	 *
	 * @return Application|Factory|View
	 */
	public function callback()
	{

		try {
			$paymentId = request('paymentId');
			$data = $this->mfObj->getPaymentStatus($paymentId, 'PaymentId');

			if ($data->InvoiceStatus == 'Paid') {
				return $this->saveSubscribe($data);
			}

			return view('payment_fail');
		} catch (\Exception $e) {
			Log::error($e);
			return view('payment_fail');
		}
	}

//-----------------------------------------------------------------------------------------------------------------------------------------

	private function createOrders(Request $request): bool
	{
		try {
			DB::beginTransaction();
			$currency = Currency::first();
			$gsettings = Setting::first();

			$carts = Cart::where('user_id', Auth::User()->id)->get();


			foreach ($carts as $cart) {
				if ($cart->offer_price != 0) {
					$pay_amount = $cart->offer_price;
				} else {
					$pay_amount = $cart->price;
				}

				if ($cart->disamount != 0 || $cart->disamount != null) {
					$cpn_discount = $cart->disamount;
				} else {
					$cpn_discount = '';
				}


				$lastOrder = Order::orderBy('created_at', 'desc')->first();

				if (!$lastOrder) {
					// We get here if there is no order at all
					// If there is no number set it to 0, which will be 1 at the end.
					$number = 0;
				} else {
					$number = substr($lastOrder->order_id, 3);
				}

				if ($cart->type == 1) {
					$bundle_id = $cart->bundle_id;
					$bundle_course_id = $cart->bundle->course_id;
					$course_id = null;
					$duration = null;
					$instructor_payout = 0;
					$instructor_id = $cart->bundle->user_id;

					if ($cart->bundle->duration_type == "m") {
						if ($cart->bundle->duration != null && $cart->bundle->duration != '') {
							$days = $cart->bundle->duration * 30;
							$todayDate = date('Y-m-d');
							$expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
						} else {
							$todayDate = null;
							$expireDate = null;
						}
					} else {
						if ($cart->bundle->duration != null && $cart->bundle->duration != '') {
							$days = $cart->bundle->duration;
							$todayDate = date('Y-m-d');
							$expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
						} else {
							$todayDate = null;
							$expireDate = null;
						}
					}
				} else {
					if ($cart->courses->duration_type == "m") {
						if ($cart->courses->duration != null && $cart->courses->duration != '') {
							$days = $cart->courses->duration * 30;
							$todayDate = date('Y-m-d');
							$expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
						} else {
							$todayDate = null;
							$expireDate = null;
						}
					} else {
						if ($cart->courses->duration != null && $cart->courses->duration != '') {
							$days = $cart->courses->duration;
							$todayDate = date('Y-m-d');
							$expireDate = date("Y-m-d", strtotime("$todayDate +$days days"));
						} else {
							$todayDate = null;
							$expireDate = null;
						}
					}


					$setting = InstructorSetting::first();

					if ($cart->courses->instructor_revenue != null) {
						$x_amount = $pay_amount * $cart->courses->instructor_revenue;
						$instructor_payout = $x_amount / 100;
					} else {
						if (isset($setting)) {
							if ($cart->courses->user->role == "instructor") {
								$x_amount = $pay_amount * $setting->instructor_revenue;
								$instructor_payout = $x_amount / 100;
							} else {
								$instructor_payout = 0;
							}
						} else {
							$instructor_payout = 0;
						}
					}

					$bundle_id = null;
					$course_id = $cart->course_id;
					$bundle_course_id = null;
					$duration = $cart->courses->duration;
					$instructor_id = $cart->courses->user_id;
				}


				$created_order = Order::create([
	               'course_id' => $course_id,
	               'user_id' => Auth::User()->id,
	               'instructor_id' => $instructor_id,
	               'order_id' => '#'.sprintf("%08d", (int)$number + 1),
	               'transaction_id' => str_random(32),
	               'payment_method' => 'Online Payment',
	               'total_amount' => $pay_amount > 0 ? $pay_amount : $request->mainpay,
	               'coupon_discount' => $cpn_discount,
	               'currency' => $currency->currency,
	               'currency_icon' => $currency->icon,
	               'duration' => $duration,
	               'enroll_start' => $todayDate,
	               'enroll_expire' => $expireDate,
	               'status' => 0,
	               'bundle_id' => $bundle_id,
	               'bundle_course_id' => $bundle_course_id,
	               'proof' => 'no content',
	               'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
               ]);

				$this->ordersIds[] = $created_order->id;
				Wishlist::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

				Cart::where('user_id', Auth::User()->id)->where('course_id', $cart->course_id)->delete();

				if ($instructor_payout != 0) {
					if ($created_order) {
						if ($cart->type == 0) {
							if ($cart->courses->user->role == "instructor") {
								$created_payout = PendingPayout::create([
									                                        'user_id' => $cart->courses->user_id,
									                                        'course_id' => $cart->course_id,
									                                        'order_id' => $created_order->id,
									                                        'transaction_id' => $created_order->transaction_id,
									                                        'total_amount' => $pay_amount,
									                                        'currency' => $currency->currency,
									                                        'currency_icon' => $currency->icon,
									                                        'instructor_revenue' => $instructor_payout,
									                                        'created_at' => \Carbon\Carbon::now(
									                                        )->toDateTimeString(),
									                                        'updated_at' => \Carbon\Carbon::now(
									                                        )->toDateTimeString(),
								                                        ]);
							}
						}
					}
				}
			}
			DB::commit();
			return true;
		} catch (\Exception $exception) {
			DB::rollback();
			Log::error($exception);
			return false;
		}
	}

	private function saveSubscribe($data)
	{
		$myfaorahOrder = MyFatoorah::where('customerReference',$data->CustomerReference)->first();
		$user = optional(User::where('email', $data->CustomerEmail)->first()) ?? \auth()->user();
		$myfatoorah = $user->myfatoorahs->where('invoiceId', $data->InvoiceId)->first();
		if (isset($myfaorahOrder, $myfatoorah) && $myfatoorah->id == $myfaorahOrder->id){

			$myfatoorah->update([
	            'invoiceReference' =>$data->InvoiceReference ??'',
	            'customerReference' =>$data->CustomerReference??'',
	            'invoiceDisplayValue' =>$data->InvoiceDisplayValue??'',
	            'invoiceValue' =>$data->InvoiceValue??'',
	            'paidCurrencyValue' =>$data->focusTransaction->PaidCurrencyValue??'',
	            'paidCurrency' =>$data->focusTransaction->PaidCurrency??'',
	            'transactionId' =>$data->focusTransaction->PaymentId??'',
	            'paymentGateway' =>$data->focusTransaction->PaymentGateway??'',
            ]);
			$ordersIds=explode(',', $myfaorahOrder->ordersIds);
			try {
				DB::beginTransaction();
				foreach ($ordersIds as $orderId){
					$order=Order::find($orderId);
					$order->update(['status'=>1]);
				}
				DB::commit();
				return redirect('confirmation');
			}catch (\Exception $exception){
				DB::rollback();
				Log::error($exception);

				return view('payment_fail');
			}
		}

		return view('payment_fail');
	}
}
