@extends('layouts.app')
@section('content')
<div class="container">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   @include('inc.messages')
   <div class="row ">
    <div class="col-md-12">
        <h1>My Orders</h1>
        <table class="table table-hover table-condensed">
           <thead>
              <tr>
                 <th>Order ID</th>
                 <th>Price</th>
                 <th>Shipping Method</th>
                 <th class="text-center">Payment Method</th>
                 <th>Order at</th>
                 <th></th>
              </tr>
           </thead>
        
           <tbody>
              @if(isset($orders) && $orders->count() > 0)
              @foreach($orders as $item)
              
              
              <tr>
                 <td>#{{$item->id}}</td>
                 <td>${{$item->price}}</td>
              <td>{{$item->shipping_method}}</td>
                 <td align="center">{{$item->payment_method}}</td>
                 <td>{{$item->created_at->diffForHumans()}}</td>
              <td> <a href="{{url('vieworder/'.$item->id)}}"><button class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></button></a></td>
              <tr>
                 @endforeach
                 @else
                 <td colspan="6" align="center">Your have 0 Orders</td>
                 @endif
           </tbody>
          
        </table>
        {{$orders->links()}}
        
     </div>
   </div>
</div>

@endsection
