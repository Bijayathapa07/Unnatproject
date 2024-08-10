@extends('master')
@section('content')

<div class="grid grid-cols-2">
        <img src="https://t4.ftcdn.net/jpg/00/30/09/49/500_F_30094949_TVY706RQuUUkQUmrpYv2UDvMwJYHZ4vt.jpg" alt="" class="h-screen">
        <div class="flex justify-center items-center">
            <div class="w-full text-center">
                
                <img src="https://www.singaporeathletics.org.sg/wp-content/uploads/2015/03/register-online-button-1024x274.jpg" alt=""
                class="mx-auto my-4 h-32">
                <form action="{{route('user.register')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Enter Name" class="w-full px-2 rounded-lg  my-4">
            <input type="text" name="phone" placeholder="Enter Phone" class="w-full px-2 rounded-lg  my-4">
            <input type="text" name="address" placeholder="Enter Address" class="w-full px-2 rounded-lg  my-4">
            <input type="text" name="email" placeholder="Email" class="w-full px-2 rounded-lg  my-4">
            <input type="file" name="photopath" placeholder="Image" class="w-full px-2 rounded-lg  my-4">
            <input type="password" name="password" placeholder="Password" class="w-full px-2 rounded-lg  my-4">
            <input type="password" name="password_confirmation" placeholder="Re-Enter Password" class="w-full px-2 rounded-lg my-4">
            <input type="submit" value="Register" class="w-1/2 block p-2 rounded-lg mx-auto my-4 bg-indigo-600 text-white">
            <a href="{{route('login')}}">Login Here</a>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

            </div>

        </div>
    </div>
    @endsection
