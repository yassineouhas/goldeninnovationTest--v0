<?php

namespace App\Http\Controllers;

use App\Mail\deleteProductEmail;
use App\Mail\joutProductEmail;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $categories = Category::all();
        $products = Product::latest()->paginate(5); 
        $trachCat = Product::onlyTrashed()->latest()->paginate(3);
        return view('admin.product.index',compact('products','trachCat','categories'));
    }

    public function AddProduct(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|unique:products,title',
            'description' => 'required',
            'category_id' => 'required',
        ],
        [
            'title.required'=> 'Please Input Product Name',
            'description.required'=> 'Please Input Product description',
            'category_id.required'=> 'Please Input Product category_id',
        ]
        );
        $Product = new Product();
        $Product->title = $request->title;
        $Product->description = $request->description;
        $Product->category_id = $request->category_id;
        $Product->save();
        Mail::to('from@example.com')->send(new joutProductEmail($Product));
        return Redirect()->back()->with('success','Product Inserted Successfull');
    }

    public function Prdelete($id){
        $Product = Product::find($id);
        Mail::to('from@example.com')->send(new deleteProductEmail($Product));
        $Product->delete();
        $Product = Image::where("product_id",$id)->delete();
        return Redirect()->back()->with('success','Product soft deleted Successfull');
    }
}
