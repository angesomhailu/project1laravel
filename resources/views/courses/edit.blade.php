@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('courses/' .$courses->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$courses->id}}" id="id" />
        <label>Course Title</label></br>
        <input type="text" name="Coursename" id="Coursename" value="{{$courses->Coursename}}" class="form-control"></br>
        <label>Duration</label></br>
        <input type="text" name="Duration" id="Duration" value="{{$courses->Duration}}" class="form-control"></br>
        <label>Outline</label></br>
        <input type="text" name="Outline" id="Outline" value="{{$courses->Outline}}" class="form-control"></br>
        <label>Instructor</label></br>
        <input type="text" name="Instructor" id="Instructor" value="{{$courses->Instructor}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success">
    </form>
   
  </div>
</div>
 
@stop