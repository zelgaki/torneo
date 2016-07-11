<?php
use App\Model\Recurso;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::GET("/hola-mundo/adios", function () {
    //return Route::current()->uri;
    return Request::path();
    //dd(Route::current());
});


Route::any("/login/{tipo}", "IndexController@redirectToProvider");
Route::get("/ingresar/{tipo}", "IndexController@handleProviderCallback");
Route::any("/salir", "IndexController@salir");
Route::get("subir-archivo","IndexController@formularioSubir");
Route::POST("upload-archivo","IndexController@subir");
Route::group(['middleware' => 'auth'], function () {
    $recurso = new Recurso;
    $recursos = $recurso->listar();
    /*construccion de rutas dinamicas*/
    foreach ($recursos as $key => $value) {
        $ruta = $value["ruta"];
        if (!is_null($value["variables"]))
            $ruta .= $value["variables"];
        $controlador = $value["controlador"] . "Controller@" . $value["accion"];
        switch ($value['metodo']){
            case 'post':
                Route::POST($ruta, $controlador);
                break;
            case 'get':
                Route::GET($ruta, $controlador);
                break;
            case 'any':
                Route::ANY($ruta,$controlador);

        }

        //Route::ANY($ruta, $controlador);
    }
});
