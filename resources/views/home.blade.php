@extends('layouts.app')
@section('content')
<div class="container">
@include('inc.messages')
 <div class="row justify-content-center">
  <div class="col-md-12">
    @foreach($products as $item)
    <div class="card" style="width:400px">
    <img class="card-img-top" src="{{$item->image}}" alt="Card image" style="width:100%">
        <div class="card-body">
        <h4 class="card-title">{{$item->name}}</h4>
        <p class="card-text">{{$item->description}}</p>
        <p class="card-text">${{$item->price}}</p>
        <a href="{{url('AddToCart/'.$item->id)}}" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
   @endforeach
   </div>
  </div>
</div>
@endsection


