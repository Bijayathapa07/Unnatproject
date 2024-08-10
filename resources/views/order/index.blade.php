@extends('layouts.app')
@section('content')

@include('layouts.message')
<h2 class="font-bold text-4xl text-blue-700">orders</h2> 
<hr class="h-1 bg-blue-200">

<table id="mytable">
    <thead>
        <th>Order Date</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>
            <td>{{$order->order_date}}</td>
            <td>{{$order->person_name}}</td>
            <td>{{$order->phone}}</td>
            <td>{{$order->shipping_address}}</td>
            <td>{{$order->amount}}</td>
            <td>{{$order->payment_method}}</td>
            <td>{{$order->status}}</td>
            
            
            <td>
                <a href="{{route('orders.details',$order->id)}}" class="bg-blue-600 text-white px-2 py-1 rounded-lg">View Details</a>
                <a onclick="return confrim('Are you sure to change status?')" href="{{route('order.status',[$order->id,'Processing'])}}" class="bg-red-600 rounded-lg pc-2 py-1">Processing</a>
                <a onclick="return confrim('Are you sure to change status?')" href="{{route('order.status',[$order->id,'Completed'])}}" class="bg-red-600 rounded-lg pc-2 py-1">Completed</a>
                
                
            </td>
        </tr>
        @endforeach
    </tbody>

</table>
<script>
    let table= new DataTable('#mytable');
</script>

@endsection