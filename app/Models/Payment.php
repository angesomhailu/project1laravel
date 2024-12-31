<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $fillable = ['enrollment_id', 'paid_date', 'amount'];
  
    public function enrollment(){
        return $this->hasOne(Enrollment::class,'id','enrollment_id');
    }
   
}
?>