@extends('layouts.app') 
@section('content')
<table class="table table-hover">
        <thead><h3  class="text-center">Categories</h3></thead>
    <thead>
        <th>
            Category name
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @if($category->count() > 0)
        @foreach ($category as $item)
        <tr>
            <td>
                {{ $item->name }}
            </td>
            <td>
            <a href="{{ route('category.edit',['id' => $item->id])  }}" class="button btn btn-info btn-sm">Edit</a>
            </td>
            <td>
                <a href="{{ route('category.delete',['id' => $item->id])  }}" class="button btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
           <th colspan="5" class="text-center underline"><h3><u>No categories created</u></h3><a href="{{ route('category.create') }}" class="btn btn-default btn-info">Create Category</a></th>
      </tr>
        @endif
    </tbody>
</table>
@endsection