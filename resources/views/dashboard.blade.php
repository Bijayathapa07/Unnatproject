@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-green-600 ">Dashboard</h2>
<hr class=" h-1 bg-green-200 ">

<div class="mt-4 grid grid-cols-3 gap-10">
    <div class="bg-blue-600 flex px-8 py-8 justify-between rounded-lg text-white">
        <p class=" font-bold text-lg">Total Products</p>
    <p class=" font-bold text-4xl">{{$products}}</p>
    </div>

    <div class="bg-green-600 flex px-8 py-8 justify-between rounded-lg text-white">
        <p class=" font-bold text-lg">Total Categories</p>
        <p class=" font-bold text-4xl">{{$categories}}</p>
    </div>

    <div class="bg-red-600 flex px-8 py-8 justify-between rounded-lg text-white">
        <p class=" font-bold text-lg">Total Galleries</p>
        <p class=" font-bold text-4xl">{{$galleries}}</p>
    </div>


</div>

@endsection
