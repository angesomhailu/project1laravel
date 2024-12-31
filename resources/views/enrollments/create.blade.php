@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Enrollments</div>
  <div class="card-body">
  
      <form action="{{ url('enrollments') }}" method="post">
        {!! csrf_field() !!}
        <label>Enroll_no</label></br>
        <input type="text" name="enroll_no" id="enroll_no" class="form-control"></br>
        <label>Batch</label></br>
        <input type="text" name="batch_id" id="batch_id" class="form-control"></br>
        <label>Student</label></br>
        <input type="text" name="student_id" id="student_id" class="form-control"></br>
        <label>Join_Date</label></br>
        <input type="text" name="join_date" id="join_date" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"> 
    </form>
   
  </div>
</div>
 
@stop