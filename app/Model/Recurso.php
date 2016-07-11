<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Recurso extends Model
{
    //
    protected $table = 'acl_recurso';

    public function listar(){
        return $this::all();
    }
}
