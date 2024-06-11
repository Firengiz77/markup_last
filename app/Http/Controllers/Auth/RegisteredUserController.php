<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Plan;
use App\Models\Utility;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;
use App\Models\Store;
use App\Models\UserStore;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create()
    {
        if (Utility::getValByName('signup_button') == 'on') {
            return view('auth.register');
        } else {
            return abort('404', 'Page not found');
        }
    }

    public function showRegistrationForm($lang = '')
    {
        if (empty($lang)) {
            $lang = Utility::getValByName('default_language');
        }
        $langList = Utility::langList();
        $lang = array_key_exists($lang, $langList) ? $lang : 'en';
        if (empty($lang))
        {
        $lang = Utility::getValByName('default_language');
        }
        \App::setLocale($lang);
        if (Utility::getValByName('signup_button') == 'on') {
            return view('auth.register', compact('lang'));
        } else {
            return abort('404', 'Page not found');
        }
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $settings = Utility::settings();
        $lang = !empty($settings['default_language']) ? $settings['default_language'] : 'en';
        if(Utility::getValByName('email_verification') == 'on'){
            if(isset($settings['RECAPTCHA_MODULE']) && $settings['RECAPTCHA_MODULE'] == 'yes')
            {
                $validation['g-recaptcha-response'] = 'required|captcha';
            } else {
                $validation = [];
            }
            $this->validate($request, $validation);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'store_name'=>'required|max:255',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $settings = Utility::settingsById(1);

            return redirect(RouteServiceProvider::HOME);
            // return view('auth.verify-email', compact('lang'));
        }
        else{
            if(isset($settings['RECAPTCHA_MODULE']) && $settings['RECAPTCHA_MODULE'] == 'yes')
            {
                $validation['g-recaptcha-response'] = 'required|captcha';
            } else {
                $validation = [];
            }
            $this->validate($request, $validation);

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'store_name'=>'required|max:255',
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            $objUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'email_verified_at' => date("Y-m-d H:i:s"),
                'password' => Hash::make($request->password),
                'type' => 'Owner',
                'lang' => $lang,
                'avatar' => 'avatar.png',
                'created_by' => 1,
            ]);


            try {
                $dArr = [
                    'owner_name' => $objUser->name,
                    'owner_email' => $objUser->email,
                    'owner_password' => $request->password,
                ];

                $resp = Utility::sendEmailTemplate('Owner And Store Created', $objUser->email, $dArr);
                Auth::login($objUser);
            } catch (\Exception $e) {

                $objUser->delete();

                return redirect('/register'.'/'.$lang)->with('status', __('Email SMTP settings does not configure so please contact to your site admin.'));
            }

            return redirect(RouteServiceProvider::HOME);
            // try {
            //     event(new Registered($objUser));

            //     Auth::login($objUser);
            // } catch (\Exception $e) {

            //     $objUser->delete();

            //     return redirect('/register/lang?')->with('status', __('Email SMTP settings does not configure so please contact to your site admin.'));
            // }
        }

    }
}
