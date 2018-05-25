@extends('layouts.app') 
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="text-center">All Users</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">    
            <thead>
                <th>
                    Image
                </th>
                <th>
                    Name
                </th>
                <th>
                    Permissions
                </th>
                <th>
                    Delete
                </th>
            </thead>
            <tbody>
            @if($users->count() > 0)
                @foreach ($users as $user)
                <tr>
                    <td>
                    @if (File::exists(asset($user->avatar)))
                        <img src="{{ asset($user->avatar) }}" alt="{{ $user->name }}" style="width="60px" height="60px" style="border-radius: 50%;"/>
                    @else 
                        <p>No image</p>
                    @endif
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        @if($user->admin)
                        <a href="{{ route('user.not.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Remove Admin</a>
                        @else
                        <a href="{{ route('user.admin', ['id' => $user->id]) }}" class="btn btn-xs btn-success">Make Admin</a>
                        @endif
                    </td>
                    <td>
                    @if(Auth::id() !== $user->id)
                    <a href="{{ route('user.delete', ['id' => $user->id]) }}" class="btn btn-xs btn-danger">Delete User</a>
                    @else
                    <h5>Logged User</h5>
                    @endif
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                   <th colspan="5" class="text-center underline"><h3><u>No users created</u></h3></th>
              </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>

@endsection