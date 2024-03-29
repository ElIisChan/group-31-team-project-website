@extends('layouts.main')


@section('main-container')
<section class="heading-link">
   <h3>Basket</h3>
   <p> <a href="index.html">home</a> / basket </p> <!-- links the home heading on the contact me page back to the home page -->
</section>

@if(session()->has('message'))
<div class="alert alert-success" style="background:green; font-size:30px;">
     <button type="button" class="close" data-dismiss="alert" style="background:green; font-size:30px;">x</button>
      {{session()->get('message')}}
     </div> 
      @endif

<div style="padding:100px;" align="center";>
   <table>
      <tr style="background-color:grey;">
         <td style="padding:10px; font-size: 20px;">Product Name</td>
         <td style="padding:10px; font-size: 20px;">Product Description</td>
         <td style="padding:10px; font-size: 20px;">Quantity</td>
         <td style="padding:10px; font-size: 20px;">Price</td>
         <td style="padding:10px; font-size: 20px;">Action</td>
      </tr>

      <form action="{{url('order')}}" method="POST">
         @csrf

      @foreach($basket as $baskets)

      <tr>
         <td style="padding:10px; font-size: 20px;">
         <input type="text" name="productname[]" value="{{$baskets->product_name}}" hidden="">
         {{$baskets->product_name}}
      </td>
         <td style="padding:10px; font-size: 20px;">
         <input type="text" name="productdescription[]" value="{{$baskets->product_description}}" hidden="">
         {{$baskets->product_description}}
      </td>
         <td style="padding:10px; font-size: 20px;">
         <input type="text" name="quantity[]" value="{{$baskets->quantity}}" hidden="">
         {{$baskets->quantity}}
      </td>
         <td style="padding:10px; font-size: 20px;">
         <input type="text" name="price[]" value="£{{$baskets->price}}" hidden="">
         £{{$baskets->price}}
      </td>

         <td style="padding:10px; font-size: 20px;">
         <a class="btn" href="{{url('delete', $baskets->id)}}">Delete</a></td>





      </tr>

      @endforeach
   </table>

   <button class="btn">Checkout</button>
   </form>

</div>



@endsection

<!-- home section ends -->
