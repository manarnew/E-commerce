<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
class HomeController extends Controller
{
    public function index(){
        $products=product::paginate(10);
        return view('home.userpage',compact('products')); 
    }
    public function redirect(){
        $usertype=Auth::user()->usertype;
        if($usertype=='1'){
            $total_product=product::all()->count();
            $total_order=Order::all()->count();
            $total_user=user::all()->count();
            $order=Order::all();
            $total_revenue=0;
            foreach($order as $order){
                $total_revenue+=$order->price;
            }
            $total_delivered=Order::where('delivery_status','=','Delivered')->get()->count();
            $total_processing=Order::where('delivery_status','=','processing')->get()->count();
            return view('admin.home',compact('total_product',
            'total_order','total_user','total_revenue','total_delivered','total_processing'));
        }else{
            $products=product::paginate(10);
        return view('home.userpage',compact('products'));
        }
    }
public function product_details($id)
{
    $product=product::find($id);
    return view('home.product_details',compact('product'));
}
public function add_cart(Request $request ,$id)
{
    if(Auth::id()){
        $user=Auth::user();
        $product=product::find($id);
        $cart=new cart;
         
        $cart->name=$user->name;
        $cart->email=$user->email;
        $cart->phone=$user->phone;
        $cart->address=$user->address;
        $cart->user_id=$user->id;

        $cart->product_title=$product->title;
        if($product->discount_price!=null ){
            $cart->price=$product->discount_price * $request->quantity;
        }else{
            $cart->price=$product->price * $request->quantity;
        }
        $cart->image=$product->image;
        $cart->product_id=$product->id;

        $cart->quantity=$request->quantity;

        $cart->save();

        return redirect()->back();

    }else{
        return redirect('login');
    }
}
public function show_cart(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $cart=Cart::where('user_id','=',$id)->get();
        return view("home.showcart",compact('cart'));
    }else
    {
        return redirect('login');
    }
    
}
public function remove_cart($id){
    $cart=Cart::find($id);
    $cart->delete();

    return redirect()->back();
}
public function cash_order(){
    $userid=Auth::user()->id;
    $data=Cart::where('user_id','=',$userid)->get();

    foreach($data as $data){
        $order=new Order;
        $order->name=$data->name;
        $order->email=$data->email;
        $order->phone=$data->phone;
        $order->address=$data->address;
        $order->user_id=$data->user_id;

        
        $order->product_title=$data->product_title;
        $order->product_id=$data->product_id;
        $order->price=$data->price;
        $order->image=$data->image;
        $order->quantity=$data->quantity;

        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';

        $order->save();


        $cart_id=$data->id;
        $cart=Cart::find($cart_id);
        $cart->delete();
    }
      return redirect()->back()->with('message','We have Received Your Order . 
      We will connect with you soon ...');   
}

public function show_order(){
    if(Auth::id()){
        $id=Auth::user()->id;
        $Orders=Order::where('user_id','=',$id)->get();
        return view("home.order",compact('Orders'));
    }else
    {
        return redirect('login');
    }
    
}
public function cancel_order($id){
        $Order=Order::find($id);
        $Order->delivery_status='You canceled the order';
        $Order->save();
        return redirect()->back();
    
}
}
