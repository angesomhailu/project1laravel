@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Courses Addition</div>
  <div class="card-body">
      
      <form action="{{ url('courses') }}" method="post">
        {!! csrf_field() !!}
        <label>Course Title</label></br>
        <input type="text" name="Coursename" id="Coursename" class="form-control"></br>
        <label>Duration</label></br>
        <input type="text" name="Duration" id="Duration" class="form-control"></br>
        <label>Outline</label></br>
        <input type="text" name="Outline" id="Outline" class="form-control"></br>
        <label>Instructor</label></br>
        <input type="text" name="Instructor" id="Instructor" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"> 
    </form>
   
  </div>
</div>
 
@stop