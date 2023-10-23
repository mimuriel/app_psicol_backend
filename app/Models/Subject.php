<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public $table = "subjects";
    protected $fillable = [ 'id','nameA','description','credits','knowledge_area','type_of_course','teacher_id'];


    public function students(){
        return $this->belongsToMany(Student::class,"student_subject");
    }
    public function teachers() {
        return $this->belongsTo(Teacher::class,'teacher_id');
    }



}
