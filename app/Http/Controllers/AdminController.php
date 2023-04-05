<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
class AdminController extends Controller
{
    public function view_category(){
        $data=Category::all();
        return view('admin.category',compact('data'));
    }
  
    public function add_category(Request $request){
       $data = new Category;
       $data->category_name=$request->categroy;
       $data->save();


       return redirect()->back()->with('message','Category Added Successfuly');
    }
    public function delete_category($id){
      $data = Category::find($id);

      $data->delete();

      return redirect()->back()->with('message','Category Deleted Successfuly');
    }
    public function view_product(){
      $categroies=Category::all();
      return view('admin.product',compact('categroies'));
    }
    public function add_product(Request $request){
      $product=new product;
      $product->title=$request->title;
      $product->description=$request->description;
      $product->price=$request->price;
      $product->qunatity=$request->quantity;
      $product->discount_price=$request->dis_price;
      $product->category=$request->category;

      $image=$request->image;
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);
      $product->image=$imagename;

      $product->save();

      return redirect()->back()->with('message','Product Added Successfuly');;
    }
    public function show_product(){
      $products=product::all();
      return view('admin.show_product',compact('products'));
    }
    public function delete_product($id){
      $data = product::find($id);

      $data->delete();

      return redirect()->back()->with('message','Product Deleted Successfuly');
    }
    public function update_product($id){
      $categroies=Category::all();
      $product = product::find($id);
      return view('admin.update_product',compact('product','categroies'));
    }
    public function edit_product(Request $request,$id){
      $product=product::find($id);
      $product->title=$request->title;
      $product->description=$request->description;
      $product->price=$request->price;
      $product->qunatity=$request->quantity;
      $product->discount_price=$request->dis_price;
      $product->category=$request->category;

      $image=$request->image;
      if($image){
      $imagename=time().'.'.$image->getClientOriginalExtension();
      $request->image->move('product',$imagename);
      $product->image=$imagename;
    }
      $product->save();

      return redirect()->back()->with('message','Product updated Successfuly');;
    }

   
}
