<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Student;
class ReportController extends Controller
{
    public function report1($pid)
    {
    $payment = Payment::find($pid);
    $pdf = App ::make('dompdf.wrapper');
    $print = "<div style='margin:20px; padding:20px;'>";
    $print.= "<h1 align='center'> Payment Recipte</h1>";
    $print.= "<hr/>";
    $print.= "<p>Recipt No : <b>" . $pid . "</b> </p>";
    $print.= "<p> Date : <b>" . $payment->paid_date . "</b></p>";
    $print.= "<p> Enrollment No : <b>" . $payment->enrollment_id . "</b></p>";
    /* $print.= "<p> Student Name : <b>" . $payment->enrollment->student->name . "</b></p>";
      */$print.= "<hr/>";
    $print.= "<table style='width: 100%;'>";
    
    $print.= "<tr>";
    $print.= "<td> Amount </td>";
    $print.= "</tr>";
    
    $print.= "<tr>";
    $print.= "<td> <h3>". $payment->amount . "</h3></td>";
    $print.= "</tr>";
    
    $print.= "</table>";
    $print.= "<hr/>";
    
    $print.= "<span> Printed By: <b>". Auth::user()?->name . "</b> </span>";
    $print.= "<span> Printed Date: <b>". date('Y-m-d') . "</b> </span>";
    
    $print.= "</div>";
    $pdf->loadHTML($print);
    return $pdf->stream();
    
    }


}

?>