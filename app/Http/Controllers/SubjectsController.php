<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function index(){
        return Subject::with(['teachers'])->get();
    }

    public function store( Request $request)
    {
        $inputs = $request->input();
        $sj = Subject::create($inputs);
        return response ()->json([
            'data'=>$sj,
            'messaje'=>"Asignatura creado con exito ",
        ]);
    }
    public function show( $id)
    {
        $sj = Subject::find($id);
        if(isset($st)){
            return response ()->json([
                'data'=>$st,
                'messaje'=>"Asignatura encontrado con exito ",
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
    $sj = Subject::find($id);
    if(isset($st)){
        $res=Subject::destroy($id);
        if($res){
            return response ()->json([
                'data'=>$sj,
                'messaje'=>"Asignatura eliminado con exito ",
            ]);
        }else{
            return response ()->json([
                'data'=>[],
                'messaje'=>"Asignatura no existe ",
            ]);
        }

    }
    else{
        return response()->json([
            'error'=>true,
            'messaje'=>"No se logro encontrar el Asignatura",
        ]);
}
}

    public function update( Request $request , $id)
    {
        $sj = Subject::find($id);
       if(isset($sj)){
        $sj->document = $request->description;
        $sj->name = $request->credits;
        $sj->phone = $request->knowledge_area;
        $sj->email = $request->type_of_course;
        $sj->address = $request->teacher_id;
        if( $sj -> save()){
            return response ()->json([
                'data'=>$sj,
                'messaje'=>"Asignatura actualizado con exito ",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'messaje'=>"No se logro actualizar la Asignatura",
            ]);
        }
       }
       else{
        return response()->json([
            'error'=>true,
            'messaje'=>"No existe la asignatura",
        ]);
       }
    }
}
