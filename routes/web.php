<?php

use App\Http\Controllers\Front\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Models\Languages;

Route::get('login/{lang?}', function () {

    $lang = 'en';
    return view('auth.login', compact('lang'));


})->name('login');
require __DIR__ . '/auth.php';

Route::get('change-language/{lang}/{route?}/{slug?}', [LanguageController::class, 'changeLanquage'])->name('language');


foreach(Languages::all() as $lang){
    Route::get('/', [FrontendController::class, 'index'])->name('index')->middleware(['XSS']);

    Route::get('/'.__('route.about',[],$lang->code), [FrontendController::class, 'about'])->name('about')->middleware(['XSS']);
    Route::get('/'.__('route.reference',[],$lang->code), [FrontendController::class, 'reference'])->name('reference')->middleware(['XSS']);
    Route::get('/'.__('route.client',[],$lang->code), [FrontendController::class, 'client'])->name('client')->middleware(['XSS']);
    Route::get('/'.__('route.team',[],$lang->code), [FrontendController::class, 'team'])->name('team')->middleware(['XSS']);
    Route::get('/'.__('route.faqs',[],$lang->code), [FrontendController::class, 'faqs'])->name('faqs')->middleware(['XSS']);

    Route::get('/'.__('route.contact',[],$lang->code), [FrontendController::class, 'contact'])->name('contact')->middleware(['XSS']);

    Route::get('/'.__('route.projects',[],$lang->code), [FrontendController::class, 'projects'])->name('projects')->middleware(['XSS']);
    Route::get('/'.__('route.project_single',[],$lang->code).'/{slug}', [FrontendController::class, 'project_single'])->name(__($lang->code).'.project_single')->middleware(['XSS']);

    Route::get('/'.__('route.blogs',[],$lang->code), [FrontendController::class, 'blogs'])->name('blogs')->middleware(['XSS']);
    Route::get('/'.__('route.blog_single',[],$lang->code).'/{slug}', [FrontendController::class, 'blog_single'])->name(__($lang->code).'.blog_single')->middleware(['XSS']);


    Route::get('/'.__('route.services',[],$lang->code), [FrontendController::class, 'services'])->name('services')->middleware(['XSS']);
    Route::get('/'.__('route.service_single',[],$lang->code).'/{slug}', [FrontendController::class, 'service_single'])->name(__($lang->code).'.service_single')->middleware(['XSS']);



}