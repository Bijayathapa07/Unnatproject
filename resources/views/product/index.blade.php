@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Products</h2> 
<hr class="h-1 bg-blue-200">
<div class="my-4 text-right px-10">
    <a href="{{route('product.create')}} " class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Product</a>
</div>

<table id="mytable">
    <thead>
        <th>S.N</th>
        <th>Product Name</th>
        <th>Picture</th>
        <th>Description</th>
        <th>Old price</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Category</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td><img class="w-20" src="{{asset('images/products/'.$product->photopath)}}" alt=""></td>
            <td>{{$product->description}}</td>
            <td>{{$product->oldprice}}</td> 
            <td>{{$product->price}}</td>
            <td>{{$product->stock}}</td> 
            <td>{{$product->category->name}}</td>

            <td>
                <a href="{{route('product.edit',$product->id)}}" class="bg-blue-600 px-2 py-1 rounded text-white">Edit</a>
                <a onclick="return confirm('Are you sure want to delete ?')" href="{{route('product.destroy',$product->id)}}" class="bg-red-600 px-2 py-1 rounded text-white">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>

</table>

        


<script>
    let table= new DataTable('#mytable');
</script>

@endsection



