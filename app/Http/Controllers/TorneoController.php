<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Exception;
use App\Model\configuracionApi;
use App\Model\torneo;
use Input;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function crear()
    {
        //
        return view("torneo.crear");
    }

    public function create()
    {
        try {
            \DB::beginTransaction();
            $app = configuracionApi::find(1);
            $input = \Input::all();
            $url = \Laracurl::buildUrl($app['direccion'], ['api_key' => $app['api_key']]);
            $response = \Laracurl::post($url, ["tournament" => $input["tournament"]]);

            $respuesta = json_decode($response->body);
            $respuesta = (array)$respuesta;

            if (isset($respuesta['errors'])) {
                throw new Exception("Verifica la informacion enviada");
            } else {
                $respuesta["tournament"] = (array)$respuesta["tournament"];

                $t = new torneo();
                $t->turnament_id = $respuesta["tournament"]["id"];
                $t->name = $respuesta["tournament"]["name"];
                $t->description = $respuesta["tournament"]["description"];
                $t->url = $respuesta["tournament"]["url"];
                $t->estatus = 'capturado';
                $t->save();
                $respuesta["success"][] = "Se creo el torneo exitosamente";

            }
            \DB::commit();
        } catch (Exception $e) {
            \DB::rollback();
            $respuesta["errors"][] = $e->getMessage();
        }

        return $respuesta;


    }
    public function star(){
        
    }

    public function reporte()
    {

        return view("torneo.reporte");
    }

    public function jsonTorneos()
    {

        $t = new torneo();
        $datos = Input::all();
        $torneos = $t->listar($datos);


        return $torneos;
    }

    public function verTorneo($id)
    {
        return view('torneo.verTorneo')->with("id_torneo",$id);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show()
    {
        $input = \Input::all();
        $t = new torneo();
        $torneo = $t::find($input["id"]);
        /*conectar con el api para obtener los datos del torneo*/
        $app = configuracionApi::find(2);
        $app["direccion"] = str_replace("{tournament}", $torneo["url"], $app["direccion"]);
        $url = \Laracurl::buildUrl($app['direccion'], ['api_key' => $app['api_key'], "include_participants" => 1, "include_matches" => 1]);
        $response = \Laracurl::get($url);
        /*conectar con el api para obtener los datos del torneo*/

        $response = json_decode($response->body);
        $response = (array) $response;

        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
