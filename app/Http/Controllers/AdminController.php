<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminController extends Controller
{
    function __construct()
    {
        $this->middleware('role_or_permission:user.list|user.create|user.edit|user.delete', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:user.list', ['only' => ['index','show']]);
        $this->middleware('role_or_permission:user.add', ['only' => ['create','store']]);
        $this->middleware('role_or_permission:user.edit', ['only' => ['edit','update']]);
        $this->middleware('role_or_permission:user.delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::with('attendance')->get();
        $roles = Role::all();
        return view('admin.employees.index',compact('users','roles'));
    }

    public function user_api(){
        return response()->json([
            "status" => 200,
            "data" => "Testing Data"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Role::all();
        return view('admin.employees.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'New User Created Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }

    public function user_edit(string $id){
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.employees.edit',compact('user','roles'));
    }
    public function user_update(Request $request, string $id){
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if($request->hasFile('image')){
            $img = $request->file('image');
            $imgext = $img->getClientOriginalExtension();
            $imgname = time().'-user-profile.'.$imgext;
            $img->move(public_path('backend/user_profile/'),$imgname);
            $user->image = "backend/user_profile/".$imgname;
        }
        $user->update();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.user')->with($notification);
    }
    public function user_destroy(string $id){
        $user = User::findOrFail($id);
        if (!is_null($user)) {
            $user->delete();
        }

        $notification = array(
            'message' => 'User Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function profile(string $id)
    {
        //
        $user = User::findOrFail($id);

        return view('admin.profile.user-info',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;

        if($request->hasFile('image')){
            $img = $request->file('image');
            $imgext = $img->getClientOriginalExtension();
            $imgname = time().'-user-profile.'.$imgext;
            $img->move(public_path('backend/user_profile/'),$imgname);
            $user->image = "backend/user_profile/".$imgname;
        }

        $user->update();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'User Information Updated Successfully...!!!!!!'
        );

        return redirect()->back()->with($notification);
    }

    public function password_change(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile.password-update', compact('user'));
    }

    public function password_update(Request $request, string $id)
    {
        $request->validate([
            'confim_password' => 'same:newpassword'
        ]);
        $user = User::findOrFail($id);
        if(!Hash::check($request->oldpassword, $user->password)){
            $notification = array(
                'alert-type' => 'error',
                'message' => 'Old Password Does not Match....!'
            );
        }else if(!empty($request->newpassword) && Hash::check($request->oldpassword, $user->password)){
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->newpassword)
            ]);
            $notification = array(
                'alert-type' => 'success',
                'message' => 'Password Changed Successfully...!!!'
            );
        }

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        //
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'alert-type' => 'success',
            'message' => 'Successfully Log Out...!!!!!!'
        );

        return redirect('/login')->with($notification);
    }
}
