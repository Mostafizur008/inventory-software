<?php

namespace App\Http\Controllers\Backend\Others\Suppliers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Suppliers\Suppliers;
use Illuminate\Support\Facades\Validator;

class SuppliersController extends Controller
{
    public function SuppliersView()
    {
       $allData = Suppliers::all();
       return view('backend.main-section.page.others.suppliers.view',compact('allData'));
    }

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
            'staff_name'=>'required|max:191',
            'id_no'=>'required|max:191',
            'name'=>'required|max:191',
            'address'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
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
            $data = new Suppliers();
            $data->staff_name = $request->input('staff_name');
            $data->name = $request->input('name');
            $data->id_no = $request->input('id_no');
            $data->address = $request->input('address');
            $data->mobile = $request->input('mobile');
            $data->email = $request->input('email');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'Suppliers Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $suppliers = Suppliers::find($id);
        if($suppliers)
        {
            return response()->json([
                'status'=>200,
                'suppliers'=> $suppliers,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Suppliers Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'staff_name'=>'required|max:191',
            'id_no'=>'required|max:191',
            'name'=>'required|max:191',
            'address'=>'required',
            'mobile'=>'required|max:191',
            'email'=>'required|email|max:191',
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
            $suppliers = Suppliers::find($id);
            if($suppliers)
            {
            $suppliers->staff_name = $request->input('staff_name');
            $suppliers->name = $request->input('name');
            $suppliers->id_no = $request->input('id_no');
            $suppliers->address = $request->input('address');
            $suppliers->mobile = $request->input('mobile');
            $suppliers->email = $request->input('email');
            $suppliers->update();
            return response()->json([
                'status'=>200,
                'message'=>'Suppliers Edit Successfully.'
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
        $all = Suppliers::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Suppliers Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Suppliers Found.'
            ]);
        }
    }
}
