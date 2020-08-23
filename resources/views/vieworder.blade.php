@extends('layouts.app')
@section('content')
<div class="container">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   @include('inc.messages')

   <div class="row ">
    <h1>Order</h1>
      <div class="col-md-12">
         <table class="table table-hover table-condensed">
            <thead>
               <tr>
                  <th style="width:50%">Product</th>
                  <th style="width:10%">Price</th>
                  <th style="width:8%">Quantity</th>
                  <th style="width:22%" class="text-center">Subtotal</th>
                  
               </tr>
            </thead>
            <?php $total_price = 0 ?>
            <tbody>
               @if(isset($orders) && $orders->count() > 0)
               @foreach($orders as $item)
               <?php $product = DB::table('products')->where('id', $item->product_id)
    ->first(); ?>
               <?php $total_price += $product->price * $item->quantity; ?>
               <tr>
                  <td>{{$product->name}}</td>
                  <td>${{$product->price}}</td>
               <td>{{$item->quantity}}</td>
                  <td align="center">${{$product->price*$item->quantity}}</td>
               
               <tr>
                  @endforeach
                  @else
                  <td colspan="5" align="center">Your Cart have 0 Product</td>
                  @endif
            </tbody>
            <tfoot>
               <td colspan="5" align="right">Total ${{$total_price}}</td>
            </tfoot>
         </table>
         
      </div>
      <div class="col-md-12">
      <a href="{{url('orders')}}" class="btn btn-primary">My Orders</a>
      
      </div>
   </div>
</div>

@endsection
