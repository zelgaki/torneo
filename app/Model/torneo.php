<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class torneo extends Model
{
    //
    protected $table = "torneo";

    public function listar($datos)
    {

        $query = $this;
        if (isset($datos["name"])) { 
            //return "%" . $datos["name"] . "%";
            $query = $query->where("name", "like", "%" . $datos["name"] . "%");
        }
        if (isset($datos["url"])) {
            $query = $query->where("url", "like", "%" . $datos["url"] . "%");
        }
        if ($datos["tournament_type"]) {
            $query = $query->where("tournament_type", "=", $datos["tournament_type"]);
        }
        $torneos = $query->get()->toArray();
        return $torneos;
    }
}
