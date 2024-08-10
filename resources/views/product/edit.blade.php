@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Add Products</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('product.update',$product->id)}}"  method="POST" class="mt-5" 
enctype="multipart/form-data">
    @csrf
    <select name="category_id" id="" class="w-full rounded-lg border-gray-300
    my-2">
    @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
    @endforeach

    </select>

    <input type="text" placeholder="Product Name" name="name" class="w-full
    rounded-lg border-gray-300 my-2" value="{{$product->name}}">
    @error('name')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror

    <input type="text" placeholder=" Old Price" name="oldprice" value="{{$product->oldprice}}" class="w-full rounded-lg border-gray-300 my-2">
    @error('oldprice')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror




    <input type="text" placeholder="Price" name="price" value="{{$product->price}}" class="w-full rounded-lg border-gray-300 my-2">
    @error('price')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    <input type="text" placeholder="Stock Name" name="stock" class="w-full
    rounded-lg border-gray-300 my-2" value="{{$product->stock}}">
    @error('stock')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    <input type="text" placeholder="Description" name="description" class="w-full
    rounded-lg border-gray-300 my-2" value="{{$product->description}}">
    @error('description')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror

    <p>Current Image</p>
    <img src="{{asset('images/products/'.$product->photopath)}}" class="w-24" alt="">


    <input type="file"  name="photopath" class="w-full
    rounded-lg border-gray-300 my-2" >
    @error('photopath')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror


    


    
    <div class="flex">
        <input type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2 rounded-lg" value="Update Product">

        <a href="{{route('product.index')}}" class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>

    </div>

</form>

@endsection