<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\Utility;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Lab404\Impersonate\Impersonate;
use App\Models\Store;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



            $users = User::where('created_by','=',\Auth::user()->creatorId())->get();
            return view('users.index',compact('users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            $user  = \Auth::user();
            $roles = Role::all()->pluck('name', 'id');
            return view('users.create',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = \Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'email' => ['required',
                    Rule::unique('users')->where(function ($query) {
                        return $query->where('created_by', \Auth::user()->creatorId());
                    })
                    ],
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $default_language = DB::table('settings')->select('value')->where('name', 'default_language')->first();
            $objUser    = \Auth::user()->creatorId();
            $objUser = User::find($objUser);
            $date = date("Y-m-d H:i:s");
            // $total_users = \Auth::user()->countUsers();
                $user =  new User();
                $user->name =  $request['name'];
                $user->email =  $request['email'];
                $user->password = !empty($request['password_switch']) && $request['password_switch'] == 'on' ? Hash::make($request['password']) : null;
                $user->type = 1;
                $user->lang = \Auth::user()->lang ?? 'en';
                $user->created_by = \Auth::user()->creatorId();
                $user->email_verified_at = $date;
                $user->is_enable_login      = !empty($request['password_switch']) && $request['password_switch'] == 'on' ? 1 : 0;
                $user->save();




            return redirect()->route('users.index')->with('success', __('User successfully created.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $user  = User::find($id);
            $roles = Role::all()->pluck('name', 'id');
            return view('users.edit', compact('user', 'roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
            $validator = \Validator::make(
                // $request->all(),
                // [
                //     'name' => 'required',
                //     'email' => ['required|unique:users,email,' . $id,
                //         Rule::unique('users')->where(function ($query)  use ($user) {
                //             return $query->whereNotIn('id',[$user->id])->where('created_by',  \Auth::user()->creatorId())->where('current_store', \Auth::user()->current_store);
                //         })
                //     ],

                // ]
                $request->all(),
                [
                    'name' => 'required',
                    'email' => ['required',
                                Rule::unique('users')->where(function ($query)  use ($user) {
                                return $query->whereNotIn('id',[$user->id])->where('created_by',  \Auth::user()->creatorId());
                            })
                    ],
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $role          = Role::findById($request->role);
            $input         = $request->all();
            $input['type'] = $role->name;
            $user->fill($input)->save();

            $user->assignRole($role);
            $roles[] = $request->role;
            $user->roles()->sync($roles);
            return redirect()->route('users.index')->with('success', 'User successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('users.index')->with('success', 'User successfully deleted.');

    }
    public function reset($id){
            $Id        = \Crypt::decrypt($id);

            $user = User::find($Id);

            $employee = User::where('id', $Id)->first();

            return view('users.reset', compact('user', 'employee'));

    }
    public function updatePassword(Request $request, $id){
            $validator = \Validator::make(
                $request->all(),
                [
                    'password' => 'required|confirmed|same:password_confirmation',
                ]
            );

            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

            $user                 = User::where('id', $id)->first();
            if (isset($request->login_enable) && $request->login_enable == true) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'is_enable_login' => 1,
                ])->save();

                return redirect()->route('users.index')->with(
                    'success',
                    'User login enable successfully.'
                );
            } else {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                ])->save();

                return redirect()->route('users.index')->with(
                    'success',
                    'User Password successfully updated.'
                );
            }

    }

    public function LoginWithOwner(Request $request, User $user, $id)
    {
        $user = User::find($id);
        if ($user->is_enable_login != 0 && $user->password != null) {
            if ($user && auth()->check()) {
                Impersonate::take($request->user(), $user);
                return redirect('/admin/dashboard');
            }
        } else {
            return redirect()->back()->with('error', __('Owner account has been deactivated.'));
        }
    }

    public function ExitOwner(Request $request)
    {
        \Auth::user()->leaveImpersonation($request->user());
        return redirect('/admin/dashboard');
    }

    public function OwnerInfo($id)
	    {
		if(!empty($id)){
		    $data = $this->Counter($id);
		    if($data['is_success']){
		        $users_data = $data['response']['users_data'];
		        $store_data = $data['response']['store_data'];
		        return view('admin_store.ownerinfo', compact('id','users_data','store_data'));
		    }
		}
		else
		{
		    return redirect()->back()->with('error', __('Permission denied.'));
		}
    }





}
