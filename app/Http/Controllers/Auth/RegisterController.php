<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeUser;
use Illuminate\Support\Facades\Mail;
use App\Setting;
use Spatie\Activitylog\Contracts\Activity;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $setting = Setting::first();

        if($setting->captcha_enable == 1){
            return Validator::make($data, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'g-recaptcha-response' => 'required|captcha',
                'mobile' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:17'],
                'country_id' => ['required', 'integer'],
                'academic_qualification' => ['required', 'integer'], 
                'term' => 'required',
            ], [], trans('frontstaticword'));
        }
        else{

            return Validator::make($data, [
                'fname' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
                'mobile' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'max:17'],
                'country_id' => ['required', 'integer'],
                'academic_qualification' => ['required', 'integer'],
                'term' => 'required',
            ], [], trans('frontstaticword'));

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $setting = Setting::first();

        if($setting->mobile_enable == 1)
        {
            $mobile = $data['mobile'];
        }
        else
        {
            $mobile = NULL;
        }

        if($setting->verify_enable == 0)
        {
            $verified = \Carbon\Carbon::now()->toDateTimeString();
        }
        else
        {
            $verified = NULL;
        }
        
        
        $user = User::create([

            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'mobile' => $mobile,
            'email_verified_at'  => $verified,
            'password' => Hash::make($data['password']),
            'country_id' => $data['country_id'],
            'academic_qualification' => $data['academic_qualification'],
        ]);


        if(isset($setting->activity_enable))
        {
            if($setting->activity_enable == '1')
            {
                $project = new User();

                activity()
                   ->useLog('Register')
                   ->performedOn($project)
                   ->causedBy($user->id)
                   ->withProperties(['customProperty' => 'Register'])
                   ->log('User Register')
                   ->subject('Register');

            }
        }
        

        if($setting->w_email_enable == 1){
            try{
               
                Mail::to($data['email'])->send(new WelcomeUser($user));
               
            }
            catch(\Swift_TransportException $e){

            }
        }
        

        return $user;
    }
}
