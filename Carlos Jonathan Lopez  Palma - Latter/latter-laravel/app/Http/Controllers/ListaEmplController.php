<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListaEmplController extends Controller
{
    public function listaempleados(){
        $persona =DB::table('personas')
        ->join('empleado','empleado.IDPERSONA','=','personas.ID')
        ->select('personas.ID','personas.NOMBRE','personas.APELLIDOPA','personas.APELLIDOMA','empleado.PUESTO',
        'personas.EMAIL','personas.TELEFONO')
        ->get();
        return view('listaempleados',compact('persona'),);
    }

    public function actualiza(Request $request){
        if($request->input('nombres')==""){
            return back()->with('selectp','Selecciona un empleado')->withInput();
        }
        if($request->input('puesto')=="Selecciona"){
            return back()->with('selectc','Puesto')->withInput();
        }
        if($request->input('dia')=="Selecciona"){
            return back()->with('selectc','Dia')->withInput();
        }
        try {
            DB::table('personas')
            ->where('ID', $request->input('id'))
            ->update(['TELEFONO' =>$request->input('tel'),
            'EMAIL' => $request->input('email')]);
        } catch (\Illuminate\Database\QueryException $ex) {
            $campo = explode('\' (', $ex->getMessage());
            $campo= explode('entry \'', $campo[0]);
            $campo= explode('\' for key \'', $campo[1]);
            //echo $campo[0];
            //echo $campo[1];
            return back()->with('error',''.$campo[1].": ".$campo[0])->withInput();
        }
        DB::table('empleado')
            ->where('IDPERSONA', $request->input('id'))
            ->update(['HORAENTRADA' =>$request->input('hora1'),
            'HORASALIDA' =>$request->input('hora2'),
            'PUESTO' =>$request->input('puesto'),
            'DESCANSO' =>$request->input('dia')]);

        return back()->with('succcess','Información actualizada');
    }
}
