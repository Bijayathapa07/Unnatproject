@extends('master')
@section('content')

<div class="w-10/12 mx-auto">
    <div class="flex mt-8">
    <div class=" w-80  bg-white shadow-lg">
        <h2 class="px-8 pt-2 text-3xl font-bold text-gray-500">My Orders</h2>
        <hr class="text-indigo-400 mt-2">

        <button class="w-56 mt-2  py-2 px-5 border-gray-300 rounded-md ml-10 bg-blue-600">Active Order</button>
                
            <hr>

            <button class="w-56 mt-2  py-2 px-5 border-gray-300 rounded-md ml-10">Pending Order</button>
                
                
        
            <hr>

        
            <button class="w-56 mt-2  py-2 px-5 border-gray-300 rounded-md ml-10">Cancelled Order</button>
                
            
            <hr>
         
    </div>

    <div class="flex-1 bg-white shadow-lg md:ml-5">
    <table>
        <tr>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Order date</th>
            <th>Price</th>
            <th>Status</th>
        </tr>
        @foreach($orders as $order)
            @foreach($order->carts as $cart)
            <tr>
                <td><img class="w-16" src="{{asset('images/products/'.$cart->product->photopath)}}" alt=""></td>
                <td >{{$cart->product->name}}</td>
                <td>{{$order->order_date}}</td>
                <td>{{$cart->product->price}}</td>
                <td>{{$order->status}}</td>
            </tr>
            @endforeach
        @endforeach
    </table>
    </div>

</div>




<script>
    let table= new DataTable('#mytable');
</script>



@endsection