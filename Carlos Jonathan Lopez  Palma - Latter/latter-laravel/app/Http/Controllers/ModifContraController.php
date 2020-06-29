<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use Illuminate\Support\Facades\Validator;
use DB;
use App\Rules\ValidaPass;

class ModifContraController extends Controller
{
    public function paginacontrasena(){
        $id=session()->get('id');
        $persona = DB::table('personas')
        ->select('ID','NOMBRE','APELLIDOPA','APELLIDOMA','EMAIL','TELEFONO')
        ->where('ID', '=', $id)->get();

        return view('CambioContrasc',\compact('persona'));
    }

    public function cambiocontrasena(Request $request){
        $passbd = DB::table('cuentas')
        ->select('CONTRASENA')
        ->where('IDPERSONA', session()->get('id'))
        ->get();
        
        if (!(password_verify($request->input('conta'),$passbd[0]->CONTRASENA))) {	
        return back()->with('conta','Contraseña incorrecta');}
        
        $request->validate([
            'nco' => 'different:conta',
            'rco' => 'same:nco',
        ]);
        
        $hash=password_hash($request->input('nco'), PASSWORD_DEFAULT);
        $persona = DB::table('cuentas')
        ->where('IDPERSONA', '=', session()->get('id'))
        ->update(['CONTRASENA' =>$hash]);

        return back()->with('successs','Contraseña actualizada');
        
    }
}
