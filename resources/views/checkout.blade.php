@extends('layouts.app')
@section('content')
<div class="container">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   @include('inc.messages')
   <h1>Checkout</h1>
   <div class="row ">
      @if($total_price=="0")
      <div class="col-md-12">
         <p>Your Cart have 0 Product</p>
      </div>
      <div class="col-md-12">
         <a href="{{url('products')}}" class="btn btn-primary">Continue Shopping</a>
      </div>
      @else
      <div class="col-md-12">
         <form action="{{url('order')}}" method="POST">
            @csrf
            <label>Total Price</label>
            <input type="number" name="total" value="{{$total_price}}" class="form-control" readonly><br>
            <label>Shipping Method</label>
            <select class="form-control" name="shipping_method">
               <br>
               <option>Free Shipping</option>
            </select>
            <label>Payment Method</label>
            <select class="form-control" name="payment_method">
               <br>
               <option>Check</option>
               <option>Money Order</option>
            </select>
            <br>
            <button type="submit" class="btn btn-success">Place Order</button>
         </form>
      </div>
      <div class="col-md-12"><br>
         <a href="{{url('cart')}}" class="btn btn-primary">Cart</a>
      </div>
      @endif
   </div>
</div>
@endsection
