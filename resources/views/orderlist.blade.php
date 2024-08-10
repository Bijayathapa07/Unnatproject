@extends('master')
@section('content')



    <div class="flex-1 bg-white shadow-lg md:ml-5 p-4">
  <div class="overflow-x-auto">
    <table class="table-auto w-full border-collapse border">
      <thead>
        <tr class="bg-gray-800 text-white">
          <th class="px-4 py-2">Product Image</th>
          <th class="px-4 py-2">Product Name</th>
          <th class="px-4 py-2">Order Date</th>
          <th class="px-4 py-2">Price</th>
          <th class="px-4 py-2">Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
          @foreach($order->carts as $cart)
            <tr>
              <td class="border px-4 py-2">
                <img class="w-32 h-20 object-contain" src="{{ asset('images/products/'.$cart->product->photopath) }}" alt="">
              </td>
              <td class="border px-4 py-2">{{ $cart->product->name }}</td>
              <td class="border px-4 py-2">{{ $order->order_date }}</td>
              <td class="border px-4 py-2">{{ $cart->product->price }}</td>
              <td class="border px-4 py-2">{{ $order->status }}</td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>
</div>



@endsection