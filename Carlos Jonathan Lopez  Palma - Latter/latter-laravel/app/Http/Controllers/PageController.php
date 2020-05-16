<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use App;
use DB;

class PageController extends Controller
{
    public function registro(){
        return view('registro');
    }

    public function login(){
        return view('login');
    }

    public function registrolo(){
        return view('registro');
    }

    public function inicioadmin(){
        return view('InicioAdmin');
    }

    public function iniciousuario(){
        return view('InicioUsua');
    }

    public function registroempleados(){
        return view('registroempleados');
    }

    public function listaempleados(){
        $persona =DB::table('personas')
        ->join('empleado','empleado.IDPERSONA','=','personas.ID')
        ->select('personas.ID','personas.NOMBRE','personas.APELLIDOPA','personas.APELLIDOMA','empleado.PUESTO',
        'personas.EMAIL','personas.TELEFONO')
        ->get();
        return view('listaempleados',compact('persona'),);
    }
    
    public function cambiocontrasena(){
        return view('CambioContrasc');
    }

    public function reportesempleados(){
        $persona =DB::table('personas')
        ->join('reportes','reportes.IDPERSONA','=','personas.ID')
        ->select('personas.ID','personas.NOMBRE','personas.APELLIDOPA','personas.APELLIDOMA',
        'reportes.DESCRIPCION','reportes.FECHA','reportes.HORA')
        ->get();
        return view('reportesempleados',compact('persona'),);
    }

    public function infocontacto($id){
        $persona = DB::table('personas')
        ->select('ID','NOMBRE','APELLIDOPA','APELLIDOMA','EMAIL','TELEFONO')
        ->where('ID', '=', $id)->get();
        return view('inforcontacto',\compact('persona'));
    }

    public function userreportes($id){
        //$persona=App\Reporte::findOrFail($id);
        $persona = DB::table('reportes')
        ->select('IDPERSONA','FECHA','HORA','DESCRIPCION','MONTO')
        ->where('IDPERSONA', '=', $id)->get();
        $item = DB::table('personas')
        ->select('NOMBRE','APELLIDOPA','APELLIDOMA')
        ->where('ID', '=', $id)->get();
        //$persona = DB::select('select * from reportes where IDPERSONA=?',[$id]);
        return view('userreportes',compact('persona','item'));
    }

    public function registroemp(Request $request){
        //return $request->all();
        $registro = new App\Persona;
        $registro->NOMBRE = $request->input('nombres');
        $registro->APELLIDOPA = $request->input('app');
        $registro->APELLIDOMA = $request->input('apm');
        $registro->FECHANA = $request->input('fechana');
        $registro->SEXO = $request->input('sexo');
        $registro->CURP = $request->input('curp');
        $registro->RFC = $request->input('rfc');
        $registro->DIRECCION = $request->input('direc');
        $registro->TELEFONO = $request->input('tel');
        $registro->AEMAIL = $request->input('email');
        $registro->NSEGURO = $request->input('nseg');

        $registroem = new App\Empleado;
        /*$registroem->  = $request->input('a');
        $registroem->  = $request->input('');
        $registroem->  = $request->input('');
        $registroem->  = $request->input('');
        $registroem->  = $request->input('');*/

        $regcuenta = new App\Cuenta;

        $regasist = new App\Asistencia;
    }
}
