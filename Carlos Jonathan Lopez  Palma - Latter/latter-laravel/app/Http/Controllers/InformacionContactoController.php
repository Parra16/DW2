<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Requestinput;
use App;
use DB;

class InformacionContactoController extends Controller
{
    public function infocontacto(){
        $id=session()->get('id');
        $email = DB::table('personas')
        ->where('ID', $id)
        ->value('EMAIL');

        $tel = DB::table('personas')
        ->where('ID', $id)
        ->value('TELEFONO');

        return view('inforcontacto',compact('email','tel'));
    }

    public function editarinf(Request $request){
        try {
            $persona = DB::table('personas')
            ->where('ID', session()->get('id'))
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

        return back()->with('alert','Información de contacto actualizada');
    }
    
}
