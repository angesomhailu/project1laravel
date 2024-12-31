@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Batches Addition</div>
  <div class="card-body">
      
      <form action="{{ url('batches') }}" method="post">
        {!! csrf_field() !!}
        <label>Batch Name</label></br>
        <input type="text" name="name" id="name" class="form-control"></br>
        <label>Course </label></br>
       
        <select class="form-select" aria-label="Default select example" name="course_id">
          <option selected>Select course</option>
            @foreach ($courses as $course)
            <option value={{$course->id}}> {{ $course->Coursename}}</option>
            @endforeach
        </select></br>
        <label>Start Date</label></br>
        <input type="text" name="start_date" id="start_date" class="form-control"></br>
        
        <input type="submit" value="Save" class="btn btn-success"> 
    </form>
   
  </div>
</div>
 
@stop