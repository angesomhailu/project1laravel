@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Students Review</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Fname : {{ $students->Fname }}</h5>
        <p class="card-text">Lname : {{ $students->Lname }}</p>
        <p class="card-text">User : {{ $students->User }}</p>
        <p class="card-text">Email : {{ $students->Email }}</p>
        <p class="card-text">Department : {{ $students->Department }}</p>
        <p class="card-text">Year : {{ $students->Year }}</p>
        
  </div>
       
    </hr>
  
  </div>
</div>