<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $table = 'acl_menu';
    
    public function listar(){
        return $this::all();
    }
}
