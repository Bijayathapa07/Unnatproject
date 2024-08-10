@extends('master')
@vite(['resources/css/app.css', 'resources/js/app.js'])
@section('content')



<div>
<h1 class="text-4xl text-black font-bold px-24  text-center  px-24 py-6">Our Gallery</h1>

</div>




<div class="grid grid-cols-4 gap-10 px-24 mb-10">
    @foreach($galleries as $gallery)
    
    <div class="bg-gray-100 rounded-lg shadow-lg relative">
    <img src="{{asset('images/gallery/'.$gallery->photopath)}}" alt="" class="w-full h-72 object-cover rounded-t-lg">
    
     
    </div>
    



    
    @endforeach

    

</div>

@endsection