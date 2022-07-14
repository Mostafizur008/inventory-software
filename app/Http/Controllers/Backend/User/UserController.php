<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function UserView()
    {
        $allData = User::all();
        return view('backend.main-section.page.user.user_view',compact('allData'));
    }

    public function UserAdd()
    {
        return view('backend.main-section.page.user.user_add');
    }

    public function UserStore(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'role' => 'required',
        ]);
        $data = new User();
        $code = rand(0000,9999);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->name = $request->name;
        $data->gender = $request->gender;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->password = bcrypt($code);
        $data->code = $code;
        $data->role = $request->role;

        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/img/user/'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        return redirect()->route('user.view');
    }

    //-------------------------------------------Ajax----------------------------------------------

 
    public function fetchuser()
    {
        $all = User::all();
        return response()->json([
            'users'=>$all,
        ]);
    }

    public function Store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=>'required|max:191',
            'name'=>'required|max:191',
            'gender'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
            'role' => 'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $data = new User();
            $code = rand(0000,9999);
            $data->first_name = $request->input('first_name');
            $data->last_name = $request->input('last_name');
            $data->name = $request->input('name');
            $data->gender = $request->input('gender');
            $data->mobile = $request->input('mobile');
            $data->email = $request->input('email');
            $data->password = bcrypt($code);
            $data->code = $code;
            $data->role = $request->input('role');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'User Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);
        if($user)
        {
            return response()->json([
                'status'=>200,
                'user'=> $user,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No User Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'first_name'=> 'required|max:191',
            'last_name'=>'required|max:191',
            'name'=>'required|max:191',
            'gender'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
            'role'=>'required',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=>400,
                'errors'=>$validator->messages()
            ]);
        }
        else
        {
            $user = User::find($id);
            if($user)
            {
            $user->first_name = $request->input('first_name');
            $user->last_name = $request->input('last_name');
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->mobile = $request->input('mobile');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->update();
            return response()->json([
                'status'=>200,
                'message'=>'User Edit Successfully.'
            ]);

            }
            else
            {
                return response()->json([
                    'status'=>404,
                    'message'=>'No User Found.'
                ]);
            }
        }


    }


    public function destroy($id)
    {
        $all = User::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Student Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Student Found.'
            ]);
        }
    }
}
