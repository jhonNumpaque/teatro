<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\reserva;
use App\reservaSilla;
use App\silla;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservaController extends Controller{

    public static function store(Request $request){
        try {
            $fx     = explode("/", $request->txtFecha);
            $fecha  = "$fx[2]-$fx[1]-$fx[0]";
            $sills  = $request->chkSillasD;
            $nombre = session()->get('nombre_usuario');
            $usuario = decrypt($request->txt);
            $id_res= reservaController::guardarReserva($fecha, $request->txtNumero);
            for ($i = 0; $i < count($sills); $i++) {
                reservaController::guardarRelacionReservaSilla($usuario, $sills[$i], 1, $id_res);
                $cadena = "Reserva realizada por el $nombre el dia $fecha para la silla id : $sills[$i]";
                reservaController::escribirArchivo($cadena);
            }
            flash()->overlay("Información guardada correctamente.", 'Información');
            return redirect()->route("Inicio");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function guardarReserva($fecha, $numero){
        try {
            $res                 = new reserva();
            $res->fecha          = $fecha;
            $res->numero_persona = $numero;
            $res->save();
            return reservaController::obtenerUltimaReserva($fecha, $numero);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function obtenerUltimaReserva($fecha, $numero){
        try {
            $data = DB::table('reserva')->where('fecha', '=', $fecha)->where('numero_persona', '=', $numero)->max('id_unico');
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function guardarRelacionReservaSilla($usuario, $silla, $estado, $reserva){
        try {
            $res = new reservaSilla();
            $res->usuario      = $usuario;
            $res->silla        = $silla;
            $res->estado_silla = $estado;
            $res->reserva      = $reserva;
            $res->save();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function cambiarEstadoSilla($usuario, $silla, $estado, $reserva){
        try {
            $data = DB::table("reserva_silla_usuario")
                        ->where('usuario', '=', $usuario)
                        ->where('silla', '=', $silla)
                        ->where('reserva', '=', $reserva)
                        ->update(["estado_silla" => $estado]);
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function obtenerSillas(Request $request){
        try {
            $fx    = explode("/", $request->fecha);
            $fecha = "$fx[2]-$fx[1]-$fx[0]";
            $data  = DB::table('silla')->get();
            $x     = 0;
            $xhtml = "";
            $xhtml .= "\n\t<div class=\"form-group row\">";
            foreach($data as $row){
                $xdata = reservaController::obtenerEstadoSilla(session()->get('usuario'), $row->id_unico, $fecha);
                $xhtml .= "\n\t\t<div class=\"col-sm-2 col-md-2 col-lg-2 col-xl-2 validar\">";
                $xhtml .= "\n\t\t\t<div class=\"form-check form-check-inline text-right\">";
                if(count($xdata) > 0){
                    $xhtml .= "\n\t\t\t<input class=\"form-check-input disponibles\" type=\"checkbox\" id=\"chkDis$row->id_unico\" name=\"chkSillasD[]\" value=\"$row->id_unico\" required checked disabled>";
                    $xhtml .= "\n\t\t\t<label class=\"form-check-label\" for=\"chkDis$row->id_unico\">$row->fila/$row->columna</label>";
                    $xhtml .= "\n\t\t\t<a href='".route("EliminarReservaSilla",encrypt($xdata->id_unico))."' class=\"btn-sin fa fa-trash\" title='Eliminar'></a>";
                }else{
                    $xhtml .= "\n\t\t\t<input class=\"form-check-input ocupadas\" type=\"checkbox\" id=\"chkDis$row->id_unico\" name=\"chkSillasD[]\" value=\"$row->id_unico\" required title>";
                    $xhtml .= "\n\t\t\t<label class=\"form-check-label\" for=\"chkDis$row->id_unico\">$row->fila/$row->columna</label>";
                }
                $xhtml .= "\n\t\t\t</div>";
                $xhtml .= "\n\t\t</div>";
                if($x == 10){
                    $xhtml .= "\n</div><div class=\"form-group row\">";
                    $x = 0;
                }
            }
            $xhtml .= "\n\t</div>";
            echo $xhtml;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function eliminarRelacionReserva($id_unico){
        try {
            $id_unico = decrypt($id_unico);
            $data = DB::table("reserva_silla_usuario")
                        ->where('id_unico', $id_unico)
                        ->delete();
            flash()->overlay('Información eliminada correctamente', 'Información');
            return redirect()->route("Inicio");
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function obtenerEstadoSilla($usuario, $silla, $fecha){
        try {
            $data = DB::table('reserva_silla_usuario as reu')
                        ->leftJoin('reserva as res', 'reu.reserva', '=', 'res.id_unico')
                        ->where('reu.usuario', $usuario)
                        ->where('reu.silla', $silla)
                        ->where('res.fecha', $fecha)
                        ->first();
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function escribirArchivo($cadena){
        try {
            $txt = fopen("log_reserva.txt", "a+");
            fwrite($txt, $cadena);
            fclose($txt);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public static function listadoReservacionesUsuario(){
        try {
            if(!empty(session()->get('usuario'))){
                $data = DB::table('reserva_silla_usuario as reu')
                            ->select(
                                DB::raw('DATE_FORMAT(res.fecha, "%d/%m%Y") as fecha'),
                                DB::raw('CONCAT_WS(" - ", sla.fila, sla.columna) as silla'),
                                'res.numero_persona as nsillas'
                            )
                            ->leftJoin('reserva as res', 'reu.reserva', '=', 'res.id_unico')
                            ->leftJoin('silla as sla', 'reu.silla', '=', 'sla.id_unico')
                            ->where('reu.usuario', session()->get('usuario'))
                            ->get();
                return view('usuarios.listado', compact('data'));
            }else{
                return redirect("/");
            }
            return $data;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
