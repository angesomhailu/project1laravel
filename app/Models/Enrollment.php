<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $table = 'enrollments';
    protected $primaryKey = 'id';
    protected $fillable = ['enroll_no','batch_id','student_id','join_date'];

    public function student(){
        return $this->hasOne(Student::class,'id','student_id');
    }

    public function batch(){
        return $this->hasOne(Batch::class,'id','batch_id');
    }
}
?>