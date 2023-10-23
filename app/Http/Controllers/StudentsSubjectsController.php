<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentSubject;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentsSubjectsController extends Controller
{
    public function index(){
        return StudentSubject::with(['students', 'subjects.teachers'])->get();
    }
    

}
