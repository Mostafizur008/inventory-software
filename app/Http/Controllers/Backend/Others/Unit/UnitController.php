<?php

namespace App\Http\Controllers\Backend\Others\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{
    public function UnitView()
    {
       $allData = Unit::all();
       return view('backend.main-section.page.others.unit.view',compact('allData'));
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
            'name'=>'required|max:191',
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
            $data = new Unit();
            $data->name = $request->input('name');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'Unit Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $unit = Unit::find($id);
        if($unit)
        {
            return response()->json([
                'status'=>200,
                'unit'=> $unit,
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Unit Found.'
            ]);
        }

    }

    public function update(Request $request, $id)
    {
       
        $validator = Validator::make($request->all(), [
            'name'=>'required|max:191',
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
            $unit = Unit::find($id);
            if($unit)
            {
            $unit->name = $request->input('name');
            $unit->update();
            return response()->json([
                'status'=>200,
                'message'=>'Unit Edit Successfully.'
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
        $all = Unit::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Unit Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Unit Found.'
            ]);
        }
    }
}

