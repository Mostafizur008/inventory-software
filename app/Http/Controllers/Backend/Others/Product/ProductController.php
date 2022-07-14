<?php

namespace App\Http\Controllers\Backend\Others\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Others\Unit\Unit;
use App\Models\Others\Category\Category;
use App\Models\Others\Suppliers\Suppliers;
use App\Models\Others\Product\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function ProductView()
    {
       $allData = Product::all();
       return view('backend.main-section.page.others.product.view',compact('allData'));
    }

    public function AddView()
    {
       $data ['product'] = Product::all();
       $data ['supply']  = Suppliers::all();
       $data ['unit']  = Unit::all();
       $data ['cat'] = Category::all();
       return view('backend.main-section.page.others.product.add',$data);
    }

    public function Store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'supplier_id' => 'required',
            'unit_id' => 'required',
            'category_id' => 'required',
        ]);
        $data = new Product();
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->supplier_id = $request->supplier_id;

        if($request->file('image'))
        {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/all-images/others/product/'),$filename);
            $data['image'] = $filename;
        }

        $data->save();

        return redirect()->route('product.view');
    }

    public function ProEdit($id)
    {
        $data ['editData'] = Product::find($id);
        $data ['supply']  = Suppliers::all();
        $data ['unit']  = Unit::all();
        $data ['cat'] = Category::all();
        return view('backend.main-section.page.others.product.edit',$data);
    }

    public function ProUpdate(Request $request,$id)
    {
        $data = Product::find($id);
        $data->name = $request->name;
        $data->unit_id = $request->unit_id;
        $data->category_id = $request->category_id;
        $data->supplier_id = $request->supplier_id;
        if($request->file('image'))
        {
            $file = $request->file('image');
            @unlink(public_path('backend/all-images/others/product/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('backend/all-images/others/product/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Product Update Successfully',
            'alert-type' => 'info'
        );
        return redirect()->route('product.view')->with($notification);
    }

    public function destroy($id)
    {
        $all = Product::find($id);
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
