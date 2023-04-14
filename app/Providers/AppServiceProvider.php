<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;
use App\Setting;
use App\Currency;
use App\InstructorSetting;
use App\Helpers\SeoHelper;
use Tracker;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);


        try {
            \DB::connection()->getPdo();


            $code = @file_get_contents(public_path() . '/code.txt');

            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip_address = @$_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from proxy
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip_address = @$_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from remote address
            else {
                $ip_address = @$_SERVER['REMOTE_ADDR'];
            }

            $d = \Request::getHost();
            $domain = str_replace("www.", "", $d);

            if ($domain == 'localhost' || strstr($domain, '.test') || strstr($domain, '192.168.0') || strstr($domain, 'mediacity.co.in')) {
                // No Code
            } else {
                Tracker::validSettings($code, $domain, $ip_address);
            }

            if (\DB::connection()->getDatabaseName() && Schema::hasTable('settings')) {
                SeoHelper::seosettings();
            }

            if (\DB::connection()->getDatabaseName()) {
                if (Schema::hasTable('settings')) {
                    $setting = Setting::first();
                    $project_title = $setting->project_title;
                    $cpy_txt = $setting->cpy_txt;
                    $gsetting = $setting;
                    $currency = Currency::first();
                    $isetting = InstructorSetting::first();
                    $zoom_enable = $setting->zoom_enable;
                }
            }
            view()->composer('*', function ($view) use($project_title, $cpy_txt, $gsetting, $currency, $isetting, $zoom_enable) {
                $view->with([
                    'project_title' => $project_title,
                    'cpy_txt'=> $cpy_txt,
                    'gsetting' => $gsetting,
                    'currency' => $currency,
                    'isetting' => $isetting,
                    'zoom_enable' => $zoom_enable,
                ]);
            });
        } catch(\Exception $ex) {
        }
    }
}
