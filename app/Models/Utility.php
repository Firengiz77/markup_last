<?php

namespace App\Models;

use App\Mail\CommonEmailTemplate;
use App\Models\EmailTemplateLang;
use Illuminate\Database\Eloquent\Model;
use App\Models\Languages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Jenssegers\Date\Date;
use Twilio\Rest\Client;

class Utility extends Model
{
    private static $settings = null;
    private static $fetchsettings = null;
    private static $storageSetting = null;
    private static $colorset = null;
    private static $tableExist = null;
    private static $languages = null;

    public function createSlug($table, $title, $id = 0)
    {
        // Normalize the title
        $slug = Str::slug($title, '-');
        // Get any that could possibly be related.
        // This cuts the queries down by doing it once.
        $allSlugs = $this->getRelatedSlugs($table, $slug, $id);
        // If we haven't used it before then we are all good.
        if (!$allSlugs->contains('slug', $slug)) {
            return $slug;
        }
        // Just append numbers like a savage until we find not used.
        for ($i = 1; $i <= 100; $i++) {
            $newSlug = $slug . '-' . $i;
            if (!$allSlugs->contains('slug', $newSlug)) {
                return $newSlug;

            }
        }
        throw new \Exception('Can not create a unique slug');
    }

    protected function getRelatedSlugs($table, $slug, $id = 0)
    {
        return DB::table($table)->select()->where('slug', 'like', $slug . '%')->where('id', '<>', $id)->get();
    }


    public static function settings()
    {
        if (self::$fetchsettings === null) {
            $data = DB::table('settings');

            if (\Auth::check()) {
                $data = $data->where('created_by', '=', \Auth::user()->creatorId());


            } else {
                $data = $data->where('created_by', '=', 1);
            }
            $data = $data->get();
            self::$fetchsettings = $data;
        }

        $settings = [

            "logo_dark" => "logo-dark.png",
            "logo_light" => "logo-light.png",
            "contact_image1" => "logo-light.png",
            "contact_image2" => "logo-light.png",


            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",

            "quote_template" => "template1",
            "quote_color" => "ffffff",

            "footer_title" => "",
            "footer_notes" => "",

            "default_language" => "en",
            "decimal_number" => "2",

            "footer_link_1" => "Support",

            "social_text" => "",
            "email_text" => "",
            "contact_text" => "",

            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "title_text" => "",
            "footer_text" => "",
            "company_logo_light" => "logo-light.png",
            "company_logo_dark" => "logo-dark.png",
            "company_favicon" => "",
            "gdpr_cookie" => "",
            "cookie_text" => "",
            "signup_button" => "on",
            "email_verification" => "on",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "color" => "theme-3",
            "SITE_RTL" => "off",
            "is_checkout_login_required" => "on",
            "storage_setting" => "local",
            "local_storage_validation" => "jpg,jpeg,png,xlsx,xls,csv,pdf,webp,svg",
            "local_storage_max_upload_size" => "2048000",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url" => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
            'enable_cookie'=>'on',
            'necessary_cookies'=>'on',
            'cookie_logging'=>'on',
            'cookie_title'=>'We use cookies!',
            'cookie_description'=>'Hi, this website uses essential cookies to ensure its proper operation and tracking cookies to understand how you interact with it.',
            'strictly_cookie_title'=>'Strictly necessary cookies',
            'strictly_cookie_description'=>'These cookies are essential for the proper functioning of my website. Without these cookies, the website would not work properly',
            'more_information_description'=>'For any queries in relation to our policy on cookies and your choices, please contact us',
            'contactus_url'=>'#',
            'chatgpt_key'=>'',
            'disable_lang'=>'',
            'mail_driver'=>'',
            'mail_host'=>'',
            'mail_port'=>'',
            'mail_username'=>'',
            'mail_password'=>'',
            'mail_encryption'=>'',
            'mail_from_name'=>'',
            'mail_from_address'=>'',
            "timezone"=>"Asia/Baku",
            "color_flag"=>"false",
        ];

        foreach (self::$fetchsettings as $row) {
            $settings[$row->name] = $row->value;
        }
        return $settings;

    }
    public static function checktableExist(){
        if(is_null(self::$tableExist)){
            $table = \Schema::hasTable('languages');
            self::$tableExist = $table;
        }
        return self::$tableExist;
    }

    public static function languages()
    {
        if(is_null(self::$languages)){
            $languages=Utility::langList();
            if(Utility::checktableExist()){
                $settings = Utility::langSetting();
                if(!empty($settings['disable_lang'])){
                    $disabledlang = explode(',', $settings['disable_lang']);
                    $languages = Languages::whereNotIn('code',$disabledlang)->pluck('fullName','code')->reverse();
                }
                else{
                    $languages = Languages::pluck('fullName','code')->reverse();
                }
            }
            self::$languages = $languages;
        }

        return self::$languages;
    }

    public static function getValByName($key)
    {
        $setting = Utility::settings();

        if (!isset($setting[$key]) || empty($setting[$key])) {
            $setting[$key] = '';
        }
        return $setting[$key];
    }


    public static function getDateFormated($date, $time = false)
    {
        if (!empty($date) && $date != '0000-00-00') {
            if ($time == true) {
                return date("d M Y H:i A", strtotime($date));
            } else {
                return date("d M Y", strtotime($date));
            }
        } else {
            return '';
        }
    }



    public static function setEnvironmentValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}='{$envValue}'\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}='{$envValue}'", $str);
                }
            }
        }
        $str = substr($str, 0, -1);
        $str .= "\n";
        if (!file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }




    public static function timeFormat($settings, $time)
    {
        return date($settings['site_date_format'], strtotime($time));
    }

    public static function dateFormat($date)
    {
        $settings = Utility::settings();

        return date($settings['site_date_format'], strtotime($date));
    }






    // get font-color code accourding to bg-color
    public static function hex2rgb($hex)
    {
        $hex = str_replace("#", "", $hex);

        if (strlen($hex) == 3) {
            $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
            $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
            $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
        } else {
            $r = hexdec(substr($hex, 0, 2));
            $g = hexdec(substr($hex, 2, 2));
            $b = hexdec(substr($hex, 4, 2));
        }
        $rgb = array(
            $r,
            $g,
            $b,
        );

        //return implode(",", $rgb); // returns the rgb values separated by commas
        return $rgb; // returns an array with the rgb values
    }

    public static function getFontColor($color_code)
    {
        $rgb = self::hex2rgb($color_code);
        $R = $G = $B = $C = $L = $color = '';

        $R = (floor($rgb[0]));
        $G = (floor($rgb[1]));
        $B = (floor($rgb[2]));

        $C = [
            $R / 255,
            $G / 255,
            $B / 255,
        ];

        for ($i = 0; $i < count($C); ++$i) {
            if ($C[$i] <= 0.03928) {
                $C[$i] = $C[$i] / 12.92;
            } else {
                $C[$i] = pow(($C[$i] + 0.055) / 1.055, 2.4);
            }
        }

        $L = 0.2126 * $C[0] + 0.7152 * $C[1] + 0.0722 * $C[2];

        if ($L > 0.179) {
            $color = 'black';
        } else {
            $color = 'white';
        }

        return $color;
    }

    public static function delete_directory($dir)
    {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!self::delete_directory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }

        return rmdir($dir);
    }

    public static function getSuperAdminValByName($key)
    {
        $data = DB::table('settings');
        $data = $data->where('name', '=', $key);
        $data = $data->first();
        if (!empty($data)) {
            $record = $data->value;
        } else {
            $record = '';
        }

        return $record;
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')

    // Email Template Modules Function START

    public static function userDefaultData()
    {
        // Make Entry In User_Email_Template
        $allEmail = EmailTemplate::all();
        foreach ($allEmail as $email) {
            UserEmailTemplate::create(
                [
                    'template_id' => $email->id,
                    'user_id' => 1,
                    'is_active' => 1,
                ]
            );
        }
    }

    // Common Function That used to send mail with check all cases
    public static function sendEmailTemplate($emailTemplate, $mailTo, $obj, $lang='az')
    {
        $template = EmailTemplate::where('name', 'LIKE', $emailTemplate)->first();

        if (isset($template) && !empty($template)) {
            // check template is active or not by company


                // get email content language base
                $content = EmailTemplateLang::where('parent_id', '=', $template->id)->where('lang', 'LIKE', 'en')->first();

                $content->from = $template->from;

                if (!empty($content->content)) {
                    $content->content = self::replaceVariables($content->content, $obj);//$order=null

                    // send email
                    try
                    {

                        $user = Auth::user();
                            $settings = Utility::settingsById(1);
                            config(
                                [
                                    'mail.driver' => isset($settings['mail_driver']) ? $settings['mail_driver'] : '',
                                    'mail.host' => isset($settings['mail_host']) ? $settings['mail_host'] : '',
                                    'mail.port' => isset($settings['mail_port']) ? $settings['mail_port'] : '',
                                    'mail.encryption' => isset($settings['mail_encryption']) ? $settings['mail_encryption'] : '',
                                    'mail.username' => isset($settings['mail_username']) ? $settings['mail_username'] : '',
                                    'mail.password' => isset($settings['mail_password']) ? $settings['mail_password'] : '',
                                    'mail.from.address' => isset($settings['mail_from_address']) ? $settings['mail_from_address'] : '',
                                    'mail.from.name' => isset($settings['mail_from_name']) ? $settings['mail_from_name'] : '',
                                ]
                            );




                            Mail::to(
                                [
                                    $mailTo,

                                ]
                            )->send(new CommonEmailTemplate($content));


                    } catch (\Exception $e) {
                        $error = __('E-Mail has been not sent due to SMTP configuration');
                    }
                    if (isset($error)) {
                        $arReturn = [
                            'is_success' => false,
                            'error' => $error,
                        ];
                    } else {
                        $arReturn = [
                            'is_success' => true,
                            'error' => false,
                        ];
                    }
                } else {
                    $arReturn = [
                        'is_success' => false,
                        'error' => __('Mail not send, email is empty'),
                    ];
                }
                return $arReturn;

        } else {
            return [
                'is_success' => false,
                'error' => __('Mail not send, email not found'),
            ];
        }
        //        }
    }


    public static function replaceVariables($content, $obj)
    {
        $arrValue = [
            '{app_name}' => env('APP_NAME'),
            '{form_name}' => '-',
            '{form_email}' => '-',
            '{form_message}' => '-',
            '{form_phone}' => '-',
            '{app_url}' => '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>',
        ];

        foreach ($obj as $key => $val) {
            $arrValue[$key] = $val;
        }
        Log::channel('custom')->info('OBJ : '.json_encode($obj));

        return str_replace(array_keys($arrValue), array_values($arrValue), $content);
    }

    // used for replace email variable (parameter 'template_name','id(get particular record by id for data)')
//    public static function replaceVariables($content, $obj)
//    {
//        Log::channel('custom')->info('OBJ : '.json_encode($obj));
//
//        $arrVariable = [
//            '{app_name}',
//            '{form_name}',
//            '{form_email}',
//            '{form_message}',
//            '{form_phone}',
//
//            '{app_url}',
//
//
//        ];
//        $arrValue = [
//            'app_name' => '-',
//            'app_url' => '-',
//            'test_1' => '-',
//            'form_name' => '-',
//            'form_email' => '-',
//            'form_message' => '-',
//            'form_phone' => '-',
//        ];
//        foreach ($obj as $key => $val) {
//            $arrValue[$key] = $val;
//        }
//
//        $arrValue['app_name'] = env('APP_NAME');
//        $arrValue['app_url'] = '<a href="' . env('APP_URL') . '" target="_blank">' . env('APP_URL') . '</a>';
//
//
//
//
//
//        return str_replace($arrVariable, array_values($arrValue), $content);
//    }

    // Make Entry in email_tempalte_lang table when create new language
    public static function makeEmailLang($lang)
    {
        $template = EmailTemplate::all();
        foreach ($template as $t) {
            $default_lang = EmailTemplateLang::where('parent_id', '=', $t->id)->where('lang', 'LIKE', 'en')->first();
            $emailTemplateLang = new EmailTemplateLang();
            $emailTemplateLang->parent_id = $t->id;
            $emailTemplateLang->lang = $lang;
            $emailTemplateLang->subject = $default_lang->subject;
            $emailTemplateLang->content = $default_lang->content;
            $emailTemplateLang->save();
        }
    }

    // For Email template Module
    public static function defaultEmail()
    {
        // Email Template
        $emailTemplate = [
            'Order Created',
            'Status Change',
            'Order Created For Owner',
            'Owner And Store Created',
        ];

        foreach ($emailTemplate as $eTemp) {
            EmailTemplate::create(
                [
                    'name' => $eTemp,
                    'from' => env('APP_NAME'),
                    'created_by' => 1,
                ]
            );
        }

        $defaultTemplate = [
            'Order Created' => [
                'subject' => 'Order Complete',
                'lang' => [

                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We received your purchase request, we\'ll be in touch shortly!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',

                    ],
            ],
            'Status Change' => [
                'subject' => 'Order Status',
                'lang' => [

                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',

                ],
            ],

            'Order Created For Owner' => [
                'subject' => 'Order Detail',
                'lang' => [

                    'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>This is Confirmation Order {order_id} place on&nbsp;<span style=\"font-size: 1rem;\">{order_date}.</span></p><p>Thanks,</p><p>{order_url}</p>',

                ],
            ],

            'Owner And Store Created' => [
                'subject' => 'Owner And Store Detail',
                'lang' => [

                    'en' => '<p>Hello,<b> {owner_name} </b>!</p> <p>Welcome to our app yore login detail for <b> {app_name}</b> is <br></p> <p><b>Email   : </b>{owner_email}</p> <p><b>Password   : </b>{owner_password}</p> <p><b>App url    : </b>{app_url}</p> <p><b>Store url    : </b>{store_url}</p> <p>Thank you for connecting with us,</p> <p>{app_name}</p>',

                ],
            ],

        ];

        $email = EmailTemplate::all();

        foreach ($email as $e) {
            foreach ($defaultTemplate[$e->name]['lang'] as $lang => $content) {
                $emailTemp = EmailTemplateLang::where('lang',$lang)->where('subject',$defaultTemplate[$e->name]['subject'])->first();
                if(!$emailTemp){
                    EmailTemplateLang::create(
                        [
                            'parent_id' => $e->id,
                            'lang' => $lang,
                            'subject' => $defaultTemplate[$e->name]['subject'],
                            'content' => $content,
                        ]
                    );
                }
            }
        }
    }









    public static function colorset()
    {
        if(is_null(self::$colorset)){

                $setting = DB::table('settings')->where('created_by', 1)->pluck('value', 'name')->toArray();

            if (!isset($setting['color'])) {
                $setting = Utility::settings();
            }
            self::$colorset = $setting;
        }
       return self::$colorset;
    }

    public static function GetLogo()
    {
        $setting = Utility::colorset();

        if (\Auth::user() && \Auth::user()->type != 1) {

            if (isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on') {
                return Utility::getValByName('company_logo_light');
            } else {
                return Utility::getValByName('company_logo_dark');
            }
        } else {
            if (isset($setting['cust_darklayout']) && $setting['cust_darklayout'] == 'on') {
                return Utility::getValByName('logo_light');
            } else {
                return Utility::getValByName('logo_dark');
            }

        }

    }

    public static function upload_file($request, $key_name, $name, $path, $custom_validation = [])
    {
        try {
            $settings = Utility::getStorageSetting();

            if (!empty($settings['storage_setting'])) {

                if ($settings['storage_setting'] == 'wasabi') {

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com',
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
                    $mimes = !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';

                } else if ($settings['storage_setting'] == 's3') {
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
                    $mimes = !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';

                } else {
                    $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

                    $mimes = !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
                }

                $file = $request->$key_name;

                if (count($custom_validation) > 0) {
                    $validation = $custom_validation;
                } else {

                    $validation = [
                        'mimes:' . $mimes,
                        'max:' . $max_size,

                    ];

                }

                $validator = \Validator::make($request->all(), [

                    $key_name => $validation,
                ]);
                if ($validator->fails()) {
                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];
                    return $res;
                } else {

                    $name = $name;

                    if ($settings['storage_setting'] == 'local') {
                        $request->$key_name->move(storage_path($path), $name);
                        $path = $path . $name;

                    } else if ($settings['storage_setting'] == 'wasabi') {

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );

                        // $path = $path.$name;
                    } else if ($settings['storage_setting'] == 's3') {

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                    }

                    $res = [
                        'flag' => 1,
                        'msg' => 'success',
                        'url' => $path,
                    ];
                    return $res;
                }

            } else {
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }

        } catch (\Exception $e) {
            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }


    
    public static function attribute_upload_file($request, $key_name, $name, $path, $custom_validation = [])
    {
        try {
            $settings = Utility::getStorageSetting();

            if (!empty($settings['storage_setting'])) {

                if ($settings['storage_setting'] == 'wasabi') {

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com',
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
                    $mimes = !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';

                } else if ($settings['storage_setting'] == 's3') {
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
                    $mimes = !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';

                } else {
                    $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

                    $mimes = !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
                }

                $file = $request;

                if (count($custom_validation) > 0) {
                    $validation = $custom_validation;
                } else {

                    $validation = [
                        'mimes:' . $mimes,
                        'max:' . $max_size,

                    ];

                }

                $validator = \Validator::make($request, [

                    $key_name => $validation,
                ]);
                if ($validator->fails()) {
                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];
                    return $res;
                } else {

                    $name = $name;

                    if ($settings['storage_setting'] == 'local') {
                        $request->$key_name->move(storage_path($path), $name);
                        $path = $path . $name;

                    } else if ($settings['storage_setting'] == 'wasabi') {

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );

                        // $path = $path.$name;
                    } else if ($settings['storage_setting'] == 's3') {

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                    }

                    $res = [
                        'flag' => 1,
                        'msg' => 'success',
                        'url' => $path,
                    ];
                    return $res;
                }

            } else {
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }

        } catch (\Exception $e) {
            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }


    public static function keyWiseUpload_file($request, $key_name, $name, $path, $data_key, $custom_validation = []): array
    {

        $multifile = [
            $key_name => $request->file($key_name)[$data_key][$key_name],
        ];


        try {
            $settings = Utility::getStorageSetting();


            if (!empty($settings['storage_setting'])) {

                if ($settings['storage_setting'] == 'wasabi') {

                    config(
                        [
                            'filesystems.disks.wasabi.key' => $settings['wasabi_key'],
                            'filesystems.disks.wasabi.secret' => $settings['wasabi_secret'],
                            'filesystems.disks.wasabi.region' => $settings['wasabi_region'],
                            'filesystems.disks.wasabi.bucket' => $settings['wasabi_bucket'],
                            'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $settings['wasabi_region'] . '.wasabisys.com'
                        ]
                    );

                    $max_size = !empty($settings['wasabi_max_upload_size']) ? $settings['wasabi_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['wasabi_storage_validation']) ? $settings['wasabi_storage_validation'] : '';
                } else if ($settings['storage_setting'] == 's3') {
                    config(
                        [
                            'filesystems.disks.s3.key' => $settings['s3_key'],
                            'filesystems.disks.s3.secret' => $settings['s3_secret'],
                            'filesystems.disks.s3.region' => $settings['s3_region'],
                            'filesystems.disks.s3.bucket' => $settings['s3_bucket'],
                            'filesystems.disks.s3.use_path_style_endpoint' => false,
                        ]
                    );
                    $max_size = !empty($settings['s3_max_upload_size']) ? $settings['s3_max_upload_size'] : '2048';
                    $mimes =  !empty($settings['s3_storage_validation']) ? $settings['s3_storage_validation'] : '';
                } else {
                    $max_size = !empty($settings['local_storage_max_upload_size']) ? $settings['local_storage_max_upload_size'] : '2048';

                    $mimes =  !empty($settings['local_storage_validation']) ? $settings['local_storage_validation'] : '';
                }


                $file = $request->$key_name;


                if (count($custom_validation) > 0) {
                    $validation = $custom_validation;
                } else {

                    $validation = [
                        'mimes:' . $mimes,
                        'max:' . $max_size,
                    ];
                }

                $validator = \Validator::make($multifile, [
                    $key_name => $validation
                ]);


                if ($validator->fails()) {
                    $res = [
                        'flag' => 0,
                        'msg' => $validator->messages()->first(),
                    ];
                    return $res;
                } else {

                    $name = $name;

                    if ($settings['storage_setting'] == 'local') {

                        $request->file($key_name)[$data_key][$key_name]->move(storage_path($path), $name);

                        $path = $name;
                    } else if ($settings['storage_setting'] == 'wasabi') {

                        $path = \Storage::disk('wasabi')->putFileAs(
                            $path,
                            $file,
                            $name
                        );

                        // $path = $path.$name;

                    } else if ($settings['storage_setting'] == 's3') {

                        $path = \Storage::disk('s3')->putFileAs(
                            $path,
                            $file,
                            $name
                        );
                    }


                    $res = [
                        'flag' => 1,
                        'msg'  => 'success',
                        'url'  => $path
                    ];
                    return $res;
                }
            } else {
                $res = [
                    'flag' => 0,
                    'msg' => __('Please set proper configuration for storage.'),
                ];
                return $res;
            }
        } catch (\Exception $e) {
            $res = [
                'flag' => 0,
                'msg' => $e->getMessage(),
            ];
            return $res;
        }
    }

    public static function get_file($path)
    {
        $storageSetting = Utility::StorageSettings();
        try {
            if ($storageSetting['storage_setting'] == 'wasabi') {
                config(
                    [
                        'filesystems.disks.wasabi.key' => $storageSetting['wasabi_key'],
                        'filesystems.disks.wasabi.secret' => $storageSetting['wasabi_secret'],
                        'filesystems.disks.wasabi.region' => $storageSetting['wasabi_region'],
                        'filesystems.disks.wasabi.bucket' => $storageSetting['wasabi_bucket'],
                        'filesystems.disks.wasabi.endpoint' => 'https://s3.' . $storageSetting['wasabi_region'] . '.wasabisys.com',
                    ]
                );

                return \Storage::disk($storageSetting['storage_setting'])->url($path);

            } elseif ($storageSetting['storage_setting'] == 's3') {
                config(
                    [
                        'filesystems.disks.s3.key' => $storageSetting['s3_key'],
                        'filesystems.disks.s3.secret' => $storageSetting['s3_secret'],
                        'filesystems.disks.s3.region' => $storageSetting['s3_region'],
                        'filesystems.disks.s3.bucket' => $storageSetting['s3_bucket'],
                        'filesystems.disks.s3.use_path_style_endpoint' => false,
                    ]
                );
                return \Storage::disk($storageSetting['storage_setting'])->url($path);
            }
            return url('/').\Storage::disk($storageSetting['storage_setting'])->url($path);
        } catch (\Throwable $th) {
            return '';
        }
    }

    public static function getStorageSetting()
    {

        $data = DB::table('settings');
        $data = $data->where('created_by', '=', 1);
        $data = $data->get();
        $settings = [
            "storage_setting" => "local",
            "local_storage_validation" => "jpg,jpeg,png",
            "local_storage_max_upload_size" => "",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url" => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
        ];

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }

        return $settings;
    }


    public static function StorageSettings()
    {
        if (is_null(self::$storageSetting)) {
            $data = DB::table('settings');

            $data->where('created_by', '=', 1);
            self::$storageSetting = $data->get();
        }
        $data = self::$storageSetting;
        $settings = [
            "site_currency" => "USD",
            "site_currency_symbol" => "$",
            "currency_symbol_position" => "pre",
            "logo_dark" => "logo-dark.png",
            "logo_light" => "logo-light.png",
            "currency_symbol" => "",
            "currency" => "",
            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",
            "invoice_prefix" => "#INV",
            "invoice_color" => "ffffff",
            "quote_template" => "template1",
            "quote_color" => "ffffff",
            "salesorder_template" => "template1",
            "salesorder_color" => "ffffff",
            "proposal_prefix" => "#PROP",
            "proposal_color" => "fffff",
            "bill_prefix" => "#BILL",
            "bill_color" => "fffff",
            "quote_prefix" => "#QUO",
            "salesorder_prefix" => "#SOP",
            "vender_prefix" => "#VEND",
            "footer_title" => "",
            "footer_notes" => "",
            "invoice_template" => "template1",
            "bill_template" => "template1",
            "proposal_template" => "template1",
            "default_language" => "en",
            "decimal_number" => "2",
            "tax_type" => "VAT",
            "shipping_display" => "on",
            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "display_landing_page" => "on",
            "title_text" => "",
            "footer_text" => "",
            "company_logo_light" => "logo-light.png",
            "company_logo_dark" => "logo-dark.png",
            "company_favicon" => "",
            "gdpr_cookie" => "",
            "cookie_text" => "",
            "signup_button" => "on",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "color" => "theme-3",
            "SITE_RTL" => "off",
            "is_checkout_login_required" => "on",
            "storage_setting" => "local",
            "local_storage_validation" => "jpg,jpeg,png,xlsx,xls,csv,pdf",
            "local_storage_max_upload_size" => "2048000",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url" => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
            'mail_driver'=>'',
            'mail_host'=>'',
            'mail_port'=>'',
            'mail_username'=>'',
            'mail_password'=>'',
            'mail_encryption'=>'',
            'mail_from_name'=>'',
            'mail_from_address'=>'',
        ];

        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }


        return $settings;
    }
    public static function GetCacheSize()
    {
        $file_size = 0;
        foreach (\File::allFiles(storage_path('/framework')) as $file)
        {
            $file_size += $file->getSize();
        }
        $file_size = number_format($file_size / 1000000, 4);
        return $file_size;
    }
    public static function get_device_type($user_agent) {
        $mobile_regex = '/(?:phone|windows\s+phone|ipod|blackberry|(?:android|bb\d+|meego|silk|googlebot) .+? mobile|palm|windows\s+ce|opera mini|avantgo|mobilesafari|docomo)/i';
        $tablet_regex = '/(?:ipad|playbook|(?:android|bb\d+|meego|silk)(?! .+? mobile))/i';

        if(preg_match_all($mobile_regex, $user_agent)) {
            return 'mobile';
        } else {

            if(preg_match_all($tablet_regex, $user_agent)) {
                return 'tablet';
            } else {
                return 'desktop';
            }

        }
    }



    public static function deleteFile($file_path): bool
    {
        $files =  \File::glob(storage_path($file_path));


        $status = false;
        foreach($files as $key => $file)
        {
            if (\File::exists($file)) {
                \File::delete($file);
            }
        }
        return true;
    }
    public static function flagOfCountry(){
        $arr = [
            'ar' => '🇦🇪 ar',
            "zh" => "🇨🇳 zh",
            'da' => '🇩🇰 ad',
           'de' => '🇩🇪 de',
            'es' => '🇪🇸 es',
            'fr' => '🇫🇷 fr',
           'it'	=>  '🇮🇹 it',
            'ja' => '🇯🇵 ja',
            'he' => '🇮🇱 he',
            'nl' => '🇳🇱 nl',
            'pl'=> '🇵🇱 pl',
            'ru' => '🇷🇺 ru',
            'pt' => '🇵🇹 pt',
            'en' => '🇮🇳 en',
            'tr' => '🇹🇷 tr',
            'pt-br' => '🇧🇷 pt-br',
        ];
        return $arr;
    }
    public static function langList(){
        $languages = [
            "ar" => "Arabic",
            "zh" => "Chinese",
            "da" => "Danish",
            "de" => "German",
            "en" => "English",
            "es" => "Spanish",
            "fr" => "French",
            "he" => "Hebrew",
            "it" => "Italian",
            "ja" => "Japanese",
            "nl" => "Dutch",
            "pl" => "Polish",
            "pt" => "Portuguese",
            "ru" => "Russian",
            "tr" => "Turkish",
            "pt-br"=>"Portuguese(Brazil)"
        ];
        return $languages;
    }
    public static function languagecreate(){
        $languages=Utility::langList();
        foreach($languages as $key => $lang)
        {
            $languageExist = Languages::where('code',$key)->first();
            if(empty($languageExist))
            {
                $language = new Languages();
                $language->code = $key;
                $language->fullName = $lang;
                $language->save();
            }
        }
    }
    public static function langSetting(){
        if (is_null(self::$settings)) {
            self::$settings = Utility::StorageSettings();
        }

        return self::$settings;
    }


    public static function settingsById($id)
    {
        $data     = DB::table('settings');
        $data     = $data->where('created_by', '=', $id);
        $data     = $data->get();
        $settings = [

            "logo_dark" => "logo-dark.png",
            "logo_light" => "logo-light.png",

            "site_date_format" => "M j, Y",
            "site_time_format" => "g:i A",
            "company_name" => "",
            "company_address" => "",
            "company_city" => "",
            "company_state" => "",
            "company_zipcode" => "",
            "company_country" => "",
            "company_telephone" => "",
            "company_email" => "",
            "company_email_from_name" => "",


            "footer_title" => "",
            "footer_notes" => "",

            "default_language" => "en",
            "decimal_number" => "2",

            "footer_link_1" => "Support",
            "footer_value_1" => "#",
            "footer_link_2" => "Terms",
            "footer_value_2" => "#",
            "footer_link_3" => "Privacy",
            "footer_value_3" => "#",
            "title_text" => "",
            "footer_text" => "",
            "company_logo_light" => "logo-light.png",
            "company_logo_dark" => "logo-dark.png",
            "company_favicon" => "",
            "gdpr_cookie" => "",
            "cookie_text" => "",
            "signup_button" => "on",
            "email_verification" => "on",
            "cust_theme_bg" => "on",
            "cust_darklayout" => "off",
            "color" => "theme-6",
            "map" => "",

            "SITE_RTL" => "off",
            "is_checkout_login_required" => "on",
            "storage_setting" => "local",
            "local_storage_validation" => "jpg,jpeg,png,xlsx,xls,csv,pdf",
            "local_storage_max_upload_size" => "2048000",
            "s3_key" => "",
            "s3_secret" => "",
            "s3_region" => "",
            "s3_bucket" => "",
            "s3_url" => "",
            "s3_endpoint" => "",
            "s3_max_upload_size" => "",
            "s3_storage_validation" => "",
            "wasabi_key" => "",
            "wasabi_secret" => "",
            "wasabi_region" => "",
            "wasabi_bucket" => "",
            "wasabi_url" => "",
            "wasabi_root" => "",
            "wasabi_max_upload_size" => "",
            "wasabi_storage_validation" => "",
            'disable_lang'=>'',
            'mail_driver'=>'',
            'mail_host'=>'',
            'mail_port'=>'',
            'mail_username'=>'',
            'mail_password'=>'',
            'mail_encryption'=>'',
            'mail_from_name'=>'',
            'mail_from_address'=>'',
        ];
        foreach ($data as $row) {
            $settings[$row->name] = $row->value;
        }
        return $settings;
    }

    public static function getSMTPDetails($user_id)
    {
        $settings = Utility::StorageSettings();
        if ($settings) {
            config([
                'mail.default'                   => isset($settings['mail_driver'])       ? $settings['mail_driver']       : '',
                'mail.mailers.smtp.host'         => isset($settings['mail_host'])         ? $settings['mail_host']         : '',
                'mail.mailers.smtp.port'         => isset($settings['mail_port'])         ? $settings['mail_port']         : '',
                'mail.mailers.smtp.encryption'   => isset($settings['mail_encryption'])   ? $settings['mail_encryption']   : '',
                'mail.mailers.smtp.username'     => isset($settings['mail_username'])     ? $settings['mail_username']     : '',
                'mail.mailers.smtp.password'     => isset($settings['mail_password'])     ? $settings['mail_password']     : '',
                'mail.from.address'              => isset($settings['mail_from_address']) ? $settings['mail_from_address'] : '',
                'mail.from.name'                 => isset($settings['mail_from_name'])    ? $settings['mail_from_name']    : '',
            ]);

            return $settings;
        } else {
            return redirect()->back()->with('Email SMTP settings does not configured so please contact to your site admin.');
        }
    }


    public static function emailTemplateLang($lang)
    {
        $defaultTemplate = [
            'Order Created' => [
                'subject' => 'Order Complete',
                'lang' => [
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Hi, {order_name}, Thank you for Shopping</p><p>We received your purchase request, we\'ll be in touch shortly!</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                ],
            ],
            'Status Change' => [
                'subject' => 'Order Status',
                'lang' => [
                    'en' => '<p>Hello,&nbsp;</p><p>Welcome to {app_name}.</p><p>Your Order is {order_status}!</p><p>Hi {order_name}, Thank you for Shopping</p><p>Thanks,</p><p>{app_name}</p><p>{order_url}</p>',
                ],
            ],

            'Order Created For Owner' => [
                'subject' => 'Order Detail',
                'lang' => [
                    'en' => '<p>Hello,&nbsp;</p><p>Dear {owner_name}.</p><p>This is Confirmation Order {order_id} place on&nbsp;<span style=\"font-size: 1rem;\">{order_date}.</span></p><p>Thanks,</p><p>{order_url}</p>',

                ],
            ],

            'Owner And Store Created' => [
                'subject' => 'Owner And Store Detail',
                'lang' => [
                    'en' => '<p>Hello,<b> {owner_name} </b>!</p> <p>Welcome to our app yore login detail for <b> {app_name}</b> is <br></p> <p><b>Email   : </b>{owner_email}</p> <p><b>Password   : </b>{owner_password}</p> <p><b>App url    : </b>{app_url}</p> <p><b>Store url    : </b>{store_url}</p> <p>Thank you for connecting with us,</p> <p>{app_name}</p>',

                ],
            ],

        ];
        $email = EmailTemplate::all();
        foreach ($email as $e) {
            foreach ($defaultTemplate[$e->name]['lang'] as  $content) {
                $emailNoti = EmailTemplateLang::where('parent_id', $e->id)->where('lang', $lang)->count();
                if ($emailNoti == 0) {
                    EmailTemplateLang::create(
                        [
                           'parent_id' => $e->id,
                           'lang' => $lang,
                           'subject' => $defaultTemplate[$e->name]['subject'],
                           'content' => $content,
                        ]
                    );
                }
            }
        }
    }


}
