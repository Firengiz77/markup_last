<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Models\Contact;
use App\Models\MainInformation;
use App\Models\SocialLink;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

      $contact = Contact::first();
      $main = MainInformation::first();
      $links = SocialLink::get();

         View::share([
         'contact'=> $contact,
         'main'=> $main,
         'links' => $links
        ]);
    }
}
