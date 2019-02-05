@extends('layouts.app')

@section('content')
  <form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group row">
      <label for="title" class="col-sm-2 form-control-label">Title</label>
      <div class="col-sm-10">
        <input name="title" type="text" class="form-control" id="title" value="{{old('title')}}" placeholder="Title">
        <small class="text-danger">{{$errors->first('title')}}</small>
      </div>
    </div>
    <div class="form-group row">
      <label for="description" class="col-sm-2 form-control-label">Description</label>
      <div class="col-sm-10">
        <input name="description" type="text" class="form-control" id="description" value="{{old('description')}}" placeholder="Description">
        <small class="text-danger">{{$errors->first('description')}}</small>

      </div>
    </div>
    <div class="form-group row">
      <label for="content" class="col-sm-2 form-control-label">Content</label>
      <div class="col-sm-10">
        <textarea name="content" type="text" rows="15" class="form-control" id="content" value="{{old('content')}}" placeholder="Content"></textarea>
        <small class="text-danger">{{$errors->first('content')}}</small>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Create</button>
      </div>
    </div>
  </form>
@endsection
