<?php

namespace App\Http\Controllers\Backend\Others\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Category\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function CatView()
    {
       $allData = Category::all();
       return view('backend.main-section.page.others.category.view',compact('allData'));
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
            $data = new Category();
            $data->name = $request->input('name');
            $data->save();
            return response()->json([
                'status'=>200,
                'message'=>'Category Added Successfully.'
            ]);
        }

    }

    public function edit($id)
    {
        $category = Category::find($id);
        if($category)
        {
            return response()->json([
                'status'=>200,
                'category'=> $category,
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
            $category = Category::find($id);
            if($category)
            {
            $category->name = $request->input('name');
            $category->update();
            return response()->json([
                'status'=>200,
                'message'=>'Category Edit Successfully.'
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
        $all = Category::find($id);
        if($all)
        {
            $all->delete();
            return response()->json([
                'status'=>200,
                'message'=>'Category Deleted Successfully.'
            ]);
        }
        else
        {
            return response()->json([
                'status'=>404,
                'message'=>'No Category Found.'
            ]);
        }
    }
}
