@extends('master')
@section('content')

<div class="grid grid-cols-2">
        <img src="https://thumbs.dreamstime.com/z/login-icon-button-vector-illustration-isolated-white-background-126999474.jpg?fbclid=IwAR2dcmcn6I0GTjmoOI4MLjcHLkTLLUYG4__2zWIxcVzSa7awDp9ePX-3Ekw" alt="" class="h-screen">
        <div class="flex justify-center items-center">
            <div class="w-full text-center">
                <h2 class="font-bold text-4xl">Welcome to Sport Hub</h2>
                <img src="https://static.vecteezy.com/system/resources/thumbnails/011/432/528/small/enter-login-and-password-registration-page-on-screen-sign-in-to-your-account-creative-metaphor-login-page-mobile-app-with-user-page-flat-illustration-vector.jpg?fbclid=IwAR1t1I1Nrvscf4eL9VXskhvUSbx8DicAg8czVMNkL0IMHuJRy1mSSUduq8E" alt="" 
                class="mx-auto my-4 h-32">
                <form action="{{route('login')}}" method="POST">
                    @csrf
                    <input type="email" name="email" placeholder="Enter Email"
                    class="p-4 rounded-lg w-8/12">
                    <input type="password" name="password" placeholder="Enter Password"
                    class="p-4 rounded-lg w-8/12">

                    <input type="submit" value="Login" class="bg-blue-600 text-white
                    w-4/12 py-3 mt-4 rounded-lg block mx-auto cursor-pointer">
                    <a href="{{route('user.register')}}">Register Here</a>
                </form>

            </div>

        </div>
    </div>
    @endsection
