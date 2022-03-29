<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function AllCat()
    {
        $categories = Category::latest()->paginate(5); 
        $trachCat = Category::onlyTrashed()->latest()->paginate(3);
        return view('admin.category.index',compact('categories','trachCat'));
    }

    public function AddCat(Request $request)
    {
        $validated = $request->validate([   
            'title' => 'required|unique:categories,title',
        ],
        [
            'title.required'=> 'Please Input Category Name',
        ]
        );
        $Category = new Category();
        $Category->title = $request->title;
        $Category->save();
        return Redirect()->back()->with('success','Category Inserted Successfull');
    }

    public function Pdelete($id){
        $delete = Category::find($id)->delete();
        $delete = Product::where("category_id",$id)->delete();
        return Redirect()->back()->with('success','Category soft deleted Successfull');

    }

    public function Edit($id){
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }

    public function Update(Request $request, $id){
        $validated = $request->validate([
            'title' => 'required|unique:categories,title',
        ],
        [
            'title.required'=> 'Please Input Category Name',
        ]
        );
        $data = array();
        $data['title'] = $request->title;
        DB::table('categories')->where('id',$id)->update($data);
        return Redirect()->route('all.category')->with('success','Category Updated Successfull');
    }
}
