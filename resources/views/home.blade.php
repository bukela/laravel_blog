@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Dashboard</div>
            <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        Welcome, {{ Auth::user()->email }}
                    You are logged in!
                    <a href="{{ route('sendEmail') }}" class="btn btn-block btn-primary">Send Email</a>
        </div>
    </div>
@endsection
