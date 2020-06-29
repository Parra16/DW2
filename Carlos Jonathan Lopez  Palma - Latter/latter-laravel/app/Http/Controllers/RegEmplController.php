<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\CorreoRegistro;


class RegEmplController extends Controller
{
    public function registroempleados(){
        return view('registroempleados');
    }

    public function registroemp(Request $request){
        if($request->input('sexo')=="Selecciona"){
            return back()->with('alert2','Sexo')->withInput();
        }
        if($request->input('puesto')=="Selecciona"){
            return back()->with('alert2','Puesto')->withInput();
        }
        if($request->input('diadesc')=="Selecciona"){
            return back()->with('alert2','dia de Descanso')->withInput();
        }
        try {
            $ID = DB::table('personas')->insertGetId(
            ['NOMBRE' =>$request->input('nombres'),
            'APELLIDOPA' =>$request->input('app'),
            'APELLIDOMA' =>$request->input('apm'),
            'FECHANA' =>$request->input('fechana'),
            'SEXO' =>$request->input('sexo'),
            'CURP' =>$request->input('curp'),
            'RFC' =>$request->input('rfc'),
            'DIRECCION' =>$request->input('direc'),
            'TELEFONO' =>$request->input('tel'),
            'EMAIL' =>$request->input('email'),
            'NSEGURO' =>$request->input('nseg')
            ]);//'ID'
        } catch (\Illuminate\Database\QueryException $ex) {
            $campo = explode('\' (', $ex->getMessage());
            $campo= explode('entry \'', $campo[0]);
            $campo= explode('\' for key \'', $campo[1]);
            //echo $campo[0];
            //echo $campo[1];
            return back()->with('alert',''.$campo[1].": ".$campo[0])->withInput();
        }

        DB::table('empleado')->insert(
        ['IDPERSONA' => $ID,
        'PUESTO' => $request->input('puesto'),
        'HORAENTRADA' => $request->input('horae'),
        'HORASALIDA' => $request->input('horas'),
        'DESCANSO' => $request->input('diadesc'),
        'ANOIN' => date('Y')]);
        
        $nombre = $request->input('nombres');
        $app=$request->input('app');
        $apm=$request->input('apm');
        $fechana=$request->input('fechana');


        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890-_";
        $usuario=substr($nombre,0,3).substr($apm,0,3).date('md',strtotime($fechana)).substr($str,rand(0,64),1);
        $contra="";
		for($i=0;$i<11;$i++) {
			$contra .= substr($str,rand(0,64),1);
		}
        $passHash = password_hash($contra, PASSWORD_DEFAULT);
        DB::table('asistencia')->insert(
        ['IDPERSONA' => $ID,
        'FECHA' => date('Y-m-d'),
        'EDO' => 2,
        'ESTADO' => 'AUSENTE']);
            
        DB::table('cuentas')->insert(
        ['IDPERSONA' => $ID,
        'USUARIO' => $usuario,
        'CONTRASENA' => $passHash]);
        echo'<script type="text/javascript">
    alert($contra);
    </script>';

        Mail::to($request->input('email'))->send(new CorreoRegistro($nombre,$app,$apm,$usuario,$contra));
        
        return back()->with('Success','Registro realizado');
    }
}
