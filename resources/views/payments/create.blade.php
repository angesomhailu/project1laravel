@extends('layout')
@section('content')
 
<div class="card">
  <div class="card-header">Payments</div>
  <div class="card-body">
      
      <form action="{{ url('payments') }}" method="post">
        {!! csrf_field() !!}
        <label>Enrollment_No</label></br>
        <input type="text" name="enrollment_id" id="enrollment_id" class="form-control"></br>
        <label>Pay_Date</label></br>
        <input type="text" name="paid_date" id="paid_date" class="form-control"></br>
        <label>Amount</label></br>
        <input type="text" name="amount" id="amount" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"> 
    </form>
   
  </div>
</div>
 
@stop