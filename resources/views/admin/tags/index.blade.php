@extends('layouts.app') 
@section('content')
<table class="table table-hover">
        <thead><h3  class="text-center">Tags</h3></thead>
    <thead>
        <th>
           Tag name
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @if($tags->count() > 0)
        @foreach ($tags as $tag)
        <tr>
            <td>
                {{ $tag->tag }}
            </td>
            <td>
            <a href="{{ route('tag.edit',['id' => $tag->id])  }}" class="button btn btn-info btn-sm">Edit</a>
            </td>
            <td>
                <a href="{{ route('tag.delete',['id' => $tag->id])  }}" class="button btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
           <th colspan="5" class="text-center underline"><h3><u>No tags created</u></h3></th>
      </tr>
        @endif
    </tbody>
</table>
@endsection