<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsuariosController extends Controller
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

    public function catalogoUsuarios()
    {
        return view("usuarios.catalogo");
    }

    public function formEditarUsuario()
    {
        return view("usuarios.formEditarUsuario");
    }

    public function jsonUsuarios()
    {
        $users = new User();
        $inputs = \Input::all();
        $usuarios = $users->listar($inputs);
        return $usuarios;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        //
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
        $inputs = \Input::all();
        $user = User::find($id);
        if (is_null($user)) {
            \App::abort(404);
        }
        $inputs["id"] = $id;
        $user["inputs"] = $inputs;
        $user->validAndSave($inputs);
        //return $user->validAndSave($inputs);
        return $user;
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
