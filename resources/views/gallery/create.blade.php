@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Add Gallery</h2>
<hr class="h-1 bg-blue-200">

<form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">


    @csrf

    @error('title')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror
    <input type="text" placeholder="title" name="title" value="{{old('title')}}" class="w-full rounded-lg border-gray-300 my-2">


    @error('photopath')
    <p class="text-red-600 text-xs -mt-2">{{$message}}</p>
    @enderror
    <input type="file"  name="photopath"   class="w-full  border-gray-300 my-2">



    <div class="flex">
    <input type="submit" class="bg-blue-600 text-white px-4 py-2  rounded-lg" value="Add gallery">

    <a href=" " class="bg-red-600 text-white px-10 py-2 mx-2 rounded-lg">Exit</a>

    </div>




</form>

@endsection