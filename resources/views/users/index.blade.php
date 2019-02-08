@extends('layouts.app')

@section('content')
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
              <form id="update-user-role" method="POST" action="{{route('users.update',$user->id)}}">
                @csrf
                {!! method_field('PUT') !!}
                <div class="dropdown open">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{$user->role->name}}
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <button value="Writer" class="dropdown-item" type="submit">Writer</button>
                    <button value="Reader" class="dropdown-item" type="submit">Reader</button>
                  </div>
                </div>
                <input id="roleName" type='hidden' name='role'>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
