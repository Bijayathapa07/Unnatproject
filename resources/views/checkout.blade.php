@extends('master')
@section('content')
@include('layouts.message')
<h1 class="text-center font-bold text-3xl mt-8">Billing Details</h1>
<form action="{{route('order.store')}}" method="POST" class="w-1/2 mx-auto my-10">
    @csrf

<input type="text" class="p-4 rounded-lg w-full my-2 " name="person_name" placeholder="Full name" value="{{auth()->user()->name}}">
<input type="text" class="p-4 rounded-lg w-full my-2 " name="shipping_address" placeholder="Address" value="{{auth()->user()->address}}">

<input type="text" class="p-4 rounded-lg w-full my-2 " name="phone" placeholder="Number" value="{{auth()->user()->phone}}">

<select class="p-4 rounded-lg w-full my-5 " name="payment_method" >
    <option value="COD">Cash On Delivery</option>

</select>

<input type="submit" class="bg-blue-600 text-white p-5 rounded w-1/3 mx-auto block mt-5 cursor-pointer"
value="Place Order">

<button id="payment-button"   class="bg-blue-600 text-white p-5 rounded w-1/3 mx-auto block mt-5 cursor-pointer" type="button">Pay with Khalti</button>




</form>

<script>
        var config = {
            // replace the publicKey with yours
            "publicKey": "test_public_key_e05baffad8bb49d4a28aebd94ae356fa",
            "productIdentity": "1234567890",
            "productName": "Dragon",
            "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
            "paymentPreference": [
                "KHALTI",
                "EBANKING",
                "MOBILE_BANKING",
                "CONNECT_IPS",
                "SCT",
                ],
            "eventHandler": {
                onSuccess (payload) {
                    // hit merchant api for initiating verfication
                    console.log(payload);

                    $.ajax({
        url: "{{route('khaltiverify')}}", // Replace with your API endpoint URL
        type: "POST",
        data: {
            data: payload,
            _token:"{{csrf_token()}}"
        },
        dataType: "json", // The expected data type you are receiving from the server
        success: function(response) {
          // This function will be called when the request is successful
          // 'data' variable will contain the response from the server
          // Display the data on the page


          console.log(response);
          
        },
        error: function(xhr, status, error) {
          // This function will be called if there's an error in the AJAX request
          // Handle the error gracefully
          console.log("AJAX Error: " + error);
        }
      });




                },
                onError (error) {
                    console.log(error);
                },
                onClose () {
                    console.log('widget is closing');
                }
            }
        };

        var checkout = new KhaltiCheckout(config);
        var btn = document.getElementById("payment-button");
        btn.onclick = function () {
            // minimum transaction amount must be 10, i.e 1000 in paisa.
            checkout.show({amount: 1000});
        }
    </script>

@endsection