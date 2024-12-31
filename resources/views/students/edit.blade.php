@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Edit Page</div>
  <div class="card-body">
      
      <form action="{{ url('students/' .$students->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$students->id}}" >
        <label>Fname</label></br>
        <input type="text" name="Fname" id="Fname" value="{{$students->Fname}}" class="form-control"></br>
        <label>Lname</label></br>
        <input type="text" name="Lname" id="Lname" value="{{$students->Lname}}" class="form-control"></br>
        <label>User</label></br>
        <input type="text" name="User" id="User" value="{{$students->User}}" class="form-control"></br>
        <label>Email</label></br>
        <input type="Email" name="Email" id="Email" value="{{$students->Email}}" class="form-control"></br>
        <label>Department</label></br>
        <input type="text" name="Department" id="Department" value="{{$students->Department}}" class="form-control"></br>
        <label>Year</label></br>
        <input type="number" name="Year" id="Year" value="{{$students->Year}}" class="form-control">
        <input type="submit" value="Update" class="btn btn-success">
    </form>
   
  </div>
</div>
 
@stop