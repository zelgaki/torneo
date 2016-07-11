<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RecursoMenu extends Model
{
    //
    protected $table = 'acl_recurso_menu';
    
    public function listar($datos){
        $consulta=$this->leftJoin("acl_recurso as r","r.id","=","acl_recurso_menu.recurso_id");
        if(isset($datos["menu_id"]))
        	$consulta->where("acl_recurso_menu.menu_id","=",$datos["menu_id"]);
        return $consulta->get()->toArray();
    }
}
