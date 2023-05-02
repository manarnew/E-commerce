<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Comment;
use App\Models\Reply;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\commentsRequest;

class HomeController extends Controller
{
    public function index(){
        $products=product::paginate(10);
        $comment=Comment::orderby('id','desc')->get();
        $Reply=Reply::all();

        return view('home.userpage',compact('products','comment','Reply')); 
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
             $comment=Comment::orderby('id','desc')->get();
             $Reply=Reply::all();

             return view('home.userpage',compact('products','comment','Reply'));
        }
    }
public function product_details($id)
{
    $product=product::find($id);
    return view('home.product_details',compact('product'));
}
public function cartList()
{
    $cartItems = \Cart::getContent();
    $products=product::paginate(10);
    $comment=Comment::orderby('id','desc')->get();
    $Reply=Reply::all();
    // dd($cartItems);
    return view('home.cart', compact('cartItems','comment','Reply'));
}


public function addToCart(Request $request)
{
    \Cart::add([
        'id' => $request->id,
        'name' => $request->name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'attributes' => array(
            'image' => 'product/'.$request->image,
        )
    ]);
    session()->flash('success', 'Product is Added to Cart Successfully !');

    return redirect()->route('cart.list');
}

public function updateCart(Request $request)
{
    \Cart::update(
        $request->id,
        [
            'quantity' => [
                'relative' => false,
                'value' => $request->quantity
            ],
        ]
    );

    session()->flash('success', 'Item Cart is Updated Successfully !');

    return redirect()->route('cart.list');
}

public function removeCart(Request $request)
{
    \Cart::remove($request->id);
    session()->flash('success', 'Item Cart Remove Successfully !');

    return redirect()->route('cart.list');
}

public function clearAllCart()
{
    \Cart::clear();

    session()->flash('success', 'All Item Cart Clear Successfully !');

    return redirect()->route('cart.list');
}
public function deleteProduct(Request $request)
{
    if($request->id) {
        $cart = session()->get('cart');
        if(isset($cart[$request->id])) {
            unset($cart[$request->id]);
            session()->put('cart', $cart);
        }
        session()->flash('success', 'Book successfully deleted.');
    }
}

public function cash_order(){
    $userid=Auth::user()->id;
    $data = \Cart::getContent();

    foreach($data as $data){
        $order=new Order;
        $order->user_id= $userid;

        
        $order->product_id=$data->id;
        $order->quantity=$data->quantity;

        $order->payment_status='cash on delivery';
        $order->delivery_status='processing';

        $order->save();
        \Cart::clear();
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
public function add_comment(commentsRequest $request){
    if(Auth::id()){
        $user=Auth::user();
        $Comment=new Comment();
         
        $Comment->user_id=$user->id;
        $Comment->comment=$request->comment;
        $Comment->save();
        return redirect()->back();
    }else
    {
        return redirect('login');
    }
    
}
public function add_reply(Request $request){
    if(Auth::id()){
        $user=Auth::user();
        $Reply=new Reply();
         
        $Reply->user_id=$user->id;
        $Reply->comment_id=$request->commentId;
        $Reply->reply=$request->reply;
        $Reply->save();
        return redirect()->back();
    }else
    {
        return redirect('login');
    }
    
}
public function search(Request $request){
    $searchText=$request->search;
    $products=product::where('title','LIKE',"%$searchText%")
    ->orWhere
    ('price','LIKE',"%$searchText%")
    ->get();
    $comment=Comment::orderby('id','desc')->paginate(10);
    $Reply=Reply::all();
    return view('home.userpage',compact('products','comment','Reply'));
  }

  public function products(){

    $products=product::paginate(10);
    $comment=Comment::orderby('id','desc')->get();
    $Reply=Reply::all();

    return view('home.all_product',compact('products','comment','Reply')); 
  }
  public function search_product(Request $request){
    $searchText=$request->search;
    $products=product::where('title','LIKE',"%$searchText%")
    ->orWhere
    ('price','LIKE',"%$searchText%")
    ->get();
    $comment=Comment::orderby('id','desc')->paginate(10);
    $Reply=Reply::all();
    return view('home.all_product',compact('products','comment','Reply'));
  }

}
