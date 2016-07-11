<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Socialize;
use DB;
use App\User;
use Session;
use Auth;
use Input;

class IndexController extends Controller
{
    //

    public function __construct()
    {
        //$this->middleware('auth');
    }

    function index()
    {
        return view('index');
    }

    public function ingresar()
    {
        return view("ingresar");
    }

    public function salir()
    {
        Auth::logout();
        return redirect('/');
    }

    public function redirectToProvider($tipo)
    {
        if ($tipo == "twitter") {
            return Socialize::with('twitter')->redirect();
        } elseif ($tipo == "facebook") {
            return Socialize::with('facebook')->redirect();
        }
    }

    public function handleProviderCallback($tipo)
    {
        $acciones["success"] = array();
        $acciones["errores"] = array();
        $acciones["bandera"] = true;
        try {
            \DB::beginTransaction();
            if ($tipo == "twitter") {
                $user = Socialize::with('twitter')->user();
            } elseif ($tipo == "facebook") {
                $user = Socialize::with('facebook')->user();
            }
            $acciones["resultado"] = $user;
            //dd($user);
            $datos["id_social"] = $user->getId();
            $usuario = DB::table('users')->where("id_social", '=', $datos["id_social"])->first();
            if (count($usuario) > 0) {

                Session::put('user_id', $usuario->id);
                Session::put('rol_id', $usuario->rol_id);
                Session::put('usuario', $usuario->usuario);
                Session::put('rol_id', $usuario->rol_id);
                Session::put('nombre', $usuario->nombre);
                Session::put('imagen', $usuario->imagen);
                array_push($acciones["success"], "Ingreso correcto " . Session::get("nombre"));
                Auth::loginUsingId($usuario->id);

            } else {
                $u = new User;

                $u->rol_id = 1;
                if (is_null($user->getNickname())) {
                    $nickname = $user->getName();
                } else {
                    $nickname = $user->getNickname();

                }
                $u->usuario = $nickname;
                $u->nombre = $user->getName();
                $u->email = $user->getEmail();
                $u->imagen = $user->getAvatar();
                //dd($user->getId());
                $u->id_social = $user->getId();
                $u->token_social = $user->token;

                $u->tipo = $tipo;
                $u->save();
                $datos["id_social"] = $user->getId();
                $usuario = DB::table('users')->where("id_social", $datos["id_social"])->first();
                Session::put('user_id', $usuario->id);
                Session::put('rol_id', $usuario->rol_id);
                Session::put('usuario', $usuario->usuario);
                Session::put('email', $usuario->email);
                Session::put('rol_id', $usuario->rol_id);
                Session::put('nombre', $usuario->nombre);
                Session::put('imagen', $usuario->imagen);
                array_push($acciones["success"], "Registro realizado correctamente " . Session::get("nombre"));
                Auth::loginUsingId($usuario->id);


            }
            $acciones["usuario"] = $usuario;

            \DB::commit();

        } catch (Exception $e) {
            \DB::rollback();
            $acciones["bandera"] = false;
            array_push($acciones["errores"], $e->getMessage());
        }
        return redirect('/');
    }

    public function formularioSubir()
    {
        return view("formularioSubur");
    }

    public function subir()
    {
        if (Input::hasFile('archivo')) {
            $file = Input::file('archivo');
            Input::file('archivo')->move('upload', "archivo." . $file->getClientOriginalExtension());
        }
        return "Se subio";
    }
}
