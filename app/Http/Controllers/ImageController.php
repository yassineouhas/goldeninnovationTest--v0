<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ImageController extends Controller
{
    public function AllImage()
    {
        $images = Image::all();
        $products = Product::latest()->paginate(5); 
        $trachCat = Product::onlyTrashed()->latest()->paginate(3);
        return view('admin.image.index',compact('products','trachCat','images'));
    }

    public function AddImage(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:images,name',
            'path' => 'required',
            'size' => 'required',
        ],
        [
            'name.required'=> 'Please Input image Name',
            'path.required'=> 'Please Input image path',
            'size.required'=> 'Please Input image size',
        ]
        );
        $Image = new Image();
        $Image->name = $request->name;
        $Image->path = $request->path;
        $Image->size = $request->size;
        $Image->product_id = $request->product_id;
        $Image->save();
        return Redirect()->back()->with('success','Image Inserted Successfull');
    }
}
