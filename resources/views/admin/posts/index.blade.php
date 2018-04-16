@extends('layouts.app') 
@section('content')
<table class="table table-hover">
    <thead>
        <th>
            Image
        </th>
        <th>
            Title
        </th>
        <th>
            Edit
        </th>
        <th>
            Delete
        </th>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
            <img src="{{ $post->featured }}" alt="{{ $post->title }}" width="80px" height="80px">
            </td>
            <td>
                {{ $post->title }}
            </td>
            <td>
            {{-- <a href="{{ route('category.edit',['id' => $item->id])  }}" class="button btn btn-info btn-sm">Edit</a> --}}
            Edit
            </td>
            <td>
                <a href="{{ route('post.delete',['id' => $post->id])  }}" class="button btn btn-danger btn-sm">Trash</a>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endsection