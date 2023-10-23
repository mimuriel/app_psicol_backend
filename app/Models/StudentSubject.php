<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentSubject extends Model
{
    use HasFactory;


    public $table = "student_subject";
        protected $fillable = [ 'id','student_id','subject_id'];
 

    public function students(){
        return $this->belongsTo(Student::class,"student_id");
    }


    public function subjects(){
        return $this->belongsTo(Subject::class,"subject_id");
    }




}
