@extends('master')
@section('content')


<h1 class="text-center font-bold text-3xl">Items in Cart</h1>

<div class="grid grid-cols-3 gap-5 px-24">
  @php
   $GrandTotal = 0;

  @endphp
@foreach ($carts as $cart)
    <div class="flex bg-gray-100 gap-8 my-5 rounded shadow">
        <img src="{{asset('images/products/'.$cart->product->photopath)}}" class="h-32 w-44 object-cover shadow-lg my-2">
        <div class="flex-columns">
        <div class="px-4 py-1">
            <h2 class="text-2xl font-bold">{{$cart->product->name}}</h2>
        </div>
        <div class="px-4 py-1">
            <h2 class=" text-sl mt-4 font-bold">NRS {{$cart->product->price}}</h2>
        </div>


        </div>
        <div class="flex-columns ">
        <div class="px-4 py-1">
        <p>Subtotal: {{$cart->subtotal}}</p>
        </div>
        @php

        $GrandTotal = $GrandTotal + $cart->subtotal;
        @endphp
        <div class="px-4 py-1">

        <!-- <p class="mt-4 flex items-center">
        <span class="bg-gray-200 px-4 py-2 font-bold
        text-xl">-</span>
        <input class="h-11 w-12 px-0 text-center border-0
        bg-gray-100 " name="qty" type="number" value="1" readonly>
        <span class="bg-gray-200 px-4 p-2 font-bold text-xl">+</span>
        
    </p> -->
    <form action="{{ route('cart.update',$cart->id) }}" method="POST" id="updateform">
                  @csrf
                
                  <p class="mt-4 d-flex align-items-center">
                    <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty('{{ $cart->id }}')">-</span>
                    <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty{{ $cart->id }}" name="qty" value="{{  $cart->qty  }}" type="number" readonly >
                    <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty('{{ $cart->id }}')" type="button">+</button></span>

                    <input type="hidden" id="stock{{ $cart->id }}" value="{{ $cart->product->stock }}">
                    </p>
                    <h5 id="total{{ $cart->id }}"> {{ $cart->product->price * $cart->qty }} </h5>
                  
            

    
    <div class="flex mt-2 gap-5" >
    <!-- <a href="" class="bg-blue-600 px-2 py-1 rounded text-white">Update</a> -->

    <button onclick="document.getElementById('updateform').submit();" type="submit"
    class="bg-blue-600 text-white px-2 py-1 rounded shadow hover:shadow-blue-400">Update</button>
     <a onclick="return confrim('Are you sure you want to delete')" href="{{route('cart.delete',$cart->id)}}" class="bg-red-600 px-2 py-1 rounded text-white">Delete</a>
    </div>
    </form>
        </div>
        </div>
    </div>
@endforeach

</div> 
<p class="mx-24">GrandTotal= {{$GrandTotal}}</p>
<div class="mx-24 my-20">
  
    <a href="{{route('cart.checkout')}}" class=" mx-auto bg-blue-600 text-white px-10 py-5 rounded-lg ">Checkout</a>

</div>

<script>
  

  function addqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);
    var stock = document.getElementById('stock'+x).value;
    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue+1);
    var link = document.getElementById()
    }
    
  }

  function subqty(x) {
    var qtyInput = document.getElementById('qty'+x);
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
      var rate = document.getElementById('rate'+x).innerHTML;
    rate = parseFloat(rate);
    document.getElementById('total'+x).innerHTML = rate*(qtyValue-1);
    }
    
  }

  
    
  </script>



@endsection