@extends('layouts.app') 
@section('content')
<table class="table table-hover">
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
        @foreach ($category as $item)
        <tr>
            <td>
                {{ $item->name }}
            </td>
            <td>
            <a href="{{  }}" class="button btn btn-info btn-sm">Edit</a>
            </td>
            <td>
                <a href="" class="button btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection