<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{

    private $notificationsMessage = [];
    private $result = false;

    public function index(){
        return Teacher::all();
    }

    public function show( $id)
    {
        $tc = Teacher::find($id);
        if(isset($tc)){
            return response ()->json([
                'data'=>$tc,
                'messaje'=>"Profesor encontrado con exito ",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'messaje'=>"No se logro encontrar el Profesor",
            ]);
    }
}

public function store( Request $request)
    {
        $inputs = $request->input();
        $tc = Teacher::create($inputs);
        return response ()->json([
            'data'=>$tc,
            'messaje'=>"Profesor creado con exito ",
        ]);
    }

    public function destroy( $id)
    {
        try {
            $tc = Teacher::find($id);
            if(isset($tc)){
                $res=Teacher::destroy($id);
                if($res){
                    return response ()->json([
                        'data'=>$tc,
                        'messaje'=>"Profesor eliminado con exito ",
                    ]);
                }else{
                    return response ()->json([
                        'data'=>[],
                        'messaje'=>"Profesor no existe ",
                    ]);
                }
        
            }
            else {
                return response()->json([
                    'error'=>true,
                    'messaje'=>"No se logro encontrar el profesor",
                ]);
            }
        } catch (\Exception $ex) {        
            if ($ex instanceof \Illuminate\Database\QueryException) {
                $this->notificationsMessage[] = ["warning", "¡El registro tiene transacciones asociadas!"];
            } else {
                $this->notificationsMessage[] = ["error", "", "¡Hubo un error, el registro no pudo ser eliminado!", 12000];
            }
            return response()->json(["result" => $this->result, "rErrors" => $this->notificationsMessage], 422);
        }
        
    }
    

public function update( Request $request , $id)
    {
        $tc = Teacher::find($id);
       if(isset($tc)){
        $tc->document = $request->document;
        $tc->name = $request->name;
        $tc->phone = $request->phone;
        $tc->email = $request->email;
        $tc->address = $request->address;
        $tc->city = $request->city;
        if( $tc -> save()){
            return response ()->json([
                'data'=>$tc,
                'messaje'=>"Profesor actualizado con exito ",
            ]);
        }
        else{
            return response()->json([
                'error'=>true,
                'messaje'=>"No se logro actualizar el profesor",
            ]);
        }
       }
       else{
        return response()->json([
            'error'=>true,
            'messaje'=>"No existe el profesor",
        ]);
       }
    }

    
}
