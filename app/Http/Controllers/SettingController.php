<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\User;
use App\Models\Settings;
use App\Models\Utility;
use App\Models\PixelFields;
use App\Repositories\ImageRepository;
use Artisan;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SettingController extends Controller
{

    private ImageRepository $imageRepository;

    public function __construct(ImageRepository $imageRepository)
    {

        $this->imageRepository = $imageRepository;


    }

    public function index()
    {
        $settings = Utility::settings();

        $timezones = config('timezones');

        if (Auth::user()->type == 1) {

            return view('settings.index', compact('settings', 'timezones'));
        } else {
            $user = Auth::user();

            return redirect()->back()->with('error', __('Permission denied.'));

        }

    }

    public function saveSocialSettings(Request $request)
    {
        DB::beginTransaction();

        try {

//            DB::table('social_settings')->truncate();
            SocialSettings::query()->delete();

            foreach ($request->socialFields as $item) {


                $settings = new SocialSettings();

                $settings->key = $item['key'];
                $settings->value = $item['value'];

                $settings->save();


            }

            DB::commit();

            return redirect()->back()->with('success', __('Social setting successfully saved.'));
        } catch (Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', __('Social setting not saved.') . $e->getMessage());


        }

    }

    public function saveBusinessSettings(Request $request)
    {

        $user = \Auth::user();

        if (\Auth::user()->type == 1) {


            if ($request->logo_dark) {
                $logoName = 'logo-dark.png';
                $dir = 'uploads/logo/';

                $validation = [
                    'mimes:' . 'png',
                    'max:' . '20480',
                ];
                $path = Utility::upload_file($request, 'logo_dark', $logoName, $dir, $validation);
                if ($path['flag'] == 1) {

                    $logo_dark = $path['url'];

                } else {
                    return redirect()->back()->with('error', __($path['msg']));
                }

            }

            if ($request->logo_light) {

                $logoName = 'logo-light.png';
                $dir = 'uploads/logo/';
                $validation = [
                    'mimes:' . 'png',
                    'max:' . '20480',
                ];
                $path = Utility::upload_file($request, 'logo_light', $logoName, $dir, $validation);
                if ($path['flag'] == 1) {
                    $logo_light = $path['url'];
                } else {
                    return redirect()->back()->with('error', __($path['msg']));
                }
            }


            if ($request->favicon) {
                $favicon = 'favicon.png';
                $dir = 'uploads/logo/';
                $validation = [
                    'mimes:' . 'png',
                    'max:' . '20480',
                ];


                $path = Utility::upload_file($request, 'favicon', $favicon, $dir, $validation);
                if ($path['flag'] == 1) {
                    $favicon = $path['url'];
                } else {
                    return redirect()->back()->with('error', __($path['msg']));
                }

            }


            if ($request->contact_image1) {

                $image = $this->imageRepository->upload($request, 'Contact', 'contact_image1');
                if (!$image['status']) return [
                    'status' => false,
                    'code' => 502,
                    'message' => __('Image Error.')
                ]; elseif ($image['code'] == 200) {
                    $contact_image1 = $image['data'];
                    $settings = Settings::where('name', 'contact_image1')->first();
                    if ($settings) {
                        $settings->value = $image['data'];
                        $settings->created_by = 1;

                        $settings->save();
                    } else {
                        $settings = new Settings();

                        $settings->created_by = 1;
                        $settings->name = 'contact_image1';
                        $settings->value = $image['data'];

                        $settings->save();
                    }
                }


            }

            if ($request->contact_image2) {

                $image = $this->imageRepository->upload($request, 'Contact', 'contact_image2');
                if (!$image['status']) return [
                    'status' => false,
                    'code' => 502,
                    'message' => __('Image Error.')
                ]; elseif ($image['code'] == 200) {
                    $contact_image2 = $image['data'];

                    $settings = Settings::where('name', 'contact_image2')->first();
                    if ($settings) {
                        $settings->value = $image['data'];
                        $settings->created_by = 1;

                        $settings->save();
                    } else {
                        $settings = new Settings();

                        $settings->created_by = 1;
                        $settings->name = 'contact_image2';
                        $settings->value = $image['data'];

                        $settings->save();
                    }
                }

            }


            if (!empty($request->map) || !empty($request->title_text) || !empty($request->color) || !empty($request->cust_theme_bg) || !empty($request->cust_darklayout) || !empty($request->footer_text) || !empty($request->default_language) || !empty($request->display_landing_page) || !empty($request->email_verification)) {
                $post = $request->all();
                if (!isset($request->display_landing_page)) {
                    $post['display_landing_page'] = 'off';
                }
                if (!isset($request->signup_button)) {
                    $post['signup_button'] = 'off';
                }
                if (!isset($request->cust_theme_bg)) {
                    $post['cust_theme_bg'] = 'off';
                }
                if (!isset($request->cust_darklayout)) {
                    $post['cust_darklayout'] = 'off';
                }
                if (!isset($request->email_verification)) {
                    $post['email_verification'] = 'off';
                }
                if (!isset($request->blog_notifications)) {
                    $post['blog_notifications'] = 'off';
                }
                if (isset($request->color) && $request->color_flag == 'false') {
                    $post['color'] = $request->color;
                } else {
                    $post['color'] = $request->custom_color;
                }
                $post['color_flag'] = $request->color_flag;
                $SITE_RTL = $request->has('SITE_RTL') ? $request->SITE_RTL : 'off';
                $post['SITE_RTL'] = $SITE_RTL;

                unset($post['_token'], $post['logo_dark'], $post['logo_light'], $post['favicon'],);


                foreach ($post as $key => $data) {
                    // return $key;

                    $settings = Settings::where('name', $key)->first();
                    if ($settings) {
                        $settings->value = $data;
                        $settings->created_by = 1;

                        $settings->save();
                    } else {
                        $settings = new Settings();

                        $settings->created_by = 1;
                        $settings->name = $key;
                        $settings->value = $data;

                        $settings->save();
                    }


                }
            }


        }

        return redirect()->back()->with('success', __('Business setting successfully saved.'));
    }

    public function saveCompanySettings(Request $request)
    {


        $request->validate(
            [
                'company_name' => 'required|string|max:50',
                'company_email' => 'required',
                'company_email_from_name' => 'required|string',
            ]
        );
        $post = $request->all();
        unset($post['_token']);

        foreach ($post as $key => $data) {
            // return $key;

            $settings = Settings::where('name', $key)->first();
            if ($settings) {
                $settings->value = $data;
                $settings->created_by = 1;

                $settings->save();
            } else {
                $settings = new Settings();

                $settings->created_by = 1;
                $settings->name = $key;
                $settings->value = $data;

                $settings->save();
            }


        }

    }

    public function saveEmailSettings(Request $request)
    {

        if (\Auth::user()->type == 1) {
            $request->validate(
                [
                    'mail_driver' => 'required|string|max:50',
                    'mail_host' => 'required|string|max:50',
                    'mail_port' => 'required|string|max:50',
                    'mail_username' => 'required|string|max:50',
                    'mail_password' => 'required|string|max:50',
                    'mail_encryption' => 'required|string|max:50',
                    'mail_from_address' => 'required|string|max:50',
                    'mail_from_name' => 'required|string|max:50',
                ]
            );

            $arrEnv = [
                'MAIL_DRIVER' => $request->mail_driver,
                'MAIL_HOST' => $request->mail_host,
                'MAIL_PORT' => $request->mail_port,
                'MAIL_USERNAME' => $request->mail_username,
                'MAIL_PASSWORD' => $request->mail_password,
                'MAIL_ENCRYPTION' => $request->mail_encryption,
                // 'MAIL_FROM_NAME' => $request->mail_from_name,
                // 'MAIL_FROM_ADDRESS' => $request->mail_from_address,
            ];
            $post = [
                'mail_driver' => $request->mail_driver,
                'mail_host' => $request->mail_host,
                'mail_port' => $request->mail_port,
                'mail_username' => $request->mail_username,
                'mail_password' => $request->mail_password,
                'mail_encryption' => $request->mail_encryption,
                'mail_from_name' => $request->mail_from_name,
                'mail_from_address' => $request->mail_from_address,
            ];
            foreach ($post as $key => $data) {
                // return $key;

                $settings = Settings::where('name', $key)->first();
                if ($settings) {
                    $settings->value = $data;
                    $settings->created_by = 1;

                    $settings->save();
                } else {
                    $settings = new Settings();

                    $settings->created_by = 1;
                    $settings->name = $key;
                    $settings->value = $data;

                    $settings->save();
                }


            }
            Utility::setEnvironmentValue($arrEnv);

            return redirect()->back()->with('success', __('Email Setting successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function saveSystemSettings(Request $request)
    {

        $request->validate(
            [
                'site_currency' => 'required',
            ]
        );
        $post = $request->all();
        unset($post['_token']);
        if (!isset($post['shipping_display'])) {
            $post['shipping_display'] = 'off';
        }
        foreach ($post as $key => $data) {
            // return $key;

            $settings = Settings::where('name', $key)->first();
            if ($settings) {
                $settings->value = $data;
                $settings->created_by = 1;

                $settings->save();
            } else {
                $settings = new Settings();

                $settings->created_by = 1;
                $settings->name = $key;
                $settings->value = $data;

                $settings->save();
            }


        }

        return redirect()->back()->with('success', __('Setting successfully updated.'));

    }

    public function savePusherSettings(Request $request)
    {
        if (\Auth::user()->type == 1) {
            $request->validate(
                [
                    'pusher_app_id' => 'required',
                    'pusher_app_key' => 'required',
                    'pusher_app_secret' => 'required',
                    'pusher_app_cluster' => 'required',
                ]
            );

            $arrEnvStripe = [
                'PUSHER_APP_ID' => $request->pusher_app_id,
                'PUSHER_APP_KEY' => $request->pusher_app_key,
                'PUSHER_APP_SECRET' => $request->pusher_app_secret,
                'PUSHER_APP_CLUSTER' => $request->pusher_app_cluster,
            ];
            Artisan::call('config:cache');
            Artisan::call('config:clear');
            $envStripe = Utility::setEnvironmentValue($arrEnvStripe);

            if ($envStripe) {
                return redirect()->back()->with('success', __('Pusher successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Something went wrong.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function testMail(Request $request)
    {
        $user = \Auth::user();

        $data = [];
        $data['mail_driver'] = $request->mail_driver;
        $data['mail_host'] = $request->mail_host;
        $data['mail_port'] = $request->mail_port;
        $data['mail_username'] = $request->mail_username;
        $data['mail_password'] = $request->mail_password;
        $data['mail_encryption'] = $request->mail_encryption;
        $data['mail_from_address'] = $request->mail_from_address;
        $data['mail_from_name'] = $request->mail_from_name;

        return view('settings.test_mail', compact('data'));
    }

    public function testSendMail(Request $request)
    {
        $validator = \Validator::make(
            $request->all(), [
                //    'email' => 'required|email',
                'mail_driver' => 'required',
                'mail_host' => 'required',
                'mail_port' => 'required',
                'mail_username' => 'required',
                'mail_password' => 'required',
                'mail_from_address' => 'required',
                'mail_from_name' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return response()->json(
                [
                    'is_success' => false,
                    'message' => $messages->first(),
                ]
            );
        }
        try {
            config(
                [
                    'mail.driver' => $request->mail_driver,
                    'mail.host' => $request->mail_host,
                    'mail.port' => $request->mail_port,
                    'mail.encryption' => $request->mail_encryption,
                    'mail.username' => $request->mail_username,
                    'mail.password' => $request->mail_password,
                    'mail.from.address' => $request->mail_from_address,
                    'mail.from.name' => $request->mail_from_name,
                ]
            );
            Mail::to($request->email)->send(new testMail());
        } catch (\Exception $e) {
            return response()->json(
                [
                    'is_success' => false,
                    'message' => $e->getMessage(),
                ]
            );
        }
        // return redirect()->back()->with('success', __('Email send Successfully.') . ((isset($smtp_error)) ? '<br> <span class="text-danger">' . $smtp_error . '</span>' : ''));
        return response()->json(
            [
                'is_success' => true,
                'message' => __('Email send Successfully'),
            ]
        );

    }

    public function recaptchaSettingStore(Request $request)
    {
        if (\Auth::user()->type == 1) {

            $user = \Auth::user();
            $rules = [];
            if ($request->recaptcha_module == 'yes') {
                $rules['google_recaptcha_key'] = 'required|string|max:50';
                $rules['google_recaptcha_secret'] = 'required|string|max:50';
            }
            $validator = \Validator::make(
                $request->all(), $rules
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();
                return redirect()->back()->with('error', $messages->first());
            }
            $post = [];
            $post['RECAPTCHA_MODULE'] = $request->recaptcha_module ?? 'no';
            $post['NOCAPTCHA_SITEKEY'] = $request->google_recaptcha_key;
            $post['NOCAPTCHA_SECRET'] = $request->google_recaptcha_secret;
            foreach ($post as $key => $data) {
                // return $key;

                $settings = Settings::where('name', $key)->first();
                if ($settings) {
                    $settings->value = $data;
                    $settings->created_by = 1;

                    $settings->save();
                } else {
                    $settings = new Settings();

                    $settings->created_by = 1;
                    $settings->name = $key;
                    $settings->value = $data;

                    $settings->save();
                }


            }
            return redirect()->back()->with('success', __('Recaptcha Settings updated successfully'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function storageSettingStore(Request $request)
    {

        if (isset($request->storage_setting) && $request->storage_setting == 'local') {
            $request->validate(
                [

                    'local_storage_validation' => 'required',
                    'local_storage_max_upload_size' => 'required',
                ]
            );

            $post['storage_setting'] = $request->storage_setting;
            $local_storage_validation = implode(',', $request->local_storage_validation);
            $post['local_storage_validation'] = $local_storage_validation;
            $post['local_storage_max_upload_size'] = $request->local_storage_max_upload_size;

        }
        if (isset($request->storage_setting) && $request->storage_setting == 's3') {

            $request->validate(
                [
                    's3_key' => 'required',
                    's3_secret' => 'required',
                    's3_region' => 'required',
                    's3_bucket' => 'required',
                    's3_url' => 'required',
                    's3_endpoint' => 'required',
                    's3_max_upload_size' => 'required',
                    's3_storage_validation' => 'required',
                ]
            );
            $post['storage_setting'] = $request->storage_setting;
            $post['s3_key'] = $request->s3_key;
            $post['s3_secret'] = $request->s3_secret;
            $post['s3_region'] = $request->s3_region;
            $post['s3_bucket'] = $request->s3_bucket;
            $post['s3_url'] = $request->s3_url;
            $post['s3_endpoint'] = $request->s3_endpoint;
            $post['s3_max_upload_size'] = $request->s3_max_upload_size;
            $s3_storage_validation = implode(',', $request->s3_storage_validation);
            $post['s3_storage_validation'] = $s3_storage_validation;

        }

        if (isset($request->storage_setting) && $request->storage_setting == 'wasabi') {
            $request->validate(
                [
                    'wasabi_key' => 'required',
                    'wasabi_secret' => 'required',
                    'wasabi_region' => 'required',
                    'wasabi_bucket' => 'required',
                    'wasabi_url' => 'required',
                    'wasabi_root' => 'required',
                    'wasabi_max_upload_size' => 'required',
                    'wasabi_storage_validation' => 'required',
                ]
            );
            $post['storage_setting'] = $request->storage_setting;
            $post['wasabi_key'] = $request->wasabi_key;
            $post['wasabi_secret'] = $request->wasabi_secret;
            $post['wasabi_region'] = $request->wasabi_region;
            $post['wasabi_bucket'] = $request->wasabi_bucket;
            $post['wasabi_url'] = $request->wasabi_url;
            $post['wasabi_root'] = $request->wasabi_root;
            $post['wasabi_max_upload_size'] = $request->wasabi_max_upload_size;
            $wasabi_storage_validation = implode(',', $request->wasabi_storage_validation);
            $post['wasabi_storage_validation'] = $wasabi_storage_validation;
        }

        foreach ($post as $key => $data) {
            // return $key;

            $settings = Settings::where('name', $key)->first();
            if ($settings) {
                $settings->value = $data;
                $settings->created_by = 1;

                $settings->save();
            } else {
                $settings = new Settings();

                $settings->created_by = 1;
                $settings->name = $key;
                $settings->value = $data;

                $settings->save();
            }


        }

        return redirect()->back()->with('success', 'Storage setting successfully updated.');

    }

    public function CookieConsent(Request $request)
    {

        $settings = Utility::settings();

        if ($settings['enable_cookie'] == "on" && $settings['cookie_logging'] == "on") {
            $allowed_levels = ['necessary', 'analytics', 'targeting'];
            $levels = array_filter($request['cookie'], function ($level) use ($allowed_levels) {
                return in_array($level, $allowed_levels);
            });
            $whichbrowser = new \WhichBrowser\Parser($_SERVER['HTTP_USER_AGENT']);
            // Generate new CSV line
            $browser_name = $whichbrowser->browser->name ?? null;
            $os_name = $whichbrowser->os->name ?? null;
            $browser_language = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? mb_substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : null;
            $device_type = Utility::get_device_type($_SERVER['HTTP_USER_AGENT']);

//            $ip = $_SERVER['REMOTE_ADDR'];
            $ip = '49.36.83.154';
            $query = @unserialize(file_get_contents('http://ip-api.com/php/' . $ip));


            $date = (new \DateTime())->format('Y-m-d');
            $time = (new \DateTime())->format('H:i:s') . ' UTC';


            $new_line = implode(',', [$ip, $date, $time, json_encode($request['cookie']), $device_type, $browser_language, $browser_name, $os_name,
                isset($query) ? $query['country'] : '', isset($query) ? $query['region'] : '', isset($query) ? $query['regionName'] : '', isset($query) ? $query['city'] : '', isset($query) ? $query['zip'] : '', isset($query) ? $query['lat'] : '', isset($query) ? $query['lon'] : '']);

            if (!file_exists(storage_path() . '/uploads/sample/data.csv')) {

                $first_line = 'IP,Date,Time,Accepted cookies,Device type,Browser language,Browser name,OS Name,Country,Region,RegionName,City,Zipcode,Lat,Lon';
                file_put_contents(storage_path() . '/uploads/sample/data.csv', $first_line . PHP_EOL, FILE_APPEND | LOCK_EX);
            }
            file_put_contents(storage_path() . '/uploads/sample/data.csv', $new_line . PHP_EOL, FILE_APPEND | LOCK_EX);

            return response()->json('success');
        }
        return response()->json('error');
    }

    public function saveCookieSettings(Request $request)
    {

        $validator = \Validator::make(
            $request->all(), [
                'cookie_title' => 'required',
                'cookie_description' => 'required',
                'strictly_cookie_title' => 'required',
                'strictly_cookie_description' => 'required',
                'more_information_title' => 'required',
                'contactus_url' => 'required',
            ]
        );

        $post = $request->all();

        unset($post['_token']);

        if ($request->enable_cookie) {
            $post['enable_cookie'] = 'on';
        } else {
            $post['enable_cookie'] = 'off';
        }
        if ($request->cookie_logging) {
            $post['cookie_logging'] = 'on';
        } else {
            $post['cookie_logging'] = 'off';
        }

        $post['cookie_title'] = $request->cookie_title;
        $post['cookie_description'] = $request->cookie_description;
        $post['strictly_cookie_title'] = $request->strictly_cookie_title;
        $post['strictly_cookie_description'] = $request->strictly_cookie_description;
        $post['more_information_title'] = $request->more_information_title;
        $post['contactus_url'] = $request->contactus_url;

        $settings = Utility::settings();
        foreach ($post as $key => $data) {
            // return $key;

            $settings = Settings::where('name', $key)->first();
            if ($settings) {
                $settings->value = $data;
                $settings->created_by = 1;

                $settings->save();
            } else {
                $settings = new Settings();

                $settings->created_by = 1;
                $settings->name = $key;
                $settings->value = $data;

                $settings->save();
            }


        }
        return redirect()->back()->with('success', 'Cookie setting successfully saved.');
    }

}
