@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Courses Review</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Course Title : {{ $courses->Coursename }}</h5>
        <p class="card-text">Duration : {{ $courses->Duration }}</p>
        <p class="card-text">Outline : {{ $courses->Outline }}</p>
        <p class="card-text">Instructor : {{ $courses->Instructor }}</p>
         
  </div>
       
    </hr>
  
  </div>
</div>