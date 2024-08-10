@extends('layouts.app')
@section('content')
<h2 class="font-bold text-4xl text-blue-700">Gallery</h2> 
<hr class="h-1 bg-blue-200">
<div class="my-4 text-right px-10">
    <a href="{{route('gallery.create')}}" class="bg-amber-400 text-black px-4 py-2 rounded-lg shadow-md hover:shadow-amber-300">Add Gallery</a>
</div>


<table id="mytable" class="mytable">
    <thead>
        <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Picture</th>
        <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($galleries as $gallery)
        <tr>
            <td> {{$gallery->id}}</td>
            <td> {{$gallery->title}}</td>
            <td> <img class="w-20" src="{{('images/gallery/'.$gallery->photopath)}}" 
            alt="{{('images/gallery/'.$gallery->photopath)}}"></td>
            <td>
             <a class="bg-blue-500 text-white px-2 py-1 rounded "href="{{route('gallery.edit',$gallery->id)}}">Edit</a>
             <a class="bg-red-500 text-white px-2 py-1 rounded " href="{{route('gallery.destroy',$gallery->id)}}">Delete</a>
           </td>
        </tr>

       @endforeach
    </tbody>


</table>

<script>
    let table= new DataTable('#mytable')
</script>

@endsection 



