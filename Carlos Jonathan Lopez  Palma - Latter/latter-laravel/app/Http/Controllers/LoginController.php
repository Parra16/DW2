<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use App;
use DB;

class LoginController extends Controller
{
    public function login(){
        if(session()->get('loggedin')){
            session()->forget('loggedin');
            session()->forget('name');
            session()->forget('ap');
            session()->forget('puesto');
            session()->forget('id');
            session()->forget('start');
            session()->forget('expire');
        }
        return view('login');
    }

    public function inicioadmin(){
        /*if(!session()->has('id')){
            return redirect('login');
        }*/
        return view('InicioAdmin');
    }

    public function iniciousuario(){
        return view('InicioUsua');
    }

    public function entrar(Request $request){
        $usuario =DB::table('cuentas')
        ->join('empleado','empleado.IDPERSONA','=','cuentas.IDPERSONA')
        ->join('personas','personas.ID','=','cuentas.IDPERSONA')
        ->select(
            'cuentas.USUARIO','cuentas.CONTRASENA',
            'personas.ID','personas.NOMBRE','personas.APELLIDOPA','personas.APELLIDOMA',
            'empleado.PUESTO')
        ->where('USUARIO',$request->input('user'))
        ->get();

        if (password_verify($request->input('password'),$usuario[0]->CONTRASENA)) {	
            session()->put('loggedin',true);
            session()->put('name',$usuario[0]->NOMBRE);
            session()->put('ap',$usuario[0]->APELLIDOPA." ".$usuario[0]->APELLIDOMA);
            session()->put('puesto',$usuario[0]->PUESTO);
            session()->put('id',$usuario[0]->ID);
            session()->put('start',time());
            session()->put('expire',session()->get('start') + (10 * 60));
           
            	
            if(session()->get('puesto')=="ADMINISTRADOR"){
                return redirect('inicio_AD'.session()->get('id'));
            }else{
                return redirect('inicio_US'.session()->get('id'));
            }
        }else{
            return back()->with('alert','Usuario o contraseña incorrectos');
        }
    }

    public function salir(){
        session()->forget('loggedin');
        session()->forget('name');
        session()->forget('ap');
        session()->forget('puesto');
        session()->forget('id');
        session()->forget('start');
        session()->forget('expire');
        return redirect('login');
    }
    
}
