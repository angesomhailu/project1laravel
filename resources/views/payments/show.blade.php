@extends('layout')
@section('content')
 
 
<div class="card">
  <div class="card-header">Payments</div>
  <div class="card-body">
   
 
        <div class="card-body">
        <h5 class="card-title">Enrollment_NO : {{ $payments->enrollment_id }}</h5>
        <p class="card-text">Pay_Date : {{ $payments->paid_date }}</p>
        <p class="card-text">Amount : {{ $payments->amount }}</p>
         
  </div>
       
    </hr>
  
  </div>
</div>