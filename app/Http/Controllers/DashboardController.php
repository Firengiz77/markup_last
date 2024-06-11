<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use App\Models\PlanOrder;
use App\Models\Product;
use App\Models\Store;
use App\Models\User;
use App\Models\UserStore;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Constraint\Count;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Stripe;
use File;

class DashboardController extends Controller
{
    use \RachidLaasri\LaravelInstaller\Helpers\MigrationsHelper;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['XSS']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        $uri = url()->full();
        $segments = explode('/', str_replace(''.url('').'', '', $uri));
        $segments = $segments[1] ?? null;


        if (\Auth::check()) {
                if (\Auth::user()->type == 1) {

                    $user = \Auth::user();


                    return view('home', compact('user',));
                } else {


                    return view('home');
                }

        } else {


        }

    }


    public function profile()
    {
        $userDetail = \Auth::user();

        return view('profile', compact('userDetail'));
    }

    public function editprofile(Request $request)
    {
        $userDetail = \Auth::user();

        $user = User::findOrFail($userDetail['id']);
        $this->validate(
            $request, [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users,email,' . $userDetail['id'],
                'profile' => 'mimes:jpeg,png,jpg,gif,svg,pdf,doc|max:20480',
            ]
        );

        if($request->hasFile('profile'))
        {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename        = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension       = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $dir        = 'uploads/profile';

            $image_path = $dir . $userDetail['avatar'];
            if(File::exists($image_path))
            {
                File::delete($image_path);
            }

            $path = Utility::upload_file($request,'profile',$fileNameToStore,$dir,[]);

            if($path['flag'] == 1){
                $url = $path['url'];
            }else{
                return redirect()->back()->with('error', __($path['msg']));
            }


        }

        if (!empty($request->profile)) {
            $user['avatar'] = $fileNameToStore;
        }

        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user->save();

        return redirect()->back()->with('success', __('Profile successfully updated.'));
    }

    public function updatePassword(Request $request)
    {
        if (\Auth::Check()) {
            $request->validate(
                [
                    'current_password' => 'required',
                    'new_password' => 'required|min:6',
                    'confirm_password' => 'required|same:new_password',
                ]
            );
            $objUser = \Auth::user();
            $request_data = $request->All();
            $current_password = $objUser->password;
            if (Hash::check($request_data['current_password'], $current_password)) {
                $user_id = \Auth::User()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['new_password']);
                $obj_user->save();

                return redirect()->route('profile', $objUser->id)->with('success', __('Password successfully updated.'));
            } else {
                return redirect()->route('profile', $objUser->id)->with('error', __('Please enter correct current password.'));
            }
        } else {
            return redirect()->route('profile', \Auth::user()->id)->with('error', __('Something is wrong.'));
        }
    }

    public function changeMode()
    {
        $usr = Auth::user();
        if ($usr->mode == 'light') {
            $usr->mode = 'dark';
        } else {
            $usr->mode = 'light';
        }
        $usr->save();

        return redirect()->back();
    }



}
