<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class participante extends Model
{
    //
    protected $table = "torneo_participante";

    public function buscar($datos)
    {

        $query = $this->leftJoin('users as u', 'u.id', '=', 'torneo_participante.user_id');
        $query->leftJoin('torneo as t', 't.id', '=', 'torneo_participante.torneo_id');


        $query->select('torneo_participante.*',
            "u.nombre",'u.email','u.imagen','u.usuario','u.tipo'
        );
        if(isset($datos["torneo_id"])){
            $query->where("t.id",'=',$datos["torneo_id"]);
        }

        if (isset($datos["id"])) {
            $query->where("torneo_participante.id", '=', $datos["id"]);
            $resultado = $query->first()->toArray();
        } else {
            $resultado = $query->get()->toArray();
        }

        return $resultado;
    }
}
