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
    <div class="panel-heading text-center">Edit User Profile</div>
    <div class="panel-body">
        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control" autofocus>
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">New Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Current Avatar</label>
            <img src="{{ asset($user->profile->avatar) }}" alt="{{ $user->name }}" width="60px" height="60px" style="border-radius: 50%;">
            </div>
            <div class="form-group">
                <label for="name">Change Avatar</label>
                <input type="file" name="avatar" class="form-file-control">
            </div>
            <div class="form-group">
                <label for="name">Facebook Profile</label>
                <input type="text" name="facebook" value="{{ $user->profile->facebook }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Youtube Profile</label>
                <input type="text" name="youtube" value="{{ $user->profile->youtube }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">About</label>
                <textarea name="about" class="form-control" cols="5" rows="5">{{ $user->profile->about }}</textarea>
            </div>
            <div class="form-group">
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Save User</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection