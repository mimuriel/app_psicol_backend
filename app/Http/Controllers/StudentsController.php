<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentSubject;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function index(){
        return Student::all();
    }

    public function store( Request $request)
    {
        $inputs = $request->input();
        $st = Student::create($inputs);
        foreach ($request->subject_id as $value) {
            $studentSubject = StudentSubject::create([
                "student_id" => $st->id,
                "subject_id" => $value["idUnico"]
            ]);
        }
        return response ()->json([
            'data'=>$st,
            'messaje'=>"Estudiante creado con exito ",
        ]);
    }
    public function show( $id)
    {
        $st = Student::find($id);
        if(isset($st)){
            return response ()->json([
                'data'=>$st,
                'messaje'=>"Estudiante encontrado con exito ",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'messaje'=>"No se logro encontrar el estudiante",
            ]);
    }
}

public function destroy( $id)
{
    $st = Student::find($id);
    if(isset($st)){
        $res=Student::destroy($id);
        if($res){
            return response ()->json([
                'data'=>$st,
                'messaje'=>"Estudiante eliminado con exito ",
            ]);
        }else{
            return response ()->json([
                'data'=>[],
                'messaje'=>"Estudiante no existe ",
            ]);
        }

    }
    else{
        return response()->json([
            'error'=>true,
            'messaje'=>"No se logro encontrar el estudiante",
        ]);
}
}

    public function update( Request $request , $id)
    {
        $st = Student::find($id);
       if(isset($st)){
        $st->document = $request->document;
        $st->name = $request->name;
        $st->phone = $request->phone;
        $st->email = $request->email;
        $st->address = $request->address;
        $st->city = $request->city;
        $st->semester = $request->semester;
        if( $st -> save()){
            return response ()->json([
                'data'=>$st,
                'messaje'=>"Estudiante actualizado con exito ",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'messaje'=>"No se logro actualizar el estudiante",
            ]);
        }
       }
       else{
        return response()->json([
            'error'=>true,
            'messaje'=>"No existe el estudiante",
        ]);
       }
    }

}
