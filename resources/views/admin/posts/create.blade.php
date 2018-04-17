@extends('layouts.app') 
@section('content')
@if(count($errors) > 0)
    <ul class="list-group">
        @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif
<div class="panel panel-default">
    <div class="panel-heading text-center">Create New Post</div>
    <div class="panel-body">
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control">
            </div>
            <div class="form-group">
                <label for="featured">Featured Image</label>
                <input type="file" name="featured" class="form-control-file">
            </div>
            <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                        <label for="tags">Select Tag</label>
                        <div class="checkbox">
                            @foreach ($tags as $tag)
                                <label for=""><input type="checkbox" name="tags[]" value="{{ $tag->id }}">{{ $tag->tag }}</label> <br>
                            @endforeach
                        </div>
                    </div>    
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="summernote" cols="5" rows="5" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
@endsection