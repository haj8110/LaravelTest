@extends('layouts.app')
@section('content')
<div class="container">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
   @include('inc.messages')
   <div class="row ">
      <h1>My Cart</h1>
      <div class="col-md-12">
         <table class="table table-hover table-condensed">
            <thead>
               <tr>
                  <th style="width:50%">Product</th>
                  <th style="width:10%">Price</th>
                  <th style="width:8%">Quantity</th>
                  <th style="width:22%" class="text-center">Subtotal</th>
                  <th style="width:10%"></th>
               </tr>
            </thead>
            <?php $total_price = 0 ?>
            <tbody>
               @if(isset($carts) && $carts->count() > 0)
                @foreach($carts as $item)
                    <?php $product = DB::table('products')->where('id', $item->product_id)->first(); ?>
                    <?php $total_price += $product->price * $item->quantity; ?>
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>${{$product->price}}</td>
                        <td><input type="number" id="{{$item->id}}" onchange="changefunction(this.id)" value="{{$item->quantity}}" min="1" class="form-control" /></td>
                        <td align="center">${{$product->price*$item->quantity}}</td>
                        <td> <button class="btn btn-danger btn-sm remove-from-cart" onclick="deletefunction(this.id)" id="{{$item->id}}"><i class="fa fa-trash-o"></i></button></td>
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
         <a href="{{url('products')}}" class="btn btn-primary">Continue Shopping</a>
         @if(isset($carts) && $carts->count() > 0)
         <a href="{{url('checkout')}}" class="btn btn-success">Proceed To Checkout</a>
         @endif
      </div>
   </div>
</div>
<script>
   function changefunction(id)
   {
      var quantity =$('#'+id).val();
      var _token = $("input[name='_token']").val();
      $.ajax({
   
   type:'POST',
   
   url: '{{ url('update-cart') }}',
   
   data:{_token:_token, quantity:quantity, id:id},
   
   success:function(data){
   window.location.reload();
   
   
   
   }
   
   });
   
      
   }
   function deletefunction(id)
   {
      
      var _token = $("input[name='_token']").val();
      $.ajax({
   
   type:'POST',
   
   url: '{{ url('delete-cart') }}',
   
   data:{_token:_token,id:id},
   
   success:function(data){
   window.location.reload();
   
   
   
   }
   
   });
   
      
   }
   
</script>
@endsection
