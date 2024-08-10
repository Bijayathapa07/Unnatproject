<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <script src="{{asset('datatable/jquery-3.6.0.js')}}"></script>
        <link rel="stylesheet" href="{{asset('datatable/datatables.css')}}">
        <script src="{{asset('datatable/datatables.js')}}"></script>
    </head>
    <body class="font-sans antialiased">
        <div class="flex">
            <div class="w-56 h-screen bg-slate-700 text-white shadow-lg shadow-blue-300">
                <img src="images\image.jpg" alt="">

                <div>
                   <a href="{{route('dashboard')}}" class="text-x1 font-bold border-b-2
                    border-green-600 block ml-4 px-2 py-2 mt-2
                    hover:bg-green-600 hover:text-white hover:rounded-lg">Dashboard</a>

                    <a href="{{route('category.index')}}" class="text-x1 font-bold border-b-2
                    border-blue-500 block ml-4 px-2 py-2 mt-2
                    hover:bg-blue-500 hover:text-white">Categories</a>


                    <a href="{{route('product.index')}}" class="text-x1 font-bold border-b-2
                    border-blue-500 block ml-4 px-2 py-2 mt-2
                    hover:bg-blue-500 hover:text-white">Products</a>


                    <a href="{{route('gallery.index')}}" class="text-x1 font-bold border-b-2
                    border-blue-500 block ml-4 px-2 py-2 mt-2
                    hover:bg-blue-500 hover:text-white">Gallery</a>



                    <a href="{{route('order.index')}}" class="text-x1 font-bold border-b-2
                    border-blue-500 block ml-4 px-2 py-2 mt-2
                    hover:bg-blue-500 hover:text-white">Order</a>



                    <a href="" class="text-x1 font-bold border-b-2
                    border-blue-500 block ml-4 px-2 py-2 mt-2
                    hover:bg-blue-500 hover:text-white">Login</a>




                </div>
            </div>
            <div class="flex-1 bg-white p-10">
                @yield('content')
            </div>

        </div>
    </body>
</html>
