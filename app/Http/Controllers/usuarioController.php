<?php

namespace App\Http\Controllers;

use App\usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class usuarioController extends Controller{

    public static function index(){
        return view('usuarios.index');
    }

    public static function ingresar(Request $request){
        $user = $request->txtUsuario;
        $pass = $request->txtContrasena;

        $data = DB::table('usuarios')->where('usuario', '=',$user)->first();
        if(count($data) > 0){
            if(decrypt($data->password) == $pass){
                $nom = $data->nombres." ".$data->apellidos;
                session()->put("rol", $data->rol);
                session()->put("nombre_usuario", $nom);
                session()->put("usuario", $data->id_unico);
                return redirect()->route("Inicio");
            }else{
                flash()->overlay("Contraseña Erronea.", "Advertencia");
                return redirect("/");
            }
        }else{
            flash()->overlay("Usuario no registrado.", "Advertencia");
            return redirect("/");
        }
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        $user            = new usuario();
        $user->nombres   = $request->txtNombres;
        $user->apellidos = $request->txtApellidos;
        $user->rol       = 2;
        $user->usuario   = $request->txtUsuario;
        $user->password  = encrypt($request->txtPassword);
        $user->save();

        flash()->overlay("Información guardada correctamente.", "Información");

        return redirect("/");
    }

    public static function inicio(){
        if(!empty(session()->get('usuario'))){
            if(session()->get('rol') == 1){
                return view('usuarios.admin');
            }else{
                return view('usuarios.home');
            }
        }else{
            return redirect('/');
        }
    }

    public function salir(){
        session()->flush();
        return redirect('/');
    }

    public static function update($id){
        if(!empty(session()->get('usuario'))){
            $id   = decrypt($id);
            $user = usuario::find($id);
            return view('usuarios.actualizar', compact('user'));
        }else{
            return redirect('/');
        }
    }

    public static function actualizarUsuario(Request $request){
        try {
            $id  = decrypt($request->txtId);
            $upd = usuario::findOrFail($id);
            $upd->nombres   = $request->txtNombres;
            $upd->apellidos = $request->txtApellidos;
            $upd->save();
            flash()->overlay("Información guardada correctamente.", "Información");

            return redirect("Inicio");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function listarUsuarios(){
        try {
            $data = usuario::all();
            return view('usuarios.usuarios', compact('data'));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
