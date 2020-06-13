<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use App\Http\Controllers\Controller;
use App;
use DB;

class RegistroEntradaController extends Controller
{
    public function registro(){
        return view('registro');
    }
    
    public function registraentrada(Request $request){

        /*$cuenta=DB::table('asistencia')
        ->select('IDPERSONA','FECHA','EDO','ESTADO')
        ->where('IDPERSONA', '=', $request->input('user'))->get();
        */
        $fechan=date('Y-m-d');
        $edon=0;
        $estadon="";
        $men = $request->input('user');
        echo "<script type='text/javascript'>alert('$men');</script>";
        /*if($cuenta['ESTADO']=='AUSENTE' & $cuenta['EDO'] == 2 & $cuenta->FECHA!=['fechan']){
            $persona = DB::table('asistencia')
            ->where('IDPERSONA', $request->input('user'))
            ->update(['FECHA' => $fechan,
            'EDO' => 1,
            'ESTADO' => 'PRESENTE']);

            return back()->with('alert','Entrada registrada');
        }*/

        
    }
}
