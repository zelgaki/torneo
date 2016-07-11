<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\participante;
use App\Model\configuracionApi;
use Session;
use Input;
use App\Model\torneo;
use Exception;

class ParticipantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $input = Input::all();
            $app = configuracionApi::find(3);
            $p = new participante();
            $t = new torneo();


            /*validar si el usuario esta inscrito en el torneo*/
            $participante = $p::where("user_id","=",Session::get("user_id"))->first();
            if(isset($participante->id))
                throw new Exception("Ya estas participando en este torneo");
            /*validar si el usuario esta inscrito en el torneo*/

            $array = array();
            $array["name"] = Session::get("usuario");
            $array["email"] = Session::get("email");;
            $array["misc"] = Session::get("rol_id");;
            $torneo = $t::find($input["torneo_id"]);
            $app["direccion"] = str_replace("{tournament}", $torneo["url"], $app["direccion"]);

            $url = \Laracurl::buildUrl($app['direccion'], ['api_key' => $app['api_key']]);
            $response = \Laracurl::post($url, ["participant" => $array]);
            $respuesta = json_decode($response->body);
            $respuesta = (array)$respuesta;
            if(isset($respuesta["errors"]))
                throw new Exception("Error al registrar al usuario en challonge.org");
            $p->torneo_id = $input["torneo_id"];
            $p->user_id = Session::get("user_id");
            $p->user_api_id = $respuesta["participant"]->id;
            $p->save();
            $respuesta["bandera"] = true;
            $respuesta["success"][] = "Te has registrado correctamente";


        } catch (Exception $e) {
            $respuesta["bandera"] = false;
            $respuesta["errors"][] = $e->getMessage();

        }


        return $respuesta;


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $p = new participante();
        $datos = Input::all();
        $participantes = $p->buscar($datos);

        return $participantes;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
