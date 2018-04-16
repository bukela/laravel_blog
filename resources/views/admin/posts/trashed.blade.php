@extends('layouts.app') 
@section('content')
<table class="table table-hover">
    <thead><h3  class="text-center">Trashed posts</h3></thead>
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
            Restore
        </th>
        <th>
            Destroy
        </th>
    </thead>
    <tbody>
      @if($posts->count() > 0)
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
          </td>
          <td>
              <a href="{{ route('post.restore',['id' => $post->id])  }}" class="button btn btn-success btn-sm">Restore</a>
          </td>
          <td>
              <a href="{{ route('post.kill',['id' => $post->id])  }}" class="button btn btn-danger btn-sm">Delete</a>
          </td>
      </tr>
      @endforeach
      @else
      <tr>
         <th colspan="5" class="text-center underline"><h3><u>No trashed posts</u></h3></th>
    </tr>
      @endif

    </tbody>
</table>
@endsection