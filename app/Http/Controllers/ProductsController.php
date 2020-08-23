<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use DB;
use App\Order;
use App\OrderItem;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('welcome',compact('products'));
    }
    public function addtocart($id)
    {
        $product = Product::FindorFail($id);
        $check_cart = Cart::where('user_id',auth()->user()->id)->where('product_id',$id)->first();
        if(!empty($check_cart))
        {
            return back()->with('error','Product Already in Cart!');
        }
        else
        { Cart::create([
            'user_id' => auth()->user()->id,
            'product_id' => $id,
          ]);
          return back()->with('success','Product Added to Cart!');  
            
        }
        
          
    }
    public function cart()
    {   
        $carts = Cart::where('user_id',auth()->user()->id)->get();

        return view('cart',compact('carts'));
    }
    public function updatecart(Request $request)
    {
        $cart = Cart::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
        $cart->quantity = $request->quantity;
        $cart->save();
        return back()->with('success','Cart Updated Successfully!');  
    }
    public function deletecart(Request $request)
    {
        $cart = Cart::where('id',$request->id)->where('user_id',auth()->user()->id)->first();
        $cart->delete();
        return back()->with('success','Cart Updated Successfully!');  
    }
    public function checkout()
    {   $carts = Cart::where('user_id',auth()->user()->id)->get();
        $total_price=0; 
        if(isset($carts) && $carts->count() > 0)
        {  
            foreach($carts as $item)
            {
              $product = DB::table('products')->where('id',$item->product_id)->first(); 
              $total_price += $product->price * $item->quantity; 
            }
        }
        
        return view('checkout',compact('total_price'));
    }
    public function order(Request $request)
    {
       
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'price' => $request->total,
            'shipping_method' => $request->shipping_method,
            'payment_method' => $request->payment_method,
          ]);
          $carts = Cart::where('user_id',auth()->user()->id)->get();
          if(isset($carts) && $carts->count() > 0)
          {  
              foreach($carts as $item)
              {
                OrderItem::create([
                    'order_id' => $order->id,
                    'quantity' => $item->quantity,
                    'product_id' => $item->product_id,
                    
                  ]);
                  $item->delete();
              }
          }
          
          return redirect('/products')->with('success','Your Order Placed Successfully!');
    }
    public function orders()
    {
        $orders = Order::where('user_id',auth()->user()->id)->orderBy('id','DESC')->paginate(10);
        return view('orders',compact('orders'));
    }
    public function vieworder($id)
    {
        $orders = OrderItem::where('order_id',$id)->get();

        return view('vieworder',compact('orders'));
    }

}
