@extends('master')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')
<div class="grid grid-cols-2 mx-16 justify-between  gap-8 mt-8">

<img src="https://www.baltic.travel/uploads/2021/08/Return_of_Sports.jpg" alt="">

    <div>
        <h1 class="text-indigo-900 text-4xl font-bold ">About Us</h1>
        <p class="text-black text-3xl mt-4"> Sports are the best treatment for physical and mental health.</p>
        <p  class="text-slate-700 text-xl  mt-4 text-justify">An online sports store shop is a digital platform where you can browse and purchase a wide range of sports-related products and equipment. These stores cater to sports enthusiasts of all levels, providing them with convenient access to high-quality sporting goods from the comfort of their homes.</p>

        <div class="mt-16">
        <a href="" class="bg-indigo-900 py-4 px-8 mt-16 text-white">View More</a>
        </div>
    </div>

    
</div>

<div class="mx-16 mt-16 border-l-4 border-blue-600 pl-4">
<h1 class="text-4xl text-black">Products</h1>
<p class="text-lg text-slate-700">View our products at a glance</p>
</div>

<h2 class="font-bold text-4xl text-center my-5 text-indigo-900">Our Products</h2>

<div class="grid grid-cols-4 gap-10 px-24 mb-10">
    @foreach($products as $product)
    <a href="{{route('viewproduct',$product->id)}}">
    <div class="bg-gray-100 rounded-lg shadow-lg relative">
    <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-full h-72 object-cover rounded-t-lg">
    <div class="p-2">
    <p class="font-bold text-2xl">{{$product->name}}</p>
    <p class="font-bold text-2xl"><span class="line-through text-gray-500 text-xl">Rs.{{$product->oldprice}}-</span> Rs. {{$product->price}}/-</p>
    </div>
     
    @if($product->oldprice !='')
        @php
        $discount= floor(($product->oldprice - $product->price) / $product->oldprice * 100);
        @endphp
        <p class="absolute top-1 right-1 bg-blue-600 text-white rounded-lg px-4
        py-1">{{$discount}}% off</p>
        @endif
     
    </div>
    </a>

    
    @endforeach

    

</div>

@endsection