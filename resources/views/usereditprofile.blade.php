@extends('master')
@section('content')


<div class="w-10/12 mx-auto">
    <div class="flex mt-8">
        <div class=" w-80 h-screen bg-white shadow-lg">
        <h2 class="px-8 pt-2 text-3xl font-bold text-gray-500">My Account</h2>
        <hr class="text-indigo-400 mt-2">

        <ul class="mt-2">
            <li class="text-gray-500 pl-12 py-2">
                <a href="">My Information</a>
            </li>
            <hr>

            <li class="text-gray-500 pl-12 mt-1 py-2">
                <a href="">Address Book</a>
            </li>
            <hr>

            <li class="text-gray-500 pl-12 mt-1 py-2">
                <a href="">Password</a>
            </li>
            <hr>

            <li class="text-gray-500 pl-12 mt-1 py-2">
                <a href="">Logout</a>
            </li>
            <hr>

        </ul>
        <hr>

        <div class="pl-12 mt-2 pt-3 ">
            <a href="{{route('order.list')}}"class="px-4 py-2 bg-indigo-500 text-white rounded-lg" >My order</a>
        </div>

        
        </div>

        <div class="flex-1 bg-white shadow-lg md:ml-5">
            <h2 class="text-gray-500 text-xl font-bold px-8 pt-2">Information</h2>
            <hr>
            <div class="px-10 mt-5">
            @auth
            <form action="{{route('usersprofileupdate',auth()->user()->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

               
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                      Image
                    </label>
                    <img class="w-20" src="{{ asset('images/user/' . auth()->user()->photopath) }}" alt="Profile pic">

                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="photopath" value="{{auth()->user()->photopath}}"  type="file" placeholder="photo">
                    @error('photopath')
                    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
                    @enderror
                  
    
            

                
                <label for="name" class=" block text-gray-600 text-sm uppercase">Name</label>
                <input type="text" class="p-4 rounded-lg w-full my-2 border-gray-300 text-gray-500 " name="name" placeholder="Full name" value="{{auth()->user()->name}}">

                <label for="name" class=" block text-gray-600 text-sm uppercase">Address</label>
                <input type="text" class="p-4 rounded-lg w-full my-2 border-gray-300 text-gray-500 " name="address" placeholder="Address" value="{{auth()->user()->address}}">


                <label for="name" class=" block text-gray-600 text-sm uppercase">Phone Number</label>
                 <input type="text" class="p-4 rounded-lg w-full my-2 border-gray-300 text-gray-500 " name="phone" placeholder="Number" value="{{auth()->user()->phone}}">

                 <label for="name" class=" block text-gray-600 text-sm uppercase">Email</label>
                 <input type="text" class="p-4 rounded-lg w-full my-2 border-gray-300 text-gray-500 " name="email" placeholder="Email" value="{{auth()->user()->email}}">



                 <button type="submit" class="bg-blue-600 text-white px-4 py-2 mx-2  mt-2 rounded-lg" >Update Profile</button>


               
                </form>
                @endauth
            </div>

        </div>


    </div>

</div>




@endsection