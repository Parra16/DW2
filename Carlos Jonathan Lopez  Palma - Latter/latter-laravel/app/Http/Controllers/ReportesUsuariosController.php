<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use App;
use DB;

class ReportesUsuariosController extends Controller
{
    public function reportesempleados(){
        $reportte =DB::table('personas')
        ->join('reportes','reportes.IDPERSONA','=','personas.ID')
        ->select('personas.ID','personas.NOMBRE','personas.APELLIDOPA','personas.APELLIDOMA',
        'reportes.DESCRIPCION','reportes.FECHA','reportes.HORA')
        ->get();
        $persona =DB::table('personas')
        ->select('ID','NOMBRE','APELLIDOPA','APELLIDOMA')->get();
        return view('reportesempleados',compact('reportte','persona'));
    }
    public function registrareporte(Request $request){
        $causa=$request->input('causa');
        $monto=0;

        if($request->input('causa')=="Selecciona"){
            return back()->with('error2','Selecciona un reporte')->withInput();
        }
        if($request->input('emp')=="Selecciona"){
            return back()->with('error2','Selecciona un empleado')->withInput();
        }

        if($causa=='RETARDO'){
            $monto=50.00;
        }else if($causa=='RETIRO TEMPRANO'){
            $monto=60.00;
        }else if($causa=='AUSENTE'){
            $monto=200.00;
        };
        $hoy = date("Y-m-d");
        $hora = date("H:i:s");
        DB::table('reportes')->insert(
            ['IDPERSONA' => $request->input('emp'),
            'FECHA' => $hoy,
            'HORA' => $hora,
            'DESCRIPCION' => $request->input('causa'),
            'MONTO' => $monto]);
        
            return back()->with('alert2','Reporte registrado');
    }

    /*public function eliminareporte($id){
        return back()->with('alert1','Reporte eliminado');
    }*/


    public function userreportes(){
        $id=session()->get('id');
        $persona = DB::table('reportes')
        ->select('IDPERSONA','FECHA','HORA','DESCRIPCION','MONTO')
        ->where('IDPERSONA', '=', $id)->get();
        return view('userreportes',compact('persona'));
    }

}
