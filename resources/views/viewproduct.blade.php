@extends('master')
@section('content')
<form action="{{route('cart.store')}}" method="post">
@csrf

<h2 class="font-bold text-4xl mx-96 my-5 text-indigo-900 mt-8">Products details</h2>


<div class="grid grid-cols-3 mx-64 mt-4 ">

    <div>

    <img src="{{asset('images/products/'.$product->photopath)}}"  alt="" class="w-full h-96 object-cover rounded-lg">

    </div>

    

    <div class="border-l-2 px-2 col-span-2">

    <h2 class="text-3xl">{{$product->name}}</h2>
    <p class="text-red-700 line-through text-lg">Rs.{{$product->oldprice}}/-</p>
    <p class="text-red-700  text-2xl font-bold">Rs.{{$product->price}}/-</p>
    <p>Quantity</p>
        
          <p class="mt-4 d-flex align-items-center">
            <span class="bg-gray-200 px-4 font-bold text-xl" onclick="subqty()">-</span>
            <input class="h-11 w-12 px-0 text-center border-0 bg-gray-100" id="qty" name="qty" value="1" type="number" readonly>
            <span class="bg-gray-200 px-4  font-bold text-xl"><button onclick="addqty()" type="button">+</button></span>
          </p>
   
    
    <p>In Stock:{{$product->stock}}</p>


    <div class="mt-14">

   

    <input type="hidden" name="product_id" value="{{$product->id}}">
    <button type="submit" class="bg-indigo-600 text-white px-6 py-2
    rounded-lg shadow">Add to Cart</button>
        
    </div>
    </form>

    </div>
</div>

<div>
    <h2 class="font-bold  mx-96 mt-8 text-4xl text-center">Related Products</h2>

    <div class="grid grid-cols-4 gap-10 px-24 mb-10 mt-8 ">
    @foreach($relatedproducts as $relatedproduct)
    <a href="{{route('viewproduct',$relatedproduct->id)}}">
    <div class="bg-gray-100 rounded-lg shadow-lg relative">
    <img src="{{asset('images/products/'.$relatedproduct->photopath)}}" alt="" class="w-full h-72 object-cover rounded-t-lg">
    <div class="p-2">
    <p class="font-bold text-2xl">{{$relatedproduct->name}}</p>
    <p class="font-bold text-2xl"><span class="line-through text-gray-500 text-xl">Rs.{{$relatedproduct->oldprice}}-</span> Rs. {{$relatedproduct->price}}/-</p>
    </div>
     
    @if($product->oldprice !='')
        @php
        $discount= floor(($relatedproduct->oldprice - $relatedproduct->price) / $relatedproduct->oldprice * 100);
        @endphp
        <p class="absolute top-1 right-1 bg-blue-600 text-white rounded-lg px-4
        py-1">{{$discount}}% off</p>
        @endif
     
    </div>
    </a>

    
    @endforeach

    

</div>

    
</div>

<script>
    var stock = {{ $product->stock }}; // Get the stock value from the server-side (e.g., using PHP or JavaScript)

  function addqty() {
    var qtyInput = document.getElementById('qty');
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue < stock) {
      qtyInput.value = qtyValue + 1;
    }
  }

  function subqty() {
    var qtyInput = document.getElementById('qty');
    var qtyValue = parseInt(qtyInput.value);

    if (qtyValue > 1) {
      qtyInput.value = qtyValue - 1;
    }
  }
  
  
  </script>



@endsection