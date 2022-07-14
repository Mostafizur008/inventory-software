<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting\Setting;
use DB;

class SettingController extends Controller
{
    public function SettingView()
    {
        return view('backend.main-section.page.setting.add')->with('settings',Setting::first());
    }


    public function SettingUpdate(Request $request)
    {
            $settings = Setting::first();
            $settings->title = $request->title;
            $settings->sortname = $request->sortname;
            $settings->link = $request->link;
            $settings->description = $request->description;
            $settings->contract = $request->contract;
            $settings->contract2 = $request->contract2;
            $settings->address = $request->address;
            $settings->email = $request->email;
            
            if($request->file('image')){
                $file= $request->file('image');
                @unlink(public_path('backend/all-images/web/logo/'.$settings->image));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/logo/'), $filename);
                $settings['image']= $filename;
            }

            if($request->file('photo')){
                $file= $request->file('photo');
                @unlink(public_path('backend/all-images/web/logo/icon/'.$settings->image));
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('backend/all-images/web/logo/icon/'), $filename);
                $settings['photo']= $filename;
            }

            $settings->save();

        return redirect()->route('setting.view');
    }


}
