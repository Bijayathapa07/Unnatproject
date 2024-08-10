@extends('layouts.app')
@section('content')
<h2 class="text-green-900 text-3xl font-bold">Categories</h2>
<hr class="h-1 bg-blue-500">
<div class="my-4 px-10 text-right">
    <a href="{{route('category.create')}}"class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:shadow-green-400" >Add Category</a>
</div>

<table id="mytable" class="mytable">
    <thead>
        <tr>
        <th>S.N</th>
        <th>Categories</th>
        <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{$category->priority}}</td>
            <td>{{$category->name}}</td>
            
            <td>
            <a href="{{route('category.edit',$category->id)}}" class="bg-blue-600 px-2 py-1 rounded text-white">Edit</a>
            <a onclick="return confrim('Are you sure you want to delete')" href="{{route('category.destroy' ,$category->id)}}" class="bg-red-600 px-2 py-1 rounded text-white">Delete</a> 
            </td>
        </tr>
        @endforeach
        
    </tbody>

</table>

<script>
    let table= new DataTable('#mytable');
</script>

@endsection