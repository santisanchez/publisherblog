@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in! as {{Auth::user()->role->name}}
                    @if (Auth::user()->role->name === 'admin')
                      <a href="{{route('users.index')}}">See Users index</a>
                    @endif
                    @if (Auth::user()->name === 'santi')
                      <a href="{{route('posts.index')}}">See Posts index</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
