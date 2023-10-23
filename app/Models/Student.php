<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public $table = "students";
    protected $fillable = [ 'id','document','name','phone','email','address','city','semester'];


    public function subjects(){
        return $this->belongsToMany(Subject::class,"student_subject");
    }
}
