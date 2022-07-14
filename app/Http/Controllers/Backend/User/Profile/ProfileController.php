<?php

namespace App\Http\Controllers\Backend\User\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\user;
use Auth;
use DB;

class ProfileController extends Controller
{
    public function AdminProfile()
    {

        $id = Auth::user()->id;
        $user = User::find($id);
        return view('backend.main-section.page.user.profile.user_profile',compact('user'));
    }

    public function AdminProfileEdit()
    {
        $id = Auth::user()->id;
        $user= User::find($id); 
        return view('backend.page.user.profile.user_profile',compact('user'));
    }

    public function AdminStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->blood = $request->blood;
        $data->email = $request->email;

        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('backend/all-images/database/user/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/all-images/database/user/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('profile.view')->with($notification);
     }


     public function ChPassword()
     {
         return view('backend.main-section.page.user.profile.change_password.change_password');
        }
        
        public function ChPasswordUpdate(Request $request)
        {
            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required | Confirmed',
            ]);
            
            $hashedPassword = Auth::user()->password;
             if(Hash::check($request->oldpassword,$hashedPassword))
             {
                 $user = User::find(Auth::user()->id);
                 $user->password = Hash::make($request->password);
                  $user->save();
                  Auth::logout();

                  $notification = array(
                    'message' => 'Change Password Successfully',
                    'alert-type' => 'info'
                );

                  return redirect()->route('login')->with($notification);
                 }else{
                     return redirect()->back();
                    }
                } 
}
