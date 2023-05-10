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
