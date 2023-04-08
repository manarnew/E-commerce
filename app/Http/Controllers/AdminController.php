<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\product;
use App\Models\Order;
use PDF;
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
    public function order(){
      $Orders=Order::paginate(20);
      return view('admin.order',compact('Orders'));
  }

  public function delivered($id){
    $order=Order::find($id);
    $order->delivery_status='delivered';
    $order->payment_status='Paid';
    $order->save();

    return redirect()->back();
    
}
public function print_pdf($id){
  $Order=Order::find($id);
  $pdf=PDF::loadView('admin.pdf',compact('Order'));

  return $pdf->download('Order_Details.pdf');
}
 public function order_search(Request $request){
   $searchText=$request->search;
   $Orders=Order::where('name','LIKE',"%$searchText%")->orWhere
   ('phone','LIKE',"%$searchText%")
   ->orWhere
   ('product_title','LIKE',"%$searchText%")
   ->get();
   return view('admin.order',compact('Orders'));
 }
}
