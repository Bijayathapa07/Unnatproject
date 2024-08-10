<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('mycss/style.css')}}">
     <!-- Scripts -->
     @vite(['resources/css/app.css', 'resources/js/app.js'])
     <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
     <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body class="font-[Sans-serf]">
<div class="flex px-24 justify-between bg-gray-300 p-2 text-xl">
        <span>Ph: 0567999</span>
        @if(auth()->user())
        <div>

                <a href="{{route('user.userprofile')}}">{{auth()->user()->name}} /</a>
                <form class="inline text-white" action="{{route('logout')}}"
                method="POST">
                @csrf
                <button type="submit" >Logout</button>
                <a href="{{route('cart.index')}}"> My Cart-{{$itemsincart}} </a>    
                </form>
            
            
        </div>
        @else
            
        <span><a href="{{route('userlogin')}}">Login/Register</a></span>
        @endif

    </div>

    <nav class="flex flex-row justify-between items-center px-16 z-50   shadow-lg sticky top-0 bg-white text-indigo-900 text-lg">
    <a href="{{route('homes')}}"><img src="https://thumbs.dreamstime.com/b/sports-logo-basketball-baseball-bat-soccer-d-49070528.jpg" alt="" class="h-20">
    </a>

    <div >
    @foreach($categories as $category)
    <a href="{{route('categoryproduct',$category->id)}}" class="mx-2 px-2"> {{$category->name}}</a>
    @endforeach
    </div>

    <div class="bg-green-600 py-2 px-4 rounded-lg text-white hover:bg-red-600 font-bold">
        <a href="{{route('contact')}}">Contact us</a>
    </div>

    
    </nav>

    @yield('content')

    <footer class="bg-gray-800 text-gray-300">
  <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
      <!-- Column 1: Logo and Short Description -->
      <div class="mb-8">
        <a href="#" ><img w-24 src="https://www.thebottleyard.com/wp-content/uploads/2016/06/HUB-Logo.png" alt=""></a>
        <p class="mt-2">Somethings thats remains with you forever</p>
      </div>

      <!-- Column 2: Quick Links -->
      <div>
        <h2 class="text-lg font-semibold">Quick Links</h2>
        <ul class="mt-4 space-y-2">
          <li><a href="#">Home</a></li>
          
          <li><a href="#">Gallery</a></li>
          <li><a href="#">About Us</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <!-- Column 3: Contact Information -->
      <div>
        <h2 class="text-lg font-semibold">Contact</h2>
        <ul class="mt-4 space-y-2">
          <li>Email: sportshub@gmail.com</li>
          <li>Phone: +977 9845965452</li>
          <li>Address: Tikaldhara, Bharatpur, Nepal</li>
        </ul>
      </div>

      <!-- Column 4: Social Media Links -->
      <div>
        <h2 class="text-lg font-semibold">Polices</h2>
        <ul class=" mt-4 ">
          <li><a href="#" class="text-gray-300 hover:text-white">Terms & Condition</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">Data Policy</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">Refund Policy</a></li>
          <li><a href="#" class="text-gray-300 hover:text-white">Return Policy</i></a></li>
        </ul>
      </div>
    </div>

    <!-- Copyright and Additional Info -->
    <div class="mt-8 text-center text-sm">
      <p>&copy; 2023 Your E-commerce Store. All rights reserved.</p>
      <p>Terms of Service | Privacy Policy</p>
    </div>
  </div>
</footer>

    
</body>
</html>